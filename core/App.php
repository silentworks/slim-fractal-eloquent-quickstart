<?php

/**
 * Class App
 *
 * @method static \Slim\App contentType($type)
 * @method static \Slim\App status($code)
 * @method static \Slim\App urlFor($name, $params = array())
 * @method static \Slim\App redirect($url, $status = 302)
 * @method static \Slim\App hook($name, $callable, $priority = 10)
 * @method static \Slim\App applyHook($name, $hookArg = null)
 * @method static \Slim\App getHooks($name = null)
 * @method static \Slim\App clearHooks($name = null)
 * @method static \Slim\App sendFile($file, $contentType = false)
 * @method static \Slim\App sendProcess($command, $contentType = "text/plain")
 * @method static \Slim\App setDownload($filename = false)
 * @method static \Slim\App add(\Slim\Middleware $newMiddleware)
 * @method static \Slim\App run()
 */
abstract class App
{
    /* @var \Slim\App $app */
    protected static $app;

    protected static $allowedMethods = array();

    /**
     * @param \Slim\App $app
     */
    public static function setup($app)
    {
        static::$app = $app;
    }

    /**
     * @return \Slim\App
     */
    public static function instance()
    {
        return static::$app;
    }

    public static function initialCallStatic() {}

    public static function __callStatic($method, $args)
    {
        // Call before mapping of statics
        static::initialCallStatic();

        $instance = static::$app;

        if (! empty(static::$allowedMethods) && ! in_array($method, static::$allowedMethods)) {
            throw new RouteException(sprintf('Method "%s" not found.', $method));
        }

        switch (count($args))
        {
            case 0:
                return $instance->$method();

            case 1:
                return $instance->$method($args[0]);

            case 2:
                return $instance->$method($args[0], $args[1]);

            case 3:
                return $instance->$method($args[0], $args[1], $args[2]);

            case 4:
                return $instance->$method($args[0], $args[1], $args[2], $args[3]);

            default:
                return call_user_func_array(array($instance, $method), $args);
        }
    }
}

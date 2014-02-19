<?php

/**
 * Class App
 *
 * @method static \Slim\View display($template, array $data = array())
 * @method static \Slim\View fetch($template, array $data = array())
 * @method static \Slim\View render($template, array $data = array())
 */
class View extends App
{
    protected static $allowedMethods = array(
        'display',
        'fetch'
    );

    public static function initialCallStatic()
    {
        static::$app = static::$app['view'];
    }

    public static function json($data = array(), $status = null)
    {
        if (is_array($data)) {
            $data = json_encode($data);
        }

        $response = static::$app['response'];
        $response->getHeaders()->set('Content-Type', 'application/json');
        if (!is_null($status)) {
            $response->setStatus($status);
        }
        $response->setBody($data);
    }
}

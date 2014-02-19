<?php

/**
 * Class App
 *
 * @method static \Slim\App get()
 * @method static \Slim\App post()
 * @method static \Slim\App put()
 * @method static \Slim\App delete()
 * @method static \Slim\App group()
 * @method static \Slim\App urlFor($name, $params = array())
 * @method static \Slim\App redirect($url, $status = 302)
 */
class Route extends App
{
    protected static $allowedMethods = array(
        'get',
        'post',
        'put',
        'delete',
        'group',
        'urlFor',
        'redirect'
    );
}

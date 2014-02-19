<?php
/**
 * Add Extra config files to include in here
 * or use to configure external libraries
 */

$db = require_once "database.php";

/**
 * Setup Eloquent
 */
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;

$capsule->addConnection($db[ENVIRONMENT]);

// Set the event dispatcher used by Eloquent models
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods
$capsule->setAsGlobal();

// Setup the Eloquent ORM
$capsule->bootEloquent();

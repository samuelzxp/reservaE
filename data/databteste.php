<?php
require __DIR__ . '/../vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule;


$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'eventoreserva',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix'    => '',
]);


$capsule->setAsGlobal();


$capsule->bootEloquent();


// Capsule::connection()->getPdo();
return $capsule;
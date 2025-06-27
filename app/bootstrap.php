<?php
declare(strict_types=1);

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Facade;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory as ValidationFactory;

require_once __DIR__ . '/../vendor/autoload.php';

// 🔧 Eloquent (illuminate/database)
$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'database' => 'pure_php',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

// 🧠 Laravel service container
$container = new Container();

// 🗣️ Pre validátor potrebujeme Translator (aj bez reálnych prekladov)
$translator = new Translator(new ArrayLoader(), 'en');

// ✅ Laravel validation factory
$validatorFactory = new ValidationFactory($translator, $container);
$container->instance('validator', $validatorFactory);

// 🎭 Laravel facades (Validator, Response, atď.)
Facade::setFacadeApplication($container);

<?php

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Noodlehaus\Config;
use Codengine\User\User;
use Codengine\Validation\Validator;

use Codengine\Helpers\Hash;

session_cache_limiter(false);
session_start();

ini_set('display_errors','On');
define('INC_ROOT', dirname(__DIR__));

require INC_ROOT . '/vendor/autoload.php';


$app = new Slim([
    'mode'=>file_get_contents(INC_ROOT . '/mode.php'),
    'view'=> new Twig(),
    'templates.path'=>INC_ROOT . '/app/views'
]);

$app->configureMode($app->config('mode'), function() use ($app){
    $app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");
});

require 'database.php';
require 'routes.php';

$app->container->set('user',function(){
    return new User;
});

$app->container->singleton('hash', function() use ($app) {
    return new Hash($app->config);
});

$app->container->singleton('validation', function() use ($app) {
    return new Validator;
});

$view = $app->view();
$view->parserOptions = ['debug'=>$app->config->get('twig.debug')];
$view->parserExtensions = [new TwigExtension];


/*echo $app->hash->password('ilovecats');
$password = 'ilovecats';
$hash = '$2y$10$O.26VHxW12tt1GZbr5FdeOus1a0b31a3IrZuAOuI09XxeLgUCN6fS';

var_dump($app->hash->passwordCheck($password, $hash));*/

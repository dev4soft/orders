<?php
session_start();

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

$container = $app->getContainer();

$app->add(
    new \Slim\Middleware\Session([
        'autorefresh' => true,
        'lifetime' => '1 hour',
    ])
);

$container['view'] = function () {

    return new \Slim\Views\PhpRenderer('../templates');
};

$container['db'] = function () {

    return new \Orders\DbConnector(new \Orders\ConfigDb);
};

$container['session'] = function() {

    return new \SlimSession\Helper();
};

$app->group('', function () {
    $this->get('/', '\Orders\Controllers\Form:Index');
})->add(new \Orders\Auth($container));

$app->post('/auth', '\Orders\Controllers\Login:Check');

$app->run();


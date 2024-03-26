<?php

require __DIR__ . '/../vendor/autoload.php';

$db = require('../config/database.php');

$container = new \MentesBrilhantes\Core\Container();

$router = new \MentesBrilhantes\Core\Http\Router\Router();

$stateModel = new \MentesBrilhantes\App\Models\State($db['host'], $db['db'], $db['user'], $db['password']);

$container->add('stateModel', $stateModel);

$router->get('/state', "\MentesBrilhantes\App\Controllers\StateController@allStates");
$router->get('/state/:state', "\MentesBrilhantes\App\Controllers\StateController@show");

$router->run($container);

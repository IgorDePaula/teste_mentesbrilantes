<?php

require __DIR__ . '/../vendor/autoload.php';

$db = require('../config/database.php');

$container = new \MentesBrilhantes\Core\Container();

$router = new \MentesBrilhantes\Core\Http\Router\Router();

$stateModel = new \MentesBrilhantes\App\Models\State($db['host'], $db['db'], $db['user'], $db['password']);
$cityModel = new \MentesBrilhantes\App\Models\City($db['host'], $db['db'], $db['user'], $db['password']);

$container->add('stateModel', $stateModel);
$container->add('cityModel', $cityModel);

$router->get('/state', "\MentesBrilhantes\App\Controllers\StateController@allStates");
$router->get('/state/:state', "\MentesBrilhantes\App\Controllers\StateController@show");

$router->get('/city', "\MentesBrilhantes\App\Controllers\CityController@allCities");
$router->get('/city/:city', "\MentesBrilhantes\App\Controllers\CityController@showCity");

$router->run($container);

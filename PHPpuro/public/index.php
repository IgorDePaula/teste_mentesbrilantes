<?php

require __DIR__ . '/../vendor/autoload.php';

$db = require('../config/database.php');

$container = new \MentesBrilhantes\Core\Container();

$router = new \MentesBrilhantes\Core\Http\Router\Router();

$stateModel = new \MentesBrilhantes\App\Models\State($db['host'], $db['db'], $db['user'], $db['password']);
$cityModel = new \MentesBrilhantes\App\Models\City($db['host'], $db['db'], $db['user'], $db['password']);
$addressModel = new \MentesBrilhantes\App\Models\Address($db['host'], $db['db'], $db['user'], $db['password']);
$userModel = new \MentesBrilhantes\App\Models\User($db['host'], $db['db'], $db['user'], $db['password']);

$container->add('stateModel', $stateModel);
$container->add('cityModel', $cityModel);
$container->add('addressModel', $addressModel);
$container->add('userModel', $userModel);

$router->get('/state', "\MentesBrilhantes\App\Controllers\StateController@allStates");
$router->get('/state/:state', "\MentesBrilhantes\App\Controllers\StateController@show");

$router->get('/city', "\MentesBrilhantes\App\Controllers\CityController@allCities");
$router->get('/city/:city', "\MentesBrilhantes\App\Controllers\CityController@showCity");

$router->get('/address', "\MentesBrilhantes\App\Controllers\AddressController@allAddresses");
$router->get('/address/:address', "\MentesBrilhantes\App\Controllers\AddressController@showAddress");

$router->get('/user', "\MentesBrilhantes\App\Controllers\UserController@allUsers");
$router->post('/user', "\MentesBrilhantes\App\Controllers\UserController@newUser");
$router->put('/user/:user', "\MentesBrilhantes\App\Controllers\UserController@updateUser");
$router->delete('/user/:user', "\MentesBrilhantes\App\Controllers\UserController@deleteUser");


$router->run($container);

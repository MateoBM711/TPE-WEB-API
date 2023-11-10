<?php
require_once 'libs/Router.php';
require_once './app/api/api-productos.controller.php';
$router = new Router();
$router->addRoute('productos', 'GET', 'ApiProductosController', 'getAll');
$router->addRoute('productos/:ID', 'GET', 'ApiProductosController', 'get');

$router->route($_REQUEST['resource'], $_SERVER ['REQUEST_METHOD']);
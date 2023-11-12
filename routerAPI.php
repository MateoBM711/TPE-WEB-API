<?php
require_once 'libs/Router.php';
require_once './app/api/api-productos.controller.php';
$router = new Router();
$router->addRoute('productos', 'GET', 'ApiProductosController', 'getAll');
$router->addRoute('productos/:ID', 'GET', 'ApiProductosController', 'get');
$router->addRoute('productos/:ID', 'DELETE', 'ApiProductosController', 'delete');
$router->addRoute('productos', 'POST', 'ApiProductosController', 'add');
$router->addRoute('productos/:ID', 'PUT', 'ApiProductosController', 'update');


$router->route($_REQUEST['resource'], $_SERVER ['REQUEST_METHOD']);
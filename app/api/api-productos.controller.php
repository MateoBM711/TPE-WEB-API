<?php

require_once './app/models/producto.model.php';
require_once './app/api/api.view.php';
class ApiProductosController {
    private $model;
    private $view;

    function __construct(){
      $this->model = new ProductoModel();  
      $this->view = new APIView();
    }
    public function getAll($params = null){
      $productos = $this->model->getProductos();
      $this->view->response($productos);
    }
    public function get($params = null){
      $idProducto = $params[':ID'];
      $producto = $this->model->getProductobyId($idProducto);
      $this->view->response($producto);
    }

}
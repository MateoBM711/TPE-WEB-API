<?php

require_once './app/models/producto.model.php';
require_once './app/api/api.view.php';
class ApiProductosController
{

  private $model;
  private $view;
  private $data;

  function __construct()
  {
    $this->model = new ProductoModel();
    $this->view = new APIView();
    $this->data = file_get_contents("php://input");
  }

  function getData()
  {
    return json_decode($this->data);
  }

  public function getAll($params = null)
  {
    $parametros = [];

    if (isset($_GET['sort'])) {
      $parametros['sort'] = $_GET['sort'];
    }

    if (isset($_GET['order'])) {
      $parametros['order'] = $_GET['order'];
    }


    $productos = $this->model->getProductos($parametros);
    $this->view->response($productos, 200);
  }

  public function get($params = null)
  {
    $idProducto = $params[':ID'];
    $producto = $this->model->getProductobyId($idProducto);
    if ($producto) {
      $this->view->response($producto, 200);
    } else {
      $this->view->response("El producto solicitado no existe", 404);
    }
  }

  public function delete($params = null)
  {
    $idProducto = $params[':ID'];

    $success = $this->model->delete($idProducto);
    if ($success) {
      $this->view->response("El producto se elimino", 200);
    } else {
      $this->view->response("El producto solicitado no existe", 404);
    }
  }

  public function add()
  {
    $body = $this->getData();

    $id = $body->id;
    $nombre = $body->nombre;
    $descripcion = $body->descripcion;
    $precio = $body->precio;
    $imagen = $body->imagen;
    $id_categoria = $body->id_categoria;

    $id = $this->model->insert($id, $nombre, $descripcion, $precio, $imagen, $id_categoria);
    if ($id == 0) {
      $this->view->response("El producto se agrego correctamente", 200);
    } else {
      $this->view->response("No se pudo agregar", 500);
    }
  }
  public function update($params = null)
  {
    $idProducto = $params[':ID'];
    $body = $this->getData();
  
    $nombre = $body->nombre;
    $descripcion = $body->descripcion;
    $precio = $body->precio;
    $imagen = $body->imagen;
    $id_categoria = $body->id_categoria;

    $success = $this->model->update($idProducto, $nombre, $descripcion, $precio, $imagen, $id_categoria);

    if ($success) {
      $this->view->response("El producto se actualizo correctamente", 200);
    } else {
      $this->view->response("El producto no pudo ser actualizado", 500);
    }    

  }
}

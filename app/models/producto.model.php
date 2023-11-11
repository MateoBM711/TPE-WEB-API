<?php
class ProductoModel
{

    function connect()
    {
        $db = new PDO("mysql:host=localhost; dbname=local_limpieza", "root", "");
        return $db;
    }

    function getProductosbyCategoria($idCategoria = null)
    {
        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM producto WHERE id_categoria = ?');
        $query->execute([$idCategoria]);

        $productos = $query->fetchAll(PDO::FETCH_OBJ);

        return $productos;
    }

    function getProductobyId($id)
    {
        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM producto WHERE id = ?');
        $query->execute([$id]);

        $producto = $query->fetchAll(PDO::FETCH_OBJ);

        return $producto;
    }

    function getProductos($parametros)
    {
        $db = $this->connect();

        $sql = 'SELECT * FROM producto';

        if (isset($parametros['order'])) {
            $sql .= ' ORDER BY ' . $parametros['order'];
            if (isset($parametros['sort'])) {
                $sql .= ' ' . $parametros['sort'];
            }
        }

        $query = $db->prepare($sql);
        $query->execute();

        $productos = $query->fetchAll(PDO::FETCH_OBJ);

        return $productos;
    }
    function delete($id)
    {
        $db = $this->connect();

        $query = $db->prepare('DELETE FROM producto WHERE id = ? ');
        $query->execute([$id]);

        return $query->rowCount();
    }
    function insert($id, $nombre, $descripcion, $precio, $imagen, $id_categoria)
    {
        $db = $this->connect();

        $query = $db->prepare('INSERT INTO producto (id, nombre, descripcion, precio, imagen, id_categoria) VALUES (?,?,?,?,?,?) ');
        $query->execute([$id, $nombre, $descripcion, $precio, $imagen, $id_categoria]);

        return $db->lastInsertId();
    }
}

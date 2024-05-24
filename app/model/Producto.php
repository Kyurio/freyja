<?php

namespace app\model;

require_once __DIR__ . '/../database/database.php';

use app\database\Database;
use PDO;

class Producto
{
    protected $db;
    protected $table = 'producto';

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getLastInsertedId()
    {
        try {
            $stmt = $this->db->prepare("SELECT id_producto FROM " . $this->table . " ORDER BY id_producto DESC LIMIT 1");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getAllOfertas()
    {

        try {
            $stmt = $this->db->prepare("SELECT *, a.nombre AS producto, b.nombre AS categoria FROM producto a INNER JOIN categorias b ON a.id_categoria = b.id_categoria INNER JOIN imagen_producto c ON a.id_producto=c.id_producto WHERE oferta = 1  GROUP BY a.id_producto DESC");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            return $th;
        }
    }


    public function getAll()
    {
        try {
            $stmt = $this->db->prepare("SELECT *, b.nombre AS categorias, a.nombre AS producto FROM producto a INNER JOIN categorias b ON a.id_categoria=b.id_categoria");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getAllClient()
    {
        try {
            $stmt = $this->db->prepare("SELECT *, a.nombre AS producto, b.nombre AS categoria FROM producto a INNER JOIN categorias b ON a.id_categoria = b.id_categoria INNER JOIN imagen_producto c ON a.id_producto=c.id_producto  GROUP BY a.id_producto DESC");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getById($id)
    {

        try {

            $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE id_producto = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            echo  $th->getMessage();
        }
    }

    public function getCantidadTipoProducto()
    {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(id_producto) As cantidad_producto, b.nombre FROM producto a INNER JOIN categorias b ON a.id_categoria=b.id_categoria GROUP BY a.id_categoria");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function create($data)
    {

        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = implode(', ', array_fill(0, count($data), '?'));

            $stmt = $this->db->prepare("INSERT INTO " . $this->table . " (" . $columns . ") VALUES (" . $placeholders . ")");

            if ($stmt) {
                $i = 1;

                foreach ($data as $value) {
                    $stmt->bindValue($i++, $value);
                }

                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                echo ("Error al preparar la consulta de inserción.");
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function update($id, $data)
    {
        try {


            $sets = array();
            foreach ($data as $key => $value) {
                $sets[] = $key . "=?";
            }

            $stmt = $this->db->prepare("UPDATE " . $this->table . " SET " . implode(',', $sets) . " WHERE id_producto = ?");
            $stmt->execute(array_merge(array_values($data), array($id)));

            if ($stmt->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function delete($id)
    {

        try {

            $stmt = $this->db->prepare("DELETE FROM " . $this->table . " WHERE id_producto = ?");
            $stmt->execute(array($id));
            return $stmt->rowCount();
        } catch (\Throwable $th) {
            $th->getMessage();
        }
    }
}

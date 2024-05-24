<?php

namespace app\model;

require_once __DIR__ . '/../database/database.php';

use app\database\Database;
use PDO;

class Imagen
{
    protected $db;
    protected $table = 'imagen_producto';

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {

        try {

            $stmt = $this->db->prepare("SELECT * FROM " . $this->table);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE id_producto = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function create($data)
    {

        $columns = implode(',', array_keys($data));
        $values = implode(',', array_fill(0, count($data), '?'));

        $stmt = $this->db->prepare("INSERT INTO " . $this->table . "(" . $columns . ") VALUES (" . $values . ")");
        $stmt->execute(array_values($data));

        return $this->db->lastInsertId();
    }

    public function update($id, $data)
    {
        $sets = array();
        foreach ($data as $key => $value) {
            $sets[] = $key . "=?";
        }

        $stmt = $this->db->prepare("UPDATE " . $this->table . " SET " . implode(',', $sets) . " WHERE id = ?");
        $stmt->execute(array_merge(array_values($data), array($id)));

        return $stmt->rowCount();
    }

    public function delete($id)
    {

        try {
        
            $stmt = $this->db->prepare("DELETE FROM " . $this->table . " WHERE id_categoria = ?");
            $stmt->execute(array($id));
    
            return $stmt->rowCount();
        
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}

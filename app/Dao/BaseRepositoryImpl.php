<?php
namespace App\Dao;
use App\Config\Database;
class BaseRepositoryImpl implements BaseDao {
    
    protected $table_name;
    protected $conn;

    public function __construct($table_name){
        $this->table_name = $table_name;
        $this->conn = Database::getConnection();
    }

    
    public function findById($id){
        $query = "select * from ".$this->table_name. " where id = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findAll(){
        $query = "select * from ".$this->table_name ;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id){
        $query = "delete from ".$this->table_name. " where id = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($data){

    }

    public function create($data){

    }


}

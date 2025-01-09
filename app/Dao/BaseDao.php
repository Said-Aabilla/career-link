<?php
namespace App\Dao;

interface BaseDao {
    
    public function findById($id);
    public function findAll();
    public function delete($id);
    public function update($data);
    public function create($data);

}
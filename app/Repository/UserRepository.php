<?php
namespace App\Repository;
use App\Dao\BaseRepositoryImpl;
use App\Entity\User;
use PDO;

class UserRepository extends BaseRepositoryImpl {


    private static $table = 'Users';

    public function __construct(){
        parent::__construct(self::$table);
    } 

    public function findByEmail($email){
        $query = "select * from ".$this->table_name. " where email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row =  $stmt->fetch(PDO::FETCH_ASSOC);

        if($row)
            return new User($row['id'],$row['email'], $row['password'], '', $row['created_at'], $row['deleted_at']);
        else 
            return null;
    }

}

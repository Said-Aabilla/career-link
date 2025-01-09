<?php
namespace App\Repository;
use App\Dao\BaseRepositoryImpl;
use App\Entity\Role;
use PDO;

class RoleRepository extends BaseRepositoryImpl {


    private static $table = 'Roles';

    public function __construct(){
        parent::__construct(self::$table);
    } 

    public function findByUserId($user_id){
        $query = "select Roles.id as id, Roles.title as title from ".$this->table_name. " inner join Users on Users.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
        $row =  $stmt->fetch(PDO::FETCH_ASSOC);

        if($row)
            return new Role($row['id'],$row['title']);
        else 
            return null;
    }

}

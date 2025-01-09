<?php
namespace App\Repository;
use App\Dao\BaseRepositoryImpl;
use App\Entity\User;
use PDO;

class UserRepository extends BaseRepositoryImpl {


    private static $table = 'Users';
    private  $roleRepository;

    public function __construct(){
        parent::__construct(self::$table);
        $this->roleRepository = new RoleRepository();
    } 

    public function findByEmail($email){
        $query = "select * from ".$this->table_name. " where email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row =  $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            $role = $this->roleRepository->findByUserId($row['id']);
            return new User($row['id'],$row['email'], $row['password'], $role, $row['created_at'], $row['deleted_at']);
        }
        else 
            return null;
    }


    public function create($user){


        $query = "insert into ".$this->table_name. "(email, password, role_id) VALUES (:email,:password,:role_id)";
        $stmt = $this->conn->prepare($query);
        $email = $user->getEmail();
        $password = $user->getPassword();
        $role_id = $user->getRole();

        $stmt->bindParam(':email',$email );
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role_id', $role_id);
       
        $row =   $stmt->execute();

        if($row){
            return $row;
        }
        else 
            return null;
    }
}

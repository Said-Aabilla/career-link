<?php
namespace App\Http\Request;

class RegisterRequest{


    private $email;
    private $password;
    private $role;


    public function __construct($email, $password, $role){
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }


    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }
    
    public function getRole(){
        return $this->role;
    }


    public function validate(){
        return false;
    }
}

<?php

namespace App\Entity;


class User {
    public $id;
    public $email;
    public $password;
    public $role;
    public $created_at;
    public $deleted_at;
    
    public function __construct($id, $email, $role,$password='', $created_at='', $deleted_at='') {
            $this->id = $id;
            $this->email = $email;
            $this->role = $role;
            $this->password = $password;
            $this->created_at = $created_at;
            $this->deleted_at = $deleted_at;
    }


    public function getId() { return $this->id; }
    public function getRole() { return $this->role; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getCreatedAt() { return $this->created_at; }
    public function getDeletedAt() { return $this->deleted_at; }
    
}
?>
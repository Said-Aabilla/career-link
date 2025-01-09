<?php
namespace App\Exception;
use PDOException;
class DatabaseException extends PDOException{

   public function __construct($message, $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }



    public function redirect_error(){
        session_start();
        $_SESSION['error']=$this->getMessage()." ".$this->getCode();
        header('Location:../error.php');
        exit();
    }

}
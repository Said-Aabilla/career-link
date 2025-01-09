<?php
namespace App\Http\Controller;

class BaseController {


    public function redirect($path, $error){
        session_start();
        $_SESSION['error'] = $error;
        header('Location:'.$path);
        exit();
    }

}

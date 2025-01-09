<?php
namespace App\Http\Controller\Auth;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Http\Controller\BaseController;

class AuthController extends BaseController {


    private $userRepo;


    public function __construct(){
        $this->userRepo = new UserRepository();
    }


    public function register ($request){

        if(!$request->validate()){
            $this->redirect('../../Views/error.php', 'error: register request data not valid');
        }


        $userFoundByEmail = $this->userRepo->findByEmail($request->getEmail());
        if($userFoundByEmail){
            $this->redirect('../../Views/error.php', 'error: user already exists with email '.$request->getEmail());
        }


        $hashed_password = password_hash($request->getPassword(), PASSWORD_DEFAULT);
        
        $isUserSaved = $this->userRepo->create(new User('', $request->getEmail(), $request->getRole(),$hashed_password));


        $this->redirect('../../Views/auth/login.php', '');

    }

    public function login ($email, $password){
        
    }

}

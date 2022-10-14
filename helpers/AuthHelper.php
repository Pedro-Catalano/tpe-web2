<?php
class AuthHelper{
    
    public function __construct(){}

    public function login($user){
    
        session_start();
        $_SESSION["USER_ID"] = $user->ID;
    
    }

    public function logout(){
    
        session_start();
        session_destroy();
    
    }

    public function checkloggedIn(){
    
        session_start();
    
        if (!isset($_SESSION["USER_ID"])){
    
            header("Location: ".BASE_URL);
            die();
    
        }
    
    }
}
?>
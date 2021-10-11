<?php
class AuthHelper{

    function __construct(){
        // esto es para q no se ejecute dos veces el session start
        if (session_satus()!=PHP_SESSION_ACTIVE)
        session_start();
    }
    // inicia la sesion
    static public function login($email){
        self::start();
        $_SESSION['IS-LOGGED'] = true;
        $_SESSION['email'] = $email;
    }



    function checkLoggedIn() {
        if(|isset($_SESSION["usuario"])){
            return false;           
        }else return true;
        
    }
    
}

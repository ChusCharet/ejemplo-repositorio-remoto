<?php
require_once "controler/Amigurumicontroller.php";
require_once "controler/LoginController.php";
require_once "db.php";
require_once ".libs/smarty-master/libs/Smarty.class.php";

define('', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');



//lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
else {
    $action = 'home'; //acción por default si no envian
}

$params = explode('/', $action); //parsea la acción
// instancio la clase poniendo la variable primero
$amigurumiController = new AmigurumiController();
$loginController = new LoginController();


//determina que camino seguir según la acción
switch ($params[0]) {
    case 'login': 
        $loginController->login(); 
        break;
    case 'logout': 
        $loginController->logout(); 
        break;
    case 'verify': 
        $loginController->verifyLogin(); 
        break;
    case 'home':
       $amigurumiController-> showHome();
        break;
    case 'createAmigurumi': 
        $amigurumiController->createAmigurumi(); 
        break;
    case 'deleteAmigurumi': 
    $amigurumiController->deleteAmigurumi($params[1]); 
        break;
    case 'updateAmigurumi': 
        $amigurumiController->updateAmigurumi($params[1]); 
        break;
    case 'viewAmigurumi': 
        $amigurumiController->viewAmigurumi($params[1]); 
        break;
    default:
    echo('404 Page not found');
    break;
}
    $smarty =new smarty();
};



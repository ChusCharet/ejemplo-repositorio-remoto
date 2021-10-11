<?php
require_once "./model/AmigurumiModel.php";
require_once "./view/AmigurumiView.php";
require_once "./AuthHelper.php";

class AmigurumiController{
    private $model;
    private $view;
    private $authHelper;

    function __construct(){
        $this->model = new AmigurumiModel();
        $this->view =new AmigurumiView();
        $this->AuthHelper = new AuthHelper();

    }
    // El route llama al controller
        
    function showHome(){
        //se tiene que conectar a la base de datos para traer los amigurumis
        // $model->getAmigurumis(); para no repetirlo creamos el atributo linea 7 y agregamos $this

        $this->authHelper->checkLoggedIn();
        $amigurumis =$this->model->getAmigurumis();
        $this->view->showAmigurumis($amigurumis);
    }

        // header esto va en vista
    function createAmigurumi($id){
        $this->authHelper->checkLoggedIn();
        $this->model->insertAmigurumi();
        $this->view->showHomeLocation();

        // if(isseet($_POST['color'], $_POST['tamaño'], $_POST['precio']))
        
    }
    function deleteAmigurumi($id){
        $this->authHelper->checkLoggedIn();
        $this->model->deleteAmigurumiFromDB($id);
        $this->view->showHomeLocation();
    }

    function updateAmigurumi($id){
        $this->authHelper->checkLoggedIn();
        $this->model->updateAmigurumiFromDB($id);
        $this->view->showHomeLocation();
    }
    
    function viewAmigurumi($id){
        $this->authHelper->checkLoggedIn();
        $amigurumi = $this->model->getAmigurumi($id);
        $this->view->showAmigurumi($amigurumi);
    }
}

//linea 24 va a llamar al modelo, va a entrar a la db y  me va a traer los amigurumis y los va a mostrar en view linea 25

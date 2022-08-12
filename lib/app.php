<?php
require_once 'controllers/fail.php';


class App{

    public function __construct(){
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $this -> url = $url;
        // var_dump($url);
        // $controllerFile = 'controllers/'.$url[0].'.php';

        // if(file_exists($controllerFile)){
        //     require_once $controllerFile;
        //     $controller = new $url[0];
        //     if(isset($url[1])){
        //         $controller -> {$url[1]}();
        //     }
        // }
        // else{
        //     $controller = new Fail();
        // }
        $this->LoadController();
    }
    public function LoadController(){
        $File = 'controllers/'.$this->url[0].'.php';
        if(file_exists($File)){
            require_once $File;
            $nameController = $this-> url[0];
            $controller = new $nameController;
            if(isset($this->url[1])){
                $method = $this->url[1];
                $controller -> {$method}();
            }
        }
        else{
            $controller = new Fail();
        }
    }
}
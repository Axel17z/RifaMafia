<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {

        return "index de codegniter 4";
       # return view('welcome_message');
    }

    public function saludar(){
        echo "Hola tu";
    }


    public function saludar2($nombre="Mundo", $edad){
        echo "Hola  $nombre";
        echo "<br>";
        echo "Tienes $edad años";
        echo "<br>";
        echo ($edad>=18)?"Eres mayor de edad" : "Eres menor de edad";
    }

    //http://localhost:8080/usuariotest
    public function usuarioTest(){
        $usuarioModel = new \App\Models\UsuarioModel();
        //-----CRUD----
        //buscar
        //editar
        //eliminar registros
        //consultar
        echo "<pre>";
        print_r( $usuarioModel->findAll() );
        echo "</pre>";
    }




}

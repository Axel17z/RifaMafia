<?php

//carpeta donde se encuentra el archivo
namespace App\Controllers;

class Calculadora extends baseController{

public function index(){
    #HTML o TEXTO
  //  echo "<h1 style='color:#0022aa;' >CALCULADORA</h1>";
  //  echo "<p>La mejor calculadora del mundo<p>";

  #JSON API
   // return json_encode(["arturo","maria", "roky"]);

   #VISTA
   return view("calculadora");
}


public function sumar(){
  $numero1  = $_POST["numero1"];
  $numero2  = $_POST["numero2"];
  $opereacion = $_POST["operacion"];
  
  $resultado = $numero1 + $numero2;

  echo "La suma es: $resultado";  
}

public function calcular(){
  #Definir variables e inicializar sus valores
  $numero1  = $_POST["numero1"];
  $numero2  = $_POST["numero2"];
  $opereacion = $_POST["operacion"];
  $resultado = 0;

  #logica de programacion
  switch ($opereacion) {
    case 'sumar': $resultado = $numero1+$numero2; break;
    case 'restar': $resultado = $numero1-$numero2;    break;
    case 'multiplicar': $resultado = $numero1*$numero2;    break;
    case 'dividir': 
          $resultado = ($numero2!=0) ?
          $numero1/$numero2 :
          "No se puede dividir entre 0" ;
    break;  
  } 
  #mostrar resultados
  echo "<h3>Primer numero: $numero1  </h3>";
  echo "<h3>Segundo numero: $numero2 </h3>";
  echo "<h2>Operacion: $opereacion   </h2>";
  echo "<h1>Resultado: $resultado    </h1>"; 
}



}
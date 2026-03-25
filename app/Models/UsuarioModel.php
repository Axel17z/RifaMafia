<?php 
#RIFAS/app/models/UsuarioModel.php

namespace App\Models;

//importar model
use CodeIgniter\Model;

class UsuarioModel extends Model{

protected $table ="usuarios";

protected $primaryKey = "id";

//para eliminar registros virtualmente
protected $useSoftDeletes = false;

//Campos que se pueden insertar/editar
protected $allowedFields =[
    "email",
    "password",
    "nombre",
    "status"
];

 protected $useTimestamps = false;
 


}
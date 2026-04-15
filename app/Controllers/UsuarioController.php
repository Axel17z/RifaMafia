<?php

/*
Modelo: Se conecta a la tabla de la base de datos

Controlador: logica de programacion (CRUD)
 y salida de datos(imprimir, view html, json, redireccion)

Routes: indicamos que url va a acceder a que funcion de que controlador

Views: Plantilla html o php con un diseño preestablecido listo para usar

*/ 

namespace App\Controllers;

use CodeIgniter\Controller; 
use App\Models\UsuarioModel;

class UsuarioController extends  BaseController{

#GET Mostrar usuarios (VIEW)
# route:  /
public function index(){

    if (!session()->has('usuario')){
        return redirect()->to('/usuarios/login');
    }

    $model = new UsuarioModel();

    $usuarios =  $model->findAll();
    
    $data= array(
        "usuarios" => $usuarios,
        "algo"  => "este es el valor de algo"
    );

    return view("usuarios/usuarios_index",$data);


}


#GET Mostar usuario {id} (VIEW)
#/(:num) 
public function show($id)
    {
        $model = new UsuarioModel();
        $usuario = $model->find($id);

        $data = array("usuario" => $usuario); 

        return view("usuarios/usuarios_show",$data ); 
     
    }

#GET mostrar formulario para agregar usuario (VIEW)
#/create 

public function create(){
    return view("usuarios/usuarios_create");
}

#POST accion: crear usuario  (redicrecciona -> usuarios/{id})
#/store 
public function store() {
    // 1.instanciar modelo para agregar usuario model para conectarnos a la DB
    $model = new UsuarioModel();

    // 2. Definimos las reglas de validación (no olbigatorio)
    $reglas = [
        'nombre'     => 'required',
        'email'      => [
            'rules' => 'required|valid_email|is_unique[usuarios.email]',
             'errors' => [
                'is_unique' => 'El correo ya existe!',
                'valid_email' =>'El formato del correo es invalido'
            ]
        ],
        'contrasena' => [
            'label'  => 'Contraseña',
            'rules'  => 'required|min_length[8]|max_length[30]|regex_match[/(?=.*[A-Z])(?=.*[0-9])/]',
            'errors' => [
                'regex_match' => 'La {field} debe tener al menos una mayúscula y un número, minimo 8 y maximo 30 caracteres.'
            ]
        ]
    ];

    // 3. Ejecutamos la validación
    if (!$this->validate($reglas)) {  
         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors()); 
    } 

    // 4. Todo esta bien y listo para ser creado

    // 5. Se genera un codigo random de 5 caracteres para activar el usuario
    $codigo =random_int(10000,99999);
    
    // 6. Se configura el array $datos con las columnas de la tabla usuarios y sus valores
    //    passwor hashado
    //    status inactivo
    $datos = [
        "nombre"   => $this->request->getPost("nombre"),
        "email"    => $this->request->getPost("email"),
        "password" => password_hash($this->request->getPost("contrasena"), PASSWORD_DEFAULT),
        "status"   => "inactivo", 
        "codigo_activacion" => $codigo 
    ];

    // 7. se crear el registro en la tabla usuario y retorna el {id} del nuevo usuario
    $usuario_id = $model->insert($datos);

    // 8.se instancia el email y se configura
    $email = \Config\Services::email(); 
    $email->setTo( $this->request->getPost("email") );
    $email->setFrom("rifas@pitalla.com" );
    $email->setSubject("Activa tu cuenta de RIFAPP");

    $email->setMessage("
    <h1>Activa tu cuenta en el siguiente enlace:</h1>
    <a href='http://localhost:8080/usuarios/activar/$usuario_id/$codigo'>
        Clic aqui para activar cuenta
    </a>
    ");

    
    //9. enviar correo
    if($email->send()){
    // 10. redireccionar a index con el mensaje de usuario creado
        return redirect()->to('/usuarios')->with('msg', 'Usuario creado exitosamente, ve a tu correo y activalo!');
    }else{
        return $email->printDebugger(['headers']); 
    }   
    
}



#GET Mostrar formulario para editar usuario {id} (VIEW)
#/edit/(:num) 

public function edit($id){
    $model = new UsuarioModel();
    $data = array(
        "usuario" =>$model->find($id)
    );
    return view("usuarios/usuarios_edit",$data);
}

#POST Accion: actualizar info del usuario {id} en la base de datos (Redireccion -> /usuarios)
#/update/(:num) 
public function update($id){
    $model = new UsuarioModel();
    $datos = array();

    if($this->request->getPost("nombre")){$datos["nombre"]= $this->request->getPost("nombre"); }
    if($this->request->getPost("email")){$datos["email"]= $this->request->getPost("email"); }

    if($this->request->getPost("contrasena")){ 
        $datos["contrasena"] = password_hash($this->request->getPost("contrasena"), PASSWORD_DEFAULT ); 
        }

    $model->update($id,$datos);
    return redirect()->to("/usuarios")->with('msg', 'Usuario editado exitosamente'); 
}

#POST accion: eliminar usuario {id}
#/delete/(:num) 

public function delete($id){
    $model = new UsuarioModel();
    $model->delete($id);
    return redirect()->to('/usuarios')->with('msg', 'Usuario eliminado!');
}

#GET mostrar login
#/login

public function login(){
    if (session()->has('usuario'))
        return redirect()->to('/usuarios');
    
    
    return view("usuarios/login");
}

#post accion: validar login
#/login/auth 

public function auth(){
    $email = $this->request->getPost("email");
    $contrasena = $this->request->getPost("contrasena");

    $model = new UsuarioModel();
    $usuario = $model->where("email",$email)->where("status","activo")->first();

    if($usuario && password_verify($contrasena, $usuario["password"])){
    $data=array("usuario" =>$usuario);
    session()->set($data);

    return redirect()->to("/usuarios");

    
    }else{
    return redirect()->to("/usuarios/login")->withInput()->with("msg", "Credenciales incorrectas o usuario inactivo");
    }
}

#post accion: logout
#/logout

public function logout(){
    session()->destroy();
    return redirect()->to("/usuarios/login")->with("msg", "Sesion cerrada correctamente");
}}
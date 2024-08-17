<?php
    require_once "../../../clases/Conexion.php";
    require_once "../../../clases/Usuario.php";
 
    $password = sha1($_POST['password']);
    $id_rol = ($_POST['rol']);
    $datos = array(

        "nombre" => $_POST['nombre'], 
        "usuario" => $_POST['usuario'], 
        "correo" => $_POST['email'], 
        "password" => $password,
        "departamento" => $_POST['dep'],
        "idrol" => $id_rol
        

    );
    $usuario = new Usuario();
    echo $usuario->agregarUsuario($datos);

    
  
?>
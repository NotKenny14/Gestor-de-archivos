<?php 


require_once "../../clases/Usuario.php";

$usuario = new Usuario();


echo json_encode($usuario-> obtenerDatoUsuario($_POST['idusuario']));

 ?>
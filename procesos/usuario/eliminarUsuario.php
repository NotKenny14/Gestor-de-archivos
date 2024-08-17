<?php 
require_once "../../clases/Usuario.php";
	$usuario = new Usuario(); 




echo $usuario->eliminarUsuario($_POST['idusuario']);


 ?>
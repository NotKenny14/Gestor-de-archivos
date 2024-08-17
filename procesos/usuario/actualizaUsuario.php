<?php 
	require_once "../../clases/Usuario.php";
	$usuario = new Usuario(); 

    


	$datos = array (
				$_POST['idUsuario'],
				$_POST['nombreU'],
				$_POST['usuarioU'],
				sha1($_POST['passwordU']),
				$_POST['rolU']
					);

	echo $usuario->actualizarUsuario($datos);
 ?>
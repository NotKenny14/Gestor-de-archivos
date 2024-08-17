<?php

session_start();

require_once"../../clases/Carpetas.php";
$Carpetas = new Carpetas();

$datos = array(
			"idUsuario" => $_SESSION['idUsuario'],
			"carpeta" => $_POST['carpeta'],
			"tramite" => $_POST['tramite']

				);
	echo $Carpetas->agregarCarpeta($datos);

?>
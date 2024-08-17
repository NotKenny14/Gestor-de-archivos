<?php 

	session_start();
	require_once "../../clases/Gestor.php";
	$Gestor = new Gestor();
	$idUsuario = $_SESSION['idUsuario'];
	$idArchivo = $_POST['idArchivo'];
	echo $Gestor->noCompartirArchivo($idArchivo, $idUsuario);

 ?>
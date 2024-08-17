<?php 
session_start();
	require_once "../../clases/Gestor.php";

	$datos = array(
	"id" => $_POST['idArchivo'],
	"usuario" => $_POST['dep']
						);
	$gestor = new Gestor();
	echo $gestor->compartirArchivo($datos);
 ?>

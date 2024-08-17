<?php 

require_once "../../clases/Carpetas.php";
$Carpetas = new Carpetas();

$datos = array (
				"idCarpeta" => $_POST['idCarpeta'],
				 "carpeta" => $_POST['carpetaU']
				);

echo $Carpetas->actualizarCarpeta($datos);

 ?>
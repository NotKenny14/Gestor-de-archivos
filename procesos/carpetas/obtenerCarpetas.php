<?php  

require_once "../../clases/Carpetas.php";
$Carpetas = new Carpetas();

echo json_encode($Carpetas->obtenerCarpeta($_POST['idCarpeta']));

?>
<?php 

	session_start();
	require_once "../../clases/Conexion.php";

	$c = new Conectar();
	$conexion = $c->conexion();

		$idUsuario = $_SESSION['idUsuario'];
		$sql = "SELECT id_carpeta, nombre 
		FROM t_carpetas 
		WHERE id_usuario = '$idUsuario'";
		$result = mysqli_query($conexion, $sql);
 ?>



 	<select name="carpetasArchivos" id="carpetasArchivos" class="form-control">
 		<?php 
 			while($mostrar = mysqli_fetch_array($result)){
 				$idCarpeta = $mostrar['id_carpeta'];
 		 ?>

 		 	<option value="<?php echo $idCarpeta ?>"> <?php echo $mostrar['nombre']; ?></option>
 		<?php 
 			}
 		 ?>
 	</select>
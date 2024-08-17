<?php 

	session_start();
	require_once "../../clases/Conexion.php";

	$c = new Conectar();
	$conexion = $c->conexion();

		
		$sql = "SELECT * FROM t_tramite ";
		$result = mysqli_query($conexion, $sql);
 ?>

 	<br>
 	<label>Tramite</label>
 	<select name="tramites" id="tramites" class="form-control">
 		<?php 
 			while($mostrar = mysqli_fetch_array($result)){
 				$idT = $mostrar['id_tramite'];
 				$tramite = $mostrar['tramite'];
 		 ?>

 		 	<option value="<?php echo $idT ?>"> <?php echo $tramite ?></option>
 		<?php 
 			}
 		 ?>
 	</select>
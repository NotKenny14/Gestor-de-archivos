<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	$idUsuario = $_SESSION['idUsuario'];
	$conexion = new Conectar();
	$conexion = $conexion->conexion();

 ?>
<div class="table-responsive">
	<table class="table table-hover" id="tablaCarpetasDataTable">
		<thead class="thead-dark">
			<th style="text-align: center;">Nombre</th>
			<th style="text-align: center;">Tramite</th>
			<th style="text-align: center;">Fecha</th>
			<th style="text-align: center;">Abrir Carpeta</th>
		</thead>
		<tbody>
			<?php 

			$sql = "SELECT t_carpetas.nombre, t_tramite.tramite, t_carpetas.fechaInsert, t_carpetas.id_carpeta 
					FROM t_carpetas 
                    INNER JOIN 
                    t_tramite ON t_carpetas.id_tramite = t_tramite.id_tramite
					WHERE id_usuario = '$idUsuario'";
			$result = mysqli_query($conexion, $sql);

			while ($mostrar = mysqli_fetch_array($result)) {
				$idCarpeta = $mostrar['id_carpeta'];
			
			 ?>
			<tr style="text-align: center;">
				<td><?php echo $mostrar['nombre']; ?></td>
				<td><?php echo $mostrar['tramite']; ?></td>
				<td><?php echo $mostrar['fechaInsert']; ?></td>
				<td style="text-align: center;">
					<span class="btn btn-warning btn" onclick="obtenerDatosCarpeta('<?php echo $idCarpeta  ?>')" data-toggle="modal" data-target="#modalActualizar"><span class="fa-regular fa-folder-open"></span></span>
				</td>
			</tr>
			<?php 
				}
			 ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaCarpetasDataTable').DataTable({"language": {
"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
}});
	});
</script>
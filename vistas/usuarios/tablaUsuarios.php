<?php 
	require_once "../../clases/Conexion.php";
	$c = new Conectar();
	$conexion = $c->conexion();

	$sql = "SELECT t_usuarios.id_usuario,t_usuarios.nombre,t_usuarios.usuario,t_usuarios.email,t_departamento.departamento,t_rol.rol FROM t_usuarios INNER JOIN t_rol ON t_usuarios.id_rol = t_rol.id INNER JOIN t_departamento ON t_usuarios.id_dep = t_departamento.id_dep";
	$result = mysqli_query($conexion, $sql);
 ?>
<div class="table-responsive">
	<caption><label><b>Usuarios registrados</b></label></caption>
	
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;" id="tablaUsuariosDataTable">
		<thead class="thead-dark">
	<tr>
		<td style="text-align: center;"><b>Usuario</b></td>
		<td style="text-align: center;"><b>Departamento</b></td>
		<td style="text-align: center;"><b>Rol</b></td>
		<td style="text-align: center;"><b>Editar</b></td>
		<td style="text-align: center;"><b>Eliminar</b></td>
	</tr>
		</thead>
		<?php while ($mostrar=mysqli_fetch_row($result)):?>
			
	<tr>
		
		<td><?php echo $mostrar[2]; ?></td>
		
		<td><?php echo $mostrar[4]; ?></td>
		<td><?php echo $mostrar[5]; ?></td>
		<td>
			<span class="btn btn-warning btn-sm " data-toggle="modal" data-target="#exampleModalCenter" onclick="agregaDatosUsuario('<?php echo $mostrar[0] ?>')"><span class="fa-regular fa-pen-to-square"></span></span>
		</td>
		<td>
			<span class="btn btn-danger btn-sm " onclick="eliminarUsuario('<?php echo $mostrar[0] ?>')"><span class="fa-solid fa-trash-can"></span></span>
		</td>
	</tr>
<?php endwhile; ?>
	</table>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaUsuariosDataTable').DataTable({"language": {
"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
}});
    });
    </script>



    	
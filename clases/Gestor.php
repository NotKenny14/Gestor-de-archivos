<?php  

	require_once "Conexion.php";

	class Gestor extends Conectar {
		public function agregaRegistroArchivo($datos) {
			$conexion = Conectar::conexion();
			$sql = "INSERT INTO t_archivos (id_usuario,
											id_carpeta,
											nombre,
											tipo,
											ruta,
											id_formato) 
					VALUES (?, ?, ?, ?, ?, ?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("iisssi", $datos['idUsuario'],
										$datos['idCarpeta'],
										$datos['nombreArchivo'],
										$datos['tipo'],
										$datos['ruta'],
										$datos['idFormato']);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

		public function obtenerRutaArchivo($idArchivo) {
			$conexion = Conectar::conexion();
			$sql = "SELECT id_archivo, nombre, tipo FROM t_archivos WHERE id_archivo = '$idArchivo'";
			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);
			$Archivo = array(
				"idArchivo" => $datos['id_archivo']
			);
			$idArchivo = $datos['id_archivo'];
			$nombreArchivo = $datos['nombre'];
			$extension = $datos['tipo'];
			return self::tipoArchivo($nombreArchivo, $extension);
		}

		public function tipoArchivo($nombre, $tipo) {
		$idUsuario = $_SESSION['idUsuario'];

		$ruta = "../archivos/"."/".$nombre;

		switch ($tipo) {
			

			case 'pdf':
				return '<embed src="'.$ruta.'#toolbar=0&scrollbar=0" type="application/pdf" width="100%" height="600px"/>';
				break;

		}
}


public function compartirArchivo($datos){
	$conexion = Conectar::conexion();
	$sql = "INSERT INTO t_compartir(id_archivo,id_usuario) VALUES(?,?)";

	$query = $conexion->prepare($sql);
	$query->bind_param('ii', $datos['id'],
								$datos['usuario']);

	$exito = $query->execute();
	$query->close();
	return $exito;
}
public function noCompartirArchivo($idArchivo, $idUsuario){

		$conexion = Conectar::conexion();
		$sql = "DELETE FROM t_compartir WHERE id_archivo = ? AND id_usuario=?";
		$query = $conexion->prepare($sql);
		$query->bind_param('ii', $idArchivo, $idUsuario);
		$respuesta = $query->execute();
		$query->close();
		return $respuesta;

}

	}



 ?>
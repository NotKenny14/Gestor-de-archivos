<?php

require_once "Conexion.php";
class Carpetas extends Conectar {
	public function agregarCarpeta($datos) {

		$conexion = Conectar::conexion();

		$sql = "INSERT INTO t_carpetas (id_usuario, nombre, id_tramite) VALUES (?, ?, ?)";
		$query = $conexion->prepare($sql);
		$query->bind_param("isi", $datos['idUsuario'],
									$datos['carpeta'],
									$datos['tramite']);

		$respuesta = $query->execute();
		$query->close();

		return $respuesta;
			}


		public function obtenerCarpeta($idCarpeta) {
			$conexion = Conectar::conexion();

			$sql = "SELECT id_carpeta, nombre 
							FROM t_carpetas 
							WHERE id_carpeta = '$idCarpeta'";


							$sql1=" SELECT archivos.id_archivo AS idArchivo, 
            archivos.nombre AS nombreArchivo,
            archivos.ruta 
            FROM t_archivos AS archivos,
            t_carpetas  as c 
            where c.id_carpeta = archivos.id_carpeta
            And c.id_carpeta = $idCarpeta";

							$result = mysqli_query($conexion, $sql1);
							$arreglo = [];

              $indice = 0;
							while($row = mysqli_fetch_array($result)){
									$arreglo[$indice] = $row;
									$indice++;
							}

						
				      return $arreglo;
		}

public function actualizarCarpeta($datos) {
							$conexion = Conectar::conexion();

							$sql = "UPDATE t_carpetas 
											SET nombre = ? 
											WHERE id_carpeta = ?";

							$query = $conexion->prepare($sql);
							$query->bind_param("si", $datos['carpeta'],
																			 $datos['idCarpeta']);

							$respuesta = $query->execute();
							$query->close();

							
							return $respuesta;


						}

}

  ?>
<?php 

session_start();
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();
$idUsuario = $_SESSION['idUsuario'];

$sql = "SELECT 
    archivos.id_archivo AS idArchivo,
    usuario.nombre AS nombreUsuario,
    carpetas.nombre AS carpeta,
    archivos.nombre AS nombreArchivo,
    archivos.tipo AS tipoArchivo,
    archivos.ruta AS rutaArchivo,
    archivos.fecha AS fecha
FROM
    t_archivos AS archivos
        INNER JOIN
    t_usuarios AS usuario ON archivos.id_usuario = usuario.id_usuario
        INNER JOIN
    t_carpetas AS carpetas ON archivos.id_carpeta = carpetas.id_carpeta
    AND archivos.id_usuario = '$idUsuario'";
$result = mysqli_query($conexion, $sql);


 ?>

<div class="row"> 
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover" id="tablaGestorDataTable">
                <thead class="thead-dark">
                    <tr> 
                        <th>Carpeta</th>
                        <th style="text-align: center;">Nombre</th>
                        <th style="text-align: center;">Compartir</th>
                        <th style="text-align: center;">Visualizar</th>
                        <th style="text-align: center;">Imprimir</th>
                        
                    </tr>
                </thead>
                <tbody>

                <?php 

                $extensionesValidas = array('pdf');

                    while ($mostrar = mysqli_fetch_array($result)) { 
                        $rutaImpresion = "../archivos/"."/".$mostrar['nombreArchivo'];
                        $idArchivo = $mostrar['idArchivo'];
                 ?>


                    <tr>
                        <td><?php echo $mostrar['carpeta']; ?></td>
                        <td><?php echo $mostrar['nombreArchivo']; ?></td>
                        <td align='center'>
                            <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#compartir"onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')" ><span class="fa-brands fa-slideshare"></span></span>
                        </td>
                        <td align='center'>
                            <?php 

                            for ($i=0; $i < count($extensionesValidas); $i++) {
                                if ($extensionesValidas[$i] == $mostrar['tipoArchivo']) {
                            

                             ?>

                            <span class="btn btn-primary btn-sm"data-toggle="modal" data-target="#visualizarArchivo"
                            onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')"><span class="fa-solid fa-eye"></span></span>
                        </td>

                            <?php 

                        }
                         }
                             ?>

                        <td align='center'> 
                        <a href="<?php echo $rutaImpresion; ?>" target="_blank" class ="btn btn-success btn-sm">
                            <span class="fa-solid fa-print"></span>
                        </a>
                        </td>
                        
                    </tr>
                <?php 
                   
                    }
                 ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaGestorDataTable').DataTable({"language": {
"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
}});
        
    });
    </script>

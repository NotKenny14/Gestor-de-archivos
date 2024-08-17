<?php 

session_start();
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();
$idUsuario = $_SESSION['idUsuario'];



    $sql="SELECT 
    t_compartir.id_archivo AS idArchivo,
    t_compartir.id_usuario,
    t_archivos.nombre AS nombreArchivo,
    t_carpetas.nombre AS nombreCarpeta,
    t_archivos.tipo AS tipoArchivo,
    t_archivos.ruta AS rutaArchivo
FROM
    t_compartir
        INNER JOIN
    t_archivos ON t_compartir.id_archivo = t_archivos.id_archivo
    INNER JOIN
    t_carpetas ON t_archivos.id_carpeta = t_carpetas.id_carpeta
        AND t_compartir.id_usuario = '$idUsuario'
";
$result = mysqli_query($conexion, $sql);



 ?>

 <div class="row"> 
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover" id="tablaCompartirDataTable">
                <thead class="thead-dark">
                    <tr> 
                        
                        <th style="text-align: center;">Nombre</th>
                        <th style="text-align: center;">Carpeta</th>
                        <th style="text-align: center;">Visualizar</th>
                        <th style="text-align: center;">Imprimir</th>
                        <th style="text-align: center;">Terminar</th>
                        
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
                        
                        <td><?php echo $mostrar['nombreArchivo']; ?></td>
                        <td><?php echo $mostrar['nombreCarpeta']; ?></td>
                        
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
                        <a href="<?php echo $rutaImpresion; ?>" target="_blank" class ="btn btn-success btn-sm ">
                            <span class="fa-solid fa-print"></span>
                        </a>
                        </td>

                        <td align="center">
                            <span class="btn btn-warning btn-sm" 
                            onclick="dejarCompartir('<?php echo $idArchivo ?>')"><span class="fa-solid fa-user-check"></span></span>
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
<script src="../js/gestor.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaCompartirDataTable').DataTable({"language": {
"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
}});
        
    });
    </script>

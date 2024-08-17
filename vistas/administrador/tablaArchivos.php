<?php 

session_start();
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();


$sql = "SELECT t_carpetas.nombre, t_archivos.nombre, 
t_usuarios.usuario,t_departamento.departamento, t_archivos.fecha, 
t_archivos.id_archivo
FROM t_archivos 
JOIN t_carpetas ON t_archivos.id_carpeta = t_carpetas.id_carpeta 
JOIN t_usuarios ON t_archivos.id_usuario = t_usuarios.id_usuario
JOIN t_departamento ON t_usuarios.id_dep = t_departamento.id_dep
    ";
    $result = mysqli_query($conexion, $sql);

 ?>

<div class="row"> 
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover" id="tablaArchivosDataTable">
                <thead class="thead-dark">
                    <tr> 
                        <th style="text-align: center;">Carpeta</th>
                        <th style="text-align: center;">Archivo</th>
                        <th>Usuario</th>
                        <th style="text-align: center;">Departamento</th>
                        <th style="text-align: center;">Fecha</th>
                        <th>Visualizar</th>
                        
                        
                        
                        
                    </tr>
                </thead>
                <tbody>


               <?php while ($mostrar = mysqli_fetch_array($result)) { 
                   
                        $idArchivo = $mostrar['id_archivo'];
                 ?>


                    <tr>
                        <td><?php echo $mostrar [0]; ?></td>
                        <td><?php echo $mostrar [1]; ?></td>
                        <td><?php echo $mostrar [2]; ?></td>
                        <td><?php echo $mostrar [3]; ?></td>
                        <td><?php echo $mostrar [4]; ?></td>
                        
                          <td align='center'>
                            

                            <span  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#visualizarArchivo"
                            onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')"><span class="fa-solid fa-eye"></span></span>
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
        $('#tablaArchivosDataTable').DataTable({"language": {
"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
}});
        
    });
    </script>

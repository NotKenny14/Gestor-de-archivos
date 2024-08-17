<?php 
  session_start();
  if (isset($_SESSION['usuario'])) {
   

include "header.php"; ?>
    
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Gestor de archivos</h1>
      <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArchivos">
        <span class="fa-solid fa-circle-plus"></span> Archivo nuevo</span>
      <hr>
      <div id="tablaGestorArchivos"></div>
    </div>
  </div>





<!-- Modal -->
<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar archivos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmArchivos" enctype="multipart/form-data" method="post">
          <label>Carpeta</label>
          <div id="carpetasLoad"></div><br>
          <span>Tipo de formato</span><br/>
        <input type = "radio" name = "preg1" id = "preg1" value = "1" required="" /> Memorándum
        <input type = "radio" name = "preg1" id = "preg1" value = "2" required="" /> Oficio
          <br>
          <label>Seleccionar archivo</label>
          <input type="file"  accept=".pdf" name="archivos[ ]" id="archivos[ ]" class="form-control" multiple="">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar archivo</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="archivoObtenido"></div>
                      
                                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="compartir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Compartir archivo con:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="outer_div"> 
      <form id="frmCompartir" >
        <input type="text" name="idArchivo" id="idArchivo" hidden="">
      
       
       <h5>Usuario - Departamento</h5>
                <select class="form-control form-control-lg" name="dep" id="dep" required="">
               
                    <?php
                    require_once "../clases/Conexion.php";
        $obj= new conectar();
  $conexion=$obj->conexion();
            $consulta="SELECT t_usuarios.id_usuario, t_usuarios.usuario, t_departamento.departamento 
            FROM t_usuarios INNER JOIN t_departamento ON t_usuarios.id_dep = t_departamento.id_dep ";
            $ejecutar=mysqli_query($conexion,$consulta);
        
    while ($row=mysqli_fetch_array($ejecutar))
            {
                $idDep = $row['id_usuario'];
                $dep=$row['usuario'];
                $depto=$row['departamento'];
                
                ?>
            <option value="<?php echo $idDep ?>"><?php echo $dep ?> - <?php echo $depto ?></option>
            
            <?php  }?>
             </select> 
        </form>
                                  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnCompartir">Compartir</button>
      </div>
    </div>
  </div>
</div>




<?php include "footer.php"; ?>


<script src="../js/gestor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tablaGestorArchivos").load("gestor/tablagestor.php"); 
        $('#carpetasLoad').load("carpetas/selectCarpetas.php");

        $('#btnGuardarArchivos').click(function(){
        agregarArchivosGestor();
        });

        $('#btnCompartir').click(function(){
        compartirArchivo();
        });
        
    });
    </script>

<?php 
} else {
  header("location:../index.php");
}

 ?>
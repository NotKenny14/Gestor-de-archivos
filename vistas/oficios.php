<?php 
  session_start();
  if (isset($_SESSION['usuario'])) {
   

include "header.php"; ?>
    
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Oficios</h1>
      
      <hr>
      <div id="tablaOficios"></div>
    </div>
  </div>


<!-- Modal -->


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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="outer_div"> 
      <form id="frmCompartir" >
        <input type="text" name="idArchivo" id="idArchivo" hidden="">
      
       
       <label>Usuario</label>
                <select class="form-control form-control-lg" name="dep" id="dep" required="">
               
                    <?php
                    require_once "../clases/Conexion.php";
        $obj= new conectar();
  $conexion=$obj->conexion();
            $consulta="SELECT id_usuario, usuario FROM t_usuarios ";
            $ejecutar=mysqli_query($conexion,$consulta);
        
    while ($row=mysqli_fetch_array($ejecutar))
            {
                $idDep = $row['id_usuario'];
                $dep=$row['usuario'];
                
                ?>
            <option value="<?php echo $idDep ?>"><?php echo $dep ?></option>
            
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
        $("#tablaOficios").load("gestor/tablaOficios.php"); 
       
        
    });
    </script>


<?php 
} else {
  header("location:../index.php");
}

 ?>
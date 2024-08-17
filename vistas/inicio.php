<?php 
  session_start();
  if (isset($_SESSION['usuario'])) {
   
include "header.php";
 
?>
     <?php 
        if ($_SESSION['idROL'] == "1"):
         ?>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Últimos registros</h1>
     
      <hr>
      <div id="tablaArchivos"></div>
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

<?php 
       endif;
          ?>







<?php include "footer.php"; ?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#tablaArchivos").load("administrador/tablaArchivos.php"); 
      
        });
    </script>

<?php 
} else {
  header("location:../index.php");
}

 ?>
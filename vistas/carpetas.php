<?php  

		session_start();

$idUsuario = $_SESSION['idUsuario'];
		if (isset($_SESSION['usuario'])){

			include "header.php";
?>

		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="jumbotron jumbotron-fluid">
					  <div class="container">
					    <h1 class="display-4">Carpetas</h1>
					    <br>
					    <div class="row">
					    	<div class="col-sm-4">
					    		<span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaCarpeta"><span class="fa-solid fa-folder-plus"></span> Nueva carpeta</span>
					    	</div>

					    </div>
					    <hr>
					    <div class="row">
					    	<div class="col-sm-12">
					    		<div id="tablaCarpetas"></div>
					    	</div>
					    </div>
					   
					  </div>
					</div>
				</div>
			</div>
		</div>





<!-- Modal -->
<div class="modal fade" id="modalAgregaCarpeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nueva carpeta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmCarpetas">
        	<label>Nombre de la carpeta</label>
        	<input type="text" name="nombreCarpeta" id="nombreCarpeta" class="form-control" required="">
          <div id="tramite"></div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarCarpeta">Guardar</button>
      </div>
    </div>
  </div>
</div>





<!-- Modal -->
<div class="modal fade" id="modalActualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carpeta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	 
            <div id="divtabla"> 
    
    </div>

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
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


<?php  
			include "footer.php"; 
		
?>
<script src="../js/gestor.js"></script>
<script src="../js/carpetas.js"></script>
<script>

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#tablaCarpetas').load("carpetas/tablaCarpetas.php");      
        $('#tramite').load("carpetas/selectTramite.php");

        $('#btnGuardarCarpeta').click(function(){
        agregarCarpeta();
        });  
       $('#btnCompartir').click(function(){
        compartirArchivo();
        });

  

    });
    </script>
<?php
		}else {
			header("location:../index.php");
		}


?>

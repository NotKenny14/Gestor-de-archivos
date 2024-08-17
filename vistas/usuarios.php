<?php  

        session_start();
        require_once "../clases/Conexion.php";
        $obj= new conectar();
  $conexion=$obj->conexion();

        if (isset($_SESSION['usuario']) and $_SESSION['idROL']=='1'){

            include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro</title>
    
    
<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    
   
        <div class="container">
            <br>
            <h1>Administrar usuarios</h1>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" >

                <label><b>Nombre personal</b></label>
                <input type="text" name="nombre" id="nombre" class="form-control col-sm-20" required="">
                <label><b>Usuario</b></label>
                <input type="text" name="usuario" id="usuario" class="form-control col-sm-20" required="">
                <label><b>Correo</b></label>
                <input type="email" name="email" id="email" class="form-control col-sm-20" required="">
                <label><b>Contraseña</b></label>
                <input type="password" name="password" id="password" class="form-control col-sm-20" required="">
                <label><b>Departamento</b></label>
                <select class="form-control col-sm-20" name="dep" id="dep" required="">
                    <?php
            $consulta="SELECT * FROM t_departamento ";
            $ejecutar=mysqli_query($conexion,$consulta);
        
    while ($row=mysqli_fetch_array($ejecutar))
            {
                $idDep = $row['id_dep'];
                $dep=$row['departamento'];
                
                ?>
            
            <option value="<?php echo $idDep ?>"><?php echo $dep ?></option>
            <?php  }?>
        </select> 
                <label><b>Rol</b></label>

                <select class="form-control col-sm-20" name="rol" id="rol"required=""> 
                <?php
                $consulta="SELECT * FROM t_rol";
                $ejecutar=mysqli_query($conexion,$consulta);
        
                while ($row=mysqli_fetch_array($ejecutar))
                {
                     $idrol = $row['id'];
                        $rol=$row['rol'];
                      ?>
                
                <option value="<?php echo $idrol ?>"><?php echo $rol ?></option>
                <?php  }?>
                </select> 
                <br>
                <button class="btn btn-primary">Registrar</button>
                </form>
                </div>
                <hr><div class="col-sm-9">
                    <div id="tablaUsuariosLoad"></div>
                </div>

            </div>

        </div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmRegistroU" method="post" onsubmit="return agregarUsuarioNuevo()" >
                <input type="text" id="idUsuario" name="idUsuario" hidden="">
                <label><b>Nombre personal</b></label>
                <input type="text" name="nombreU" id="nombreU" class="form-control col-sm-20" required="">
                <label><b>Usuario</b></label>
                <input type="text" name="usuarioU" id="usuarioU" class="form-control col-sm-20" required="">
                <label><b>Contraseña</b></label>
                <input type="password" name="passwordU" id="passwordU" class="form-control col-sm-20" required="">
                
                <label><b>Rol</b></label>

                <select class="form-control col-sm-20" name="rolU" id="rolU"required=""> 
                <?php
                $consulta="SELECT * FROM t_rol";
                $ejecutar=mysqli_query($conexion,$consulta);
        
                while ($row=mysqli_fetch_array($ejecutar))
                {
                     $idrol = $row['id'];
                        $rol=$row['rol'];
                      ?>
                
                <option value="<?php echo $idrol ?>"><?php echo $rol ?></option>
                <?php  }?>
                </select> 
                
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btnActualizaUsuario" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>

        <script src="../librerias/jquery-3.4.1.min.js"></script>
        <script src="../sweetalert.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php"); 

                $('#btnActualizaUsuario').click(function(){
                    actualizaUsuario();
                });


            });
            function agregarUsuarioNuevo(){
                $.ajax({
                    method: "POST",
                    data: $('#frmRegistro').serialize(), 
                    url: "../procesos/usuario/registro/agregarUsuario.php",
                    success:function(respuesta){ 
                        
                        respuesta = respuesta.trim();
                        $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
                        swal(":D", "Agregado con exito!", "success");

                        if (respuesta == 1) {
                            $("#frmRegistro")[0].reset();
                            swal(":D", "Agregado con exito!", "success");
                        }else if (respuesta == 2) {
                                swal("Este usuario ya existe");
                               } 
                          

                    }
                    
                });
                return false;
            }
        </script>

        
        

</body>
</html>
            




<?php  
            include "footer.php"; 
        ?> 
<script src="../js/usuarios.js"></script>
        
        <?php  
         }
        else {
            header("location:../index.php");
        }


?>
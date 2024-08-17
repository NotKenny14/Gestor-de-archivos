<?php 
  
  require_once "clases/Conexion.php";
  $obj= new conectar();
  $conexion=$obj->conexion();

  $sql="SELECT * from t_usuarios where id_rol='1'";
  $result=mysqli_query($conexion,$sql);
  $validar=0;
  if(mysqli_num_rows($result) > 0){
        header("location:index.php");
    }
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro de administrador</title>
    
    <script src="librerias/jquery-1.11.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="icon" type="image/png" href="http://ipeenlinea.ipever.gob.mx/ipeenlineader/favicon.ico" />
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div style="min-height: 14%; min-width: 100%; max-height: 25%; max-width: 100%; background-color: rgb(170, 152, 63); border-color: rgb(170, 152, 63);">
<div style="text-align: center;">
  <img src="http://www.veracruz.gob.mx/wp-content/uploads/2019/05/logo-veracruz-1.png"  width="150px" HSPACE="20" VSPACE="10">
  <img src="http://www.veracruz.gob.mx/ipe/wp-content/uploads/sites/20/2019/09/LOGO-IPE.png" width="150px" HSPACE="20" VSPACE="10">
  <img src="http://www.veracruz.gob.mx/ipe/wp-content/themes/veracruz2019/images/home/logo-me-llena-de-orgullo.png"  width="150px"HSPACE="20" VSPACE="10">
  </div>
  </div>
    
    <div class="container">
        <h1 style="text-align: center;">Registro de administrador</h1>
        <hr>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" >
                <center><label>Nombre personal</label></center>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre personal" class="form-control" required="">
                <center><label>Usuario</label></center>
                <input type="text" name="usuario" id="usuario" placeholder="Usuario" class="form-control" required="">
                <center><label>Correo</label></center>
                <input type="email" name="email" id="email" placeholder="Correo" class="form-control" required="">
                <center><label>Contraseña</label></center>
            <input type="password" name="password" id="password" placeholder="Ingresar contraseña" class="form-control" required="">
                <center><label>Departamento</label></center>
                <select class="form-control" name="dep" id="dep">
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
                  <center><label>Rol</label></center>
        <select class="form-control" name="rol" id="rol"> 
<?php
            $consulta="SELECT * FROM t_rol WHERE id=1";
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
                <center><button  class="btn btn-primary"  style="background-color: rgb(170, 152, 63); border-color: rgb(170, 152, 63);">Registrar</button> </center>
                
                
                </form>


            </div>
            <div class="col-sm-4"></div>

        </div>

    </div>


        <script src="librerias/jquery-3.4.1.min.js"></script>
        <script src="sweetalert.min.js"></script>

        <script type="text/javascript">
            function agregarUsuarioNuevo(){
                $.ajax({
                    method: "POST",
                    data: $('#frmRegistro').serialize(), 
                    url: "procesos/usuario/registro/agregarUsuario.php",
                    success:function(respuesta){ 
                        
                        respuesta = respuesta.trim();
                        swal(":D", "Agregado con exito!", "success");
                        
                        if (respuesta == 1) {
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




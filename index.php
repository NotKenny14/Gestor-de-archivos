<?php 
  
  require_once "clases/Conexion.php";
  $obj= new conectar();
  $conexion=$obj->conexion();

  $sql="SELECT * from t_usuarios where id_rol='1'";
  $result=mysqli_query($conexion,$sql);
  $validar=0;
  if(mysqli_num_rows($result) > 0){
    $validar=1;
  }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="icon" type="image/png" href="http://ipeenlinea.ipever.gob.mx/ipeenlineader/favicon.ico" />
</head>
<body>
  <div style="min-height: 14%; min-width: 100%; max-height: 25%; max-width: 100%; background-color: rgb(170, 152, 63); border-color: rgb(170, 152, 63);">
<div style="text-align: center;">
  
  <img src="http://www.veracruz.gob.mx/wp-content/uploads/2019/05/logo-veracruz-1.png"  width="150px" HSPACE="20" VSPACE="10">
  <img src="http://www.veracruz.gob.mx/ipe/wp-content/uploads/sites/20/2019/09/LOGO-IPE.png" width="150px" HSPACE="20" VSPACE="10">
  <img src="http://www.veracruz.gob.mx/ipe/wp-content/themes/veracruz2019/images/home/logo-me-llena-de-orgullo.png"  width="150px"HSPACE="20" VSPACE="10">
  </div>
  </div>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <br>
       <img src="http://www.veracruz.gob.mx/ipe/wp-content/uploads/sites/20/2019/09/LOGO-IPE.png" width="200px">
       <hr>
      <h3>Inicio de sesión</h3>
    </div>

    <!-- Login Form -->
    <form method="post" id="frmLogin" onsubmit="return loguear()">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuario" required=""><br><br>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña"required="" >
      <br><br>
      <input type="submit" class="fadeIn fourth" style="background-color: rgb(170, 152, 63); border-color: rgb(170, 152, 63);" value="Entrar">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
       <?php  if(!$validar): ?> 
      <a class="underlineHover" href="registro.php">Registrar</a>
      <?php endif; ?>
    </div>


  </div>
</div>
<div style="min-height: 16%; min-width: 100%; max-height: 25%; max-width: 100%; background-color: rgb(170, 152, 63); border-color: rgb(170, 152, 63);"></div>
<script src="librerias/jquery-3.4.1.min.js"></script>
<script src="librerias/sweetalert.min.js"></script>

<script>
  function loguear(){
    $.ajax({
      type:"POST",
      data:$('#frmLogin').serialize(),
      url:"procesos/usuario/login/login.php",
      success:function(respuesta){
        
        respuesta = respuesta.trim();
        if (respuesta == 1){
          window.location = "vistas/inicio.php";
        } else {
          swal(":(", "Fallo al entrar!", "error");
        }
      }
    });
    return false;
  }
</script>

</body>
</html>


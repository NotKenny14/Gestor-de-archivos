<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestor</title>
    <link rel="stylesheet" href="../librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../librerias/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../librerias/fontawesome/css/all.css">
        
    
    <link rel="icon" type="image/png" href="http://ipeenlinea.ipever.gob.mx/ipeenlineader/favicon.ico" />

    <style>
      .navbar-dark{
        background: #AA983F;
      }
    </style>
</head>
<body style="background: #e9ecef">
<nav class="navbar navbar-expand-lg navbar-dark  static-top">
  <div class="container">
   
    <a class="navbar-brand" href="inicio.php">
      
      <img src="http://www.veracruz.gob.mx/ipe/wp-content/uploads/sites/20/2019/09/LOGO-IPE.png" width="100px">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <?php 
        if ($_SESSION['idROL'] == "1"):
         ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inicio.php"><span class="fa-solid fa-house"></span> Inicio</a>
        </li>
         <?php 
       endif;
          ?>
        
        <?php 
        if ($_SESSION['idROL'] == "1"):
         ?>
         <li class="nav-item">
          <a style="color: white" class="nav-link" href="usuarios.php"><span class="fa-regular fa-user"></span> Administrar usuarios</a>
        </li>
         <?php 
       endif;
          ?>


         <li class="nav-item">
          <a style="color: white" class="nav-link" href="carpetas.php"><span class="fa-solid fa-folder"></span> Carpetas</a>
        </li>
        <li class="nav-item dropdown">
           <a style="color: white" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa-regular fa-file"></span>
           Almacenamiento
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="gestor.php">Archivos</a>
          <a class="dropdown-item" href="compartir.php">Archivos compartidos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="memorandum.php">Memorándums</a>
          <a class="dropdown-item" href="oficios.php">Oficios</a>
        </div>
         
        </li>
       
        <li class="nav-item">
          <a style="color: red" class="nav-link" href="../procesos/usuario/salir.php"><span class="fa-solid fa-right-from-bracket"></span> Salir</a>
        </li>
      
      </ul>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a  class="nav-link" style="color: white" > <span class="fa-solid fa-user-tag"></span> Usuario: <?php echo $_SESSION['usuario']; ?></a>
        </li>
       </ul>
    </div>
  </div>
</nav>





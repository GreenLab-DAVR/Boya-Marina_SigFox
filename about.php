<?php

session_start();

include_once 'php/conexion.php';

$conexion = new DB();

if (!isset($_SESSION['user'])) {
  header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About</title>
  <link rel="icon" href="assets/img/monitoreo.png" type="image/png">
  <?php include_once 'templates/resources-head.php' ?>
  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>


  <div class="text-center" id="loading">
    <div class="spinner-border mt-5" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>

  <div class="visually-hidden" id="content">
    <?php
    include_once 'templates/navbar.php';
    ?>

    <div class="container">

      <div id="principal" class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
          <div class="col-10 col-sm-8 col-lg-6">
            <img src="https://www.darrera.com/wp/wp-content/uploads/2018/04/3r-edb200-boya-oceanografica.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
          </div>
          <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Aplicación para el monitoreo de variables en un entorno marino</h1>
            <p class="lead">El objetivo de esta aplicación es mostrar al investigador los datos tomados de los sensores integrados en la boya, haciendo uso de la tecnologia Sigfox para el envio de datos capturados y que sean mostrados de manera gráfica en esta aplicación, para un historial de registros.</p>
          </div>
        </div>
      </div>

    </div>

    <footer class="bg-dark">
      <div class="text-center text-white py-4">
        Copyright &copy; - 2021
      </div>
    </footer>
  </div>




  <?php include_once 'templates/js-links.php' ?>
</body>

</html>
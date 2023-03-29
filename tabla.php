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
  <link rel="icon" href="assets/img/monitoreo.png" type="image/png">
  <title>Dashboard</title>
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

      <h4 class="my-4 text-center">Variables registradas</h4>

      <div class="card shadow mb-4">
        <div class="card-body">
          <div id="tabIndex" class="table-responsive my-4">
          </div>
        </div>
      </div>
      
      <h4 id="variables" class="my-4 text-center">Coordenadas</h4>

      <div class="card shadow mb-4">
        <div class="card-body">
          <div id="tabCoordenadas" class="table-responsive my-4">
          </div>
        </div>
      </div>

    </div>

    <h4 id="localizacion" class="my-4 text-center">Localización</h4>

    <div id="map" class="m-2" style="height: 500px;"></div>

    <footer class="bg-dark">
      <div class="text-center text-white py-4">
        Copyright &copy; - 2021
      </div>
    </footer>
  </div>




  <?php include_once 'templates/js-links.php' ?>
  <script type="text/javascript">
    datos();
    datosCoordenadas();
    
    function iniciarMap() {
        
      fetch('php/coordenadas.php')
      .then(r => r.json())
      .then(r => {
          var coord = {
        lat: r.latitud,
        lng: r.longitud
      };
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: coord
      });
      var marker = new google.maps.Marker({
        position: coord,
        map: map
      });
      })
      .catch(err => console.error(err));
    }
    
  </script>
  <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSWjNRJdjcKyVfPgym0tcqMISTdRc2Tls&callback=iniciarMap">
</body>

</html>
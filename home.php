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
  <title>Dashboard</title>
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
        
        <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
          <div class="col-10 col-sm-8 col-lg-6">
            <img src="https://www.darrera.com/wp/wp-content/uploads/2018/04/3r-edb200-boya-oceanografica.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
          </div>
          <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Aplicación para el monitoreo de variables en un entorno marino</h1>
          </div>
        </div>
      </div>
      
      <h2 class="my-4 text-center">Últimos datos recibidos</h2>

      <div class="row">
        <div class="col-3">
          <div class="card shadow-sm mb-2">
            <div class="card-body text-center">
              <div class="row">
                <div class="col-6">
                  <img src="assets/img/oxigeno.png" class="" width="80" height="auto" alt="">
                </div>
                <div class="col-6" id="oxigenop">

                </div>
              </div>
              <a href="#voxigeno" class="btn btn-sm btn-dark">Ver más</a>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card shadow-sm mb-2">
            <div class="card-body text-center">
              <div class="row">
                <div class="col-6">
                  <img src="assets/img/temp.png" class="" width="80" height="auto" alt="">
                </div>
                <div class="col-6" id="tempp">

                </div>
              </div>
              <a href="#vtemp" class="btn btn-sm btn-dark">Ver más</a>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card shadow-sm mb-2">
            <div class="card-body text-center">
              <div class="row">
                <div class="col-6">
                  <img src="assets/img/turbidez.png" class="" width="80" height="auto" alt="">
                </div>
                <div class="col-6" id="turbidezp">
                </div>
              </div>
              <a href="#vturb" class="btn btn-sm btn-dark">Ver más</a>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card shadow-sm mb-2">
            <div class="card-body text-center">
              <div class="row">
                <div class="col-6">
                  <img src="assets/img/co2.jpg" class="" width="80" height="auto" alt="">
                </div>
                <div class="col-6" id="co2p">
                </div>
              </div>
              <a href="#vco2" class="btn btn-sm btn-dark">Ver más</a>
            </div>
          </div>
        </div>
      </div>

      <h2 id="graficas" class="my-4 text-center">Gráficas</h2>

      <div class="row mt-2 mb-4">

        <div class="col-sm-12 mb-4">
          <h4 id="voxigeno" class="text-center">Oxigeno</h4>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <div class="card shadow-sm mb-2">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <img src="assets/img/oxigeno.png" class="" width="120" height="auto" alt="">
                    </div>
                    <div class="col-6" id="oxigeno">

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-8">
              <div class="card shadow-sm">
                <div class="card-body">
                  <input onchange="renderOxigeno()" type="date" value="<?php echo date('Y-m-d') ?>" class="form-control mb-2" name="fecha" id="fechaOxigen">
                  <canvas id="graficaOxigeno"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-12 mb-4">
          <h4 id="vtemp" class="text-center">Temperatura</h4>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <div class="card shadow-sm mb-2">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <img src="assets/img/temp.png" class="" width="120" height="auto" alt="">
                    </div>
                    <div class="col-6" id="temp">

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-8 mb-2">
              <div class="card shadow-sm">
                <div class="card-body">
                  <input onchange="renderTemp()" type="date" value="<?php echo date('Y-m-d') ?>" class="form-control mb-2" name="fecha" id="fechaTemp">
                  <canvas id="graficaTemp"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-sm-12 mb-4">
          <h4 id="vturb" class="text-center">Turbidez</h4>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <div class="card shadow-sm mb-2">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <img src="assets/img/turbidez.png" class="" width="120" height="auto" alt="">
                    </div>
                    <div class="col-6" id="turbidez">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-8">
              <div class="card shadow-sm">
                <div class="card-body">
                  <input onchange="renderTurb()" type="date" value="<?php echo date('Y-m-d') ?>" class="form-control mb-2" name="fecha" id="fechaTurb">
                  <canvas id="graficaTurbidez"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-12 mb-4">
          <h4 id="vco2" class="text-center">CO<sub>2</sub></h4>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <div class="card shadow-sm mb-2">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <img src="assets/img/co2.jpg" class="" width="120" height="auto" alt="">
                    </div>
                    <div class="col-6" id="co2">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-8">
              <div class="card shadow-sm">
                <div class="card-body">
                  <input onchange="renderCO2()" type="date" value="<?php echo date('Y-m-d') ?>" class="form-control mb-2" name="fecha" id="fechaCO2">
                  <canvas id="graficaCO2"></canvas>
                </div>
              </div>
            </div>
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
<?php
session_start();

if (isset($_SESSION['user'])) {
  header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/img/monitoreo.png" type="image/png">
  <title>Iniciar sesión</title>
  <?php include_once 'templates/resources-head.php' ?>
  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/main.css">
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
  <div class="login-container">
    <div class="login">
      <div class="text-center" id="loading">
        <div class="spinner-border mt-5" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
      <div class="card shadow-sm animate__animated animate__backInDown visually-hidden" id="content">
        <div class="card-body">
          <h5 class="card-title text-center my-3">Acceder</h5>
          <form id="login">
            <div class="row">
              <div id="msg_login"></div>
              <div class="col-sm-12 mb-2">
                <label class="form-label">Usuario:</label>
                <div>
                  <i class="fas fa-user iconoInput"></i>
                  <input type="text" name="usuario" placeholder="Ingresa tu usuario" class="form-control inputPadding" autocomplete="off" required>
                </div>
              </div>
              <div class="col-sm-12 mb-4">
                <label class="form-label">Contraseña</label>
                <div>
                  <i class="fas fa-lock iconoInput"></i>
                  <input type="password" name="password" placeholder="Ingresa tu contraseña" class="form-control inputPadding" required>
                </div>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-sm btn-success">Iniciar sesión</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include_once 'templates/js-links.php' ?>
  <script>
    const loginForm = document.getElementById('login');

    loginForm.addEventListener('submit', function(e) {
      e.preventDefault();

      let datos = new FormData(loginForm);
      let msg_login = document.getElementById('msg_login');


      fetch('php/login.php', {
          method: 'POST',
          body: datos
        })
        .then(r => r.text())
        .then(r => {
          // console.log(r);

          if (r == 1) {
            window.location = 'home.php';
          } else {
            msg_login.innerHTML = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Usuario o contraseña incorrectos.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                                  `;
          }
        })
        .catch(err => console.error(err));
    });
  </script>

</body>

</html>
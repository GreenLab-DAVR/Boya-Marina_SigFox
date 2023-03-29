<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php"><img src="https://seeklogo.com/images/U/universidad-de-colima-ucol-logo-B8E49C427B-seeklogo.com.png" width="40px" class="me-2" alt="">Facultad de Ingeniería Electromecánica</a>
    <div>
      <ul class="nav">
        <li class="nav-item dropdown">
          <a class="nav-link text-decoration-none text-light btn btn-sm btn-success" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Administrador<i class="fas fa-user ms-2"></i></a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="php/logout.php"><i class="fas fa-sign-out-alt me-2"></i>Cerrar sesión</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i class="fas fa-bars"></i></a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menú</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link text-decoration-none text-dark" href="home.php"><i class="fas fa-chart-line me-2"></i>Gráficas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-decoration-none text-dark" href="tabla.php"><i class="fas fa-table me-2"></i>Tabla</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-decoration-none text-dark" href="about.php"><i class="fas fa-info-circle me-2"></i>Acerca de la aplicación</a>
      </li>
    </ul>
  </div>
</div>
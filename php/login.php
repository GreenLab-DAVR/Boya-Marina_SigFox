<?php
  session_start();

  include_once 'conexion.php';
  $conexion = new DB();

  $usuario = $_POST['usuario'];
  $password = $_POST['password'];

  $query = $conexion -> connect() -> prepare("SELECT * FROM usuarios WHERE usuario = ?");
  $query -> bindValue(1, $usuario);
  $query -> execute();

  if($query -> rowCount() > 0){
    $row = $query -> fetch();
    $rowPassword = $row['password_usuario'];

    if(password_verify($password, $rowPassword)){
      $_SESSION['user'] = $row['id_usuario'];
      echo true;
    } else {
      echo false;
    }
  } else {
    echo false;
  }
?>
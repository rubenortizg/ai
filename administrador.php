<?php session_start();

if (isset($_SESSION['usuario'])) {
  require 'vista/administrador.view.php';
} else {
  header('Location: index.php');
}

?>

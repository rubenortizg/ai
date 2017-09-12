<?php session_start();

if (isset($_SESSION['usuario'])) {
  require 'admin/config.php';
  require 'functions.php';

  require 'vista/error.view.php';  

} else {
  header('Location: index.php');
}

?>

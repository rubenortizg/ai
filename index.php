<?php session_start();
if(isset($_SESSION['usuario'])){
  header('Location: administrador.php');
} else {
  header('Location: login.php');
}
?>

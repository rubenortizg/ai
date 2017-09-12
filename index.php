<?php session_start();
if(isset($_SESSION['usuario'])){
  header('Location: administrar.php');
} else {
  header('Location: login.php');
}
?>

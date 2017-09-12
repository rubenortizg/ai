<?php session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: index.php');
}

require 'admin/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
  $password = $_POST['password'];
  $password2 = $_POST['password2'];

  $errores = '';

  if (empty($usuario) or empty($password) or empty($password2) ) {
    $errores .= '<li>Por favor rellena todos los datos solicitados</li>';
  } else {

    $conexion = conexion($db_config);
    if (!$conexion) {
      header('Location: error.php');
    }

//    try {
//      $conexion = new PDO('mysql:host=localhost;dbname=ai', 'root', '');
//    } catch (PDOException $e) {
//      echo "Error: " . $e->getMessage();
//    }

    $sql='SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1';
    $statement = $conexion->prepare($sql);
    $statement->execute(array(':usuario' => $usuario));
    $resultado = $statement->fetch();

    if ($resultado != false) {
      $errores .= '<li>Nombre de usuario ya existe </li>';
    }

    $password = hash('sha512', $password);
    $password2 = hash('sha512', $password2);

    //echo "$password . $password2";

    if ($password != $password2) {
      $errores .= '<li>Las contraseñas no son iguales</li>';
    }

  }

  if ($errores == '') {
    $sql='INSERT INTO usuarios (id, usuario, password) VALUES (null, :usuario, :password)';
    $statement = $conexion->prepare($sql);
    $statement->execute(array(':usuario' => $usuario, ':password' => $password));

    header('Location: login.php');
  }

}

require 'vista/registrar.view.php';
?>

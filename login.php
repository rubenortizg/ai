<?php session_start();

if (isset($_SESSION['usuario'])) {
  header('Location: index.php');
}

require 'admin/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  require 'functions.php';

  $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
  $password = $_POST['password'];
  $password = hash('sha512', $password);


  require_once 'recaptchalib.php';

  // your secret key
  $secret = "6LcGnjAUAAAAAAWueQM0gyUKz-P623b6DlqDK4gD";

  // empty response
  $response = null;

  // check secret key
  $reCaptcha = new ReCaptcha($secret);

  // if submitted check response
  if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
  }

  $errores = '';

  $conexion = conexion($db_config);
  if (!$conexion) {
    header('Location: error.php');
  }

  $sql="SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
  $statement = $conexion->prepare($sql);
  $statement->execute(array(':usuario' => $usuario, ':password' => $password));

  $resultado = $statement->fetch();


  if ($response != null && $response->success) {
    if ($resultado !== false) {
      $_SESSION['usuario'] = $usuario;
      header('Location: index.php');
    } else {
      $errores .= '<li>Datos incorrectos</>';
    }
  } else {
    $errores .= '<li>Verifica que no eres un robot</>';
  }



}

require 'vista/login.view.php';

?>

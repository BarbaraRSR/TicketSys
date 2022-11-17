<?php
$title = 'TicketSys';
include_once 'includes/redirect.php';
include_once 'includes/session.php';
require_once "db/conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    //$new_password = md5($password . $username);

    //$result = $user->getUser($username, $new_password); //With extre security
    $result = $user->getUser($username, $password);
    if (!$result) {
        echo '<div class="alert alert-danger">Username or Password is incorrect: Please try again. </div>';
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $result['usuario_id'];

        //header("Location: inicio.php");
        //redirect('inicio.php');
        if ($_SERVER['HTTP_HOST'] == "localhost") {
          header("Location: inicio.php");
      } else {
        echo '<script type="text/javascript">
        window.location.assign("inicio.php");</script>';        
      }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="css/site.css" />

    <title>TicketSys - <?php echo $title ?></title>
</head>

<Body>

<DIV class="container">
    <br><br>

    <!-- Encabezado -->
    <div class="text-center"><img src="https://www.laptown.com/wp-content/themes/laptown-v2/assets/img/logo.png"></div>

    <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h4 class="card-title text-center mb-5 fw-light fs-5">Ingresar</h4>
            <!-- Formulario de acceso -->
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
              <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" id="username" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
                <label for="floatingInput">Usuario</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="password">
                <label for="floatingPassword">Contrase&ntilde;a</label>
              </div>

              <div class="d-grid">
                <input type="submit" value="Acceder" class="btn btn-primary btn-login text-uppercase fw-bold">
              </div>
              <hr class="my-4">
            </form>
            <p>Si no recuerda sus claves de acceso, por favor, contacte con el administrador.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once "includes/footer.php" ?>



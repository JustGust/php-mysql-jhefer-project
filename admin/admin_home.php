<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administración</title>

    <link rel="stylesheet" href="../assets/css/admin_home.css" />
    <link
      href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"
      rel="stylesheet"
      id="bootstrap-css"
    />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  </head>

  <body>
  <?php 
    session_start(); 
    if(!$_SESSION['logged_in']){
      header("Location:../home.php");
    }
  ?>
    <div class="container">
      <link
        rel="stylesheet prefetch"
        href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"
      />
      <div class="mail-box">
        <aside class="sm-side">
          <div class="inbox-body">
            <a
              href="../home.php"
              data-toggle="modal"
              title="Compose"
              class="btn btn-compose"
            >
              Regresar a la página principal
            </a>
          </div>

          <ul class="nav nav-pills nav-stacked labels-info inbox-divider">
            <li><h4>OPCIONES</h4></li>
            <li>
              <a href="./services.php">
                <i class="fa fa-sign-blank text-danger"></i> SERVICIOS
              </a>
            </li>
            <li>
              <a href="./products.php">
                <i class="fa fa-sign-blank text-success"></i> PORTAFOLIO
              </a>
            </li>
            <li>
              <a href="./brands.php">
                <i class="fa fa-sign-blank text-info"></i> MARCAS
              </a>
            </li>
            <li>
              <a href="./team.php">
                <i class="fa fa-sign-blank text-warning"></i> NUESTRO EQUIPO
              </a>
            </li>
          </ul>
        </aside>
        <aside class="lg-side">
          <div class="inbox-body">
            <h1>Selecciona una opción</h1>
          </div>
        </aside>
      </div>
    </div>
  </body>
</html>

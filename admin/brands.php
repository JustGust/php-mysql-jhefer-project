<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administración</title>

    <link rel="stylesheet" href="../assets/css/admin_home.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
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
        <link rel="stylesheet prefetch"
            href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" />
        <div class="mail-box">
            <aside class="sm-side">
                <div class="inbox-body">
                    <a href="../home.php" data-toggle="modal" title="Compose" class="btn btn-compose">
                        Regresar a la página principal
                    </a>
                </div>

                <ul class="nav nav-pills nav-stacked labels-info inbox-divider">
                    <li>
                        <h4>OPCIONES</h4>
                    </li>
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
                    <div class="mail-option">
                        <div class="btn-group">
                            <h1>MARCAS</h1>
                            <div class="d-none content-msg">
                                <hr>
                                <p class="error"></p>
                                <hr>
                            </div>
                            <button id="openModal"><i class="fa fa-plus"> Nuevo</i></button>
                        </div>
                    </div>
                    <table class="table table-inbox table-hover">
                        <tbody>
                            <?php
                                include_once("../config/connection.php");
                                $sql=$mysqli->query("SELECT * FROM brands");
                                while ($data = $sql->fetch_object()) {
                            ?>

                            <tr class="">
                                <td class="view-message dont-show"><?= $data->name ?></td>
                                <td class="view-message">Descripción: <?= $data->description ?></td>
                                <td class="view-message">Año: <?= $data->year ?></td>
                                <td class="view-message inbox-small-cells"></td>
                                <td class="inbox-small-cells"><a href="./brands.php?id=<?= $data->id ?>"
                                        class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                                <td class="inbox-small-cells"><a href="../controller/deleteBrands.php?id=<?= $data->id ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>

                            </tr>
                            <?php
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p>CREAR NUEVO REGISTRO</p>

                        <form action="../controller/registerBrands.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name_brands" placeholder="Nombre"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="year" placeholder="Año de fundación"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description_brands" placeholder="Descripción"
                                    rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="img_brands">Imagen del producto</label>
                                <input type="file" name="img_brands" id="img_brands" accept="image/*">
                                <p class="help-block">La imagen debe tener buena resolución.</p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div id="modalUpdate" class="modal">
                    <div class="modal-content">
                        <span id="closeUpdate" class="close">&times;</span>
                        <p>ACTUALIZAR REGISTRO</p>
                        <form action="../controller/updateBrands.php" method="POST" enctype="multipart/form-data">
                            <?php
                                $sqlUpdate=$mysqli->query("SELECT * FROM brands WHERE id='$_GET[id]'");
                                $data = $sqlUpdate->fetch_object();
                              ?>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?= $data->name ?>" name="name_brands"
                                    placeholder="Nombre" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?= $data->year ?>" name="year" placeholder="Año de fundación"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description_brands" placeholder="Descripción"
                                    rows="3" required><?= $data->description ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="img_brands">Imagen del producto</label>
                                <input type="file" name="img_brands" id="img_brands" accept="image/*">
                                <p class="help-block">La imagen debe tener buena resolución.</p>
                            </div>
                            <div class="form-group">
                                <img src="../assets/img/about/<?= $data->image?>" width="100px">
                            </div>
                            <input type="hidden" name="id_brands" value="<?= $data->id ?>">
                            <input type="hidden" name="name_file" value="<?= $data->image ?>">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <?php  if($_GET['id']){?>
                  <script>
                    document.getElementById('modalUpdate').style.display = 'block';
                  </script>
                <?php } ?>

            </aside>
        </div>
    </div>
</body>

<script src="../assets/js/admin_home.js"></script>

</html>
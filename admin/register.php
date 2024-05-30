<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/all.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <title>Registro</title>
</head>
<body>
    <div class="login-form">
        <form action="../controller/registerUser.php" method="POST">
            <div class="form-name">
                <span>Registro</i></span>
            </div>
            <div class="d-none content-msg">
                <hr>
                <p class="error"></p>
                <hr>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="name" name="name" placeholder="Nombre completo">
            </div>
            <div class="form-group">
                <input type="number" class="form-control item" id="identification" name="identification" placeholder="identificación" minlength="5" maxlength="100" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="username" name="username" placeholder="Usuario" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" name="password" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block login-account">Registrarme</button>
            </div>
            <div class="form-group">
                <a href="../index.html">Iniciar sesión</a>
            </div>
        </form>
    </div>


    <script src="../assets/js/all.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/signIn.js"></script>

</body>
</html>

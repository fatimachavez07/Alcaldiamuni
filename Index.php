<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Alcaldia</title>
</head>

<body>

    <div class="vh-100 row m-0 align-items-center justify-content-center">
        <div class="col-auto p-5 bg-white shadow-lg rounded">
            <div class="container">
                <p class="text-center">
                    <img src="Imagenes/usuario.png" alt="..." width="25%" height="25%">
                </p>
                <h3 class="text-center">Iniciar Sesion</h3>
                <form method="post">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input id="usuario" class="form-control" type="text" name="usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" class="form-control" type="password" name="password">
                    </div>

                    <div class="text-center" style="margin-top: 2rem; margin-left: 4rem; margin-right: 4rem; margin-bottom: 1rem;">
                        <a href="#">Ha olvidado su contraseña?</a>
                    </div>

                    <div class="d-grid gap-1">
                        <a href="Principal.php">Enlace</a>
                        <button class="btn btn-primary" name="login" type="submit">Acceder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Agregar usuario</title>
</head>

<body>
    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
            <?php
                session_start();
                include("Config.php");
                
                if (isset($_POST['registro'])) {
                    $username = $_POST['username'];
                    $correo = $_POST['correo'];
                    $password = $_POST['password'];
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);
                    $query = $conn->prepare("SELECT * FROM usuarios WHERE correo=:correo");
                    $query->bindParam("correo", $correo, PDO::PARAM_STR);
                    $query->execute();

                    if ($query->rowCount() > 0) {
                        echo '
                        <div class="alert alert-danger" role="alert">
                        ¡La dirección de correo electrónico ya está registrada!
                        </div>';
                    }

                    if ($query->rowCount() == 0) {
                        $query = $conn->prepare("INSERT INTO usuarios(username,correo,password) VALUES (:username,:correo,:password_hash)");
                        $query->bindParam("username", $username, PDO::PARAM_STR);
                        $query->bindParam("correo", $correo, PDO::PARAM_STR);
                        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
                        $result = $query->execute();

                        if ($result) {
                            echo '
                                    <div class="alert alert-success" role="alert">
                                    ¡Tu registro fue exitoso!
                                    </div>';
                        } else {
                            echo '
                                    <div class="alert alert-danger" role="alert">
                                    ¡Algo salió mal!
                                    </div>';
                        }
                    }
                }
                ?>
                <h3>Nuevo usuario</h3>
                <hr>
                <form method="post">
                    
                    <div class="form-group">
                        <label >username:</label>
                        <input class="form-control" type="text" name="username">
                    </div>

                    <div class="form-group">
                        <label>correo:</label>
                        <input class="form-control" type="text" name="correo">
                    </div>

                    <div class="form-group">
                        <label>password:</label>
                        <input class="form-control" type="text" name="password">
                    </div>

                    <br>
                    <button class="btn btn-primary" name="registro" type="submit">Agregar</button>
                </form>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
include ('Config.php');
session_start();
?>
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="CSS/Sidebar.css">
</head>

<body class='snippet-body' id="body-pd">

    <?php require_once "Partes/Menu.php"?>
    <!--Container Main start-->
    <div class="height-100 bg-light">
    <form method="POST" action="agregarusuario.php">
    <button name="registro" type="submit" class="btn btn-primary btn-lg">Agregar Usuario</button>  
    <br>
    <br>
    <table class="table" id="usuarios">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Correo</th>
                    <th>Password</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $consulta = "SELECT * FROM usuarios";
                $llamado -> Mostrarusuarios($consulta);
                ?>
            </tbody>
        </table>
    </div>
    </form>
    <!--Container Main end-->
    <script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>

    <script type='text/javascript' src="JS/JSSidebar.js"></script>
    <script type='text/javascript'>
    var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function(e) {
        e.preventDefault();
    });
    </script>

</body>

</html>
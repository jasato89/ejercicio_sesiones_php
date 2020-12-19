<?php
session_start();

if(!isset($_SESSION['user'])) {
    header('Location: unauthorized.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Inicia Sesión</title>
</head>

<body class="bg-light">
    <section id="cover">
        <div class="container vh-100">
            <div class="row p-3 h-100">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto my-auto text-center form border-dark rounded p-4 bg-dark text-light">
                    <h1 class="display-4 py-1">Welcome</h1>
                    <h2 class="display-10 py-2"><?php echo  $_SESSION['user']; ?></h2>
                    <a href="logout.php" class="btn btn-primary py-1">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
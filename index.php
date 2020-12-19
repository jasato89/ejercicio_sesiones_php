<?php
session_start();

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];

    if ($error > 5) {
        $_SESSION['timelock'] = time();
    }
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
                    <h1 class="display-4 py-2">Inicia sesión</h1>
                    <form class="justify-content-center" method="POST" action="validate.php">
                        <fieldset>
                            <div class="form-group p-1">
                                <input id="user" name="user" type="text" placeholder="Usuario" class="form-control input-md" required="">
                            </div>
                            <div class="form-group p-1">
                                <input id="pwd" name="pwd" type="password" placeholder="Contraseña" class="form-control input-md" required="">
                            </div>
                            <?php


                            if (isset($error) && !isset($_SESSION['timelock'])) {
                            ?>
                                <div class="form-group bg-warning rounded mt-2">
                                    <p class="col-md-12 control-label text-danger">Error. Número de errores: <?php echo $error ?></p>
                                </div>
                            <?php
                            }
                            if (isset($_SESSION['timelock'])) {
                                $timeLeft = $_SESSION['timelock'] + 120 - time(); ?>
                                <div class="form-group bg-warning rounded mt-2 ">
                                    <p class="col-md-12 control-label text-danger">Se ha alcanzado el número máximo de errores. Por favor, espere: <?php echo $timeLeft ?> segundos</p>
                                </div>

                            <?php

                            }
                            ?>
                            <div class="form-group pb-1">
                                <input id="remember" name="remember" type="checkbox" value="1" class="px-1"><label class="px-1">Remember me</label>
                            </div>
                            <div class="form-group m-1">
                                <label class="control-label" for="submit"></label>
                                <button id="submit" name="submit" class="btn btn-primary">Entrar</button>
                            </div>
                        </fieldset>
                </div>
            </div>
            </form>
        </div>
    </section>

</body>

</html>
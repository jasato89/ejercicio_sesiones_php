<?php session_start();

include 'database.php';

if (isset($_SESSION['timelock'])) {
    if ($_SESSION['timelock'] + (120) > time()) {
        unset($_SESSION['error']);
        header('Location: index.php');
        return;
    } else {
        unset($_SESSION['timelock']);
    }
}



if (isset($_POST['submit'])) {
    $user = isset($_POST['user']) ? strtolower($_POST['user']) : '';
    $pwd = isset($_POST['pwd']) ? $_POST['pwd'] : '';


    if (isset($users[$user]) && $users[$user] == $pwd) {

        if (isset($_POST['remember'])) {
            setcookie('email', $user, time() + 60 * 60 * 24 * 7);
        }
        $_SESSION['user'] = $user;
        header('Location: welcome.php');
    } else {
        if (isset($_SESSION['error'])) {
            $_SESSION['error']++;
        } else {
            $_SESSION['error'] = 1;
        }
        header('Location: index.php');
    }
}

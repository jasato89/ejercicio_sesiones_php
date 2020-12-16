<?php session_start();

include 'database.php';



if (isset($_POST['submit'])) {
    $user = isset($_POST['user']) ? strtolower($_POST['user']) : '';
    $pwd = isset($_POST['pwd']) ? $_POST['pwd'] : '';


    if (isset($users[$user]) && $users[$user] == $pwd) {

        if (isset($_POST['remember'])) {
            setcookie('email', $user, time() + 60 * 60 * 24 * 7);
        }
        $_SESSION['email'] = $user;
        header('Location: welcome.php');
    } else {
        echo "Wrong e-mail or pwd";
    }
}

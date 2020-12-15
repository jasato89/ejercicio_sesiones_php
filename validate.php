<?php include 'database.php';

if (isset($_POST['submit'])) {
    $user = isset($_POST['user']) ? strtolower($_POST['user']) : '';
    $pwd = isset($_POST['pwd']) ? $_POST['pwd'] : '';


    if (isset($users[$user]) && $users[$user] == $pwd) {

        if (isset($_POST['remember'])) {
            setcookie('email', $user, time() + 60 * 60 * 7);
        }
        session_start();
        $_SESSION['email'] = $user;
        header('Location: welcome.php');
    } else {
        echo "Wrong e-mail or pwd";
    }
}

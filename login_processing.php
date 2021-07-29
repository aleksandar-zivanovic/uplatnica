<?php require_once 'includes/header.php'; ?>

<?php

if (isset($_SESSION['username'])) {
    die(header("location:index.php"));
} else {
    if (isset($_POST['login'])) {
        $username = escape($_POST['username']);
        $password = escape($_POST['password']);

        $user = User::check_user_existance($username, $password);

        if ($user) {
            $session->set_session($user);
            header('location:index.php');
        } else {
            die(header("location:login.php?loggin_msg=losipodaci"));
        }
    } die(header("location:index.php"));
}
?>
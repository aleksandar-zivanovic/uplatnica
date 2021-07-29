<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/navbar.php'; ?>

<?php

$session->logout();
header("location:index.php");
?>
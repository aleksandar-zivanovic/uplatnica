<?php ob_start(); ?>
<?php include_once 'init.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Uplatnica - Nalog za placanje</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" media="print" href="css/print.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />

        <?php
        if (strpos($_SERVER['PHP_SELF'], "login.php") || strpos($_SERVER['PHP_SELF'], "register.php") || strpos($_SERVER['PHP_SELF'], "edit_acc.php") || strpos($_SERVER['PHP_SELF'], "forgot_password.php") || strpos($_SERVER['PHP_SELF'], "reset.php")) {
            echo '<link rel="stylesheet" type="text/css" href="css/login.css" />';
        }

        if (strpos($_SERVER['REQUEST_URI'], "trazi_uplatnicu_po_kodu.php") || strpos($_SERVER['PHP_SELF'], "trazi_uplatnicu_po_kodu.php")):
            ?>

            <!-- Custom JS -->
            <script src="js/custom.js"></script>

            <!--jQuery 3.6.0-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

            <?php
        endif;
        ?>
    </head>
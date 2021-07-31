<?php
ob_start();

require_once '../classes/database.php';
require_once '../classes/db_object.php';
require_once '../classes/uplatnica.php';
require_once '../classes/config.php';
require_once '../classes/user.php';
require_once '../functions.php';

if (isset($_POST['kod_upl'])) {
    $uplatnica = new Uplatnica();
    $uplatnica->kod_uplatnice = trim(htmlspecialchars($_POST['kod_upl']));
    $uplatnica->pronadji_uplatnicu_po_kodu();
} else {
    die(header('location:../index.php'));
}
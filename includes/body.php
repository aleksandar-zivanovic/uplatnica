<?php include_once 'navbar.php'; ?>

<?php
if (isset($_POST['edit_id'])){
    $_SESSION['edit_id'] = $_POST['edit_id'];
}

?>

<body>
    <?php if (isset($_GET['reg_msg']) && $_GET['reg_msg'] == "uspesna_registracija"): ?>
        <div class="alert alert-success" role="alert">
            Uspesno ste se registrovali.
            <?php
            if (isset($_GET['new_user'])) {
                echo "Vaše korisničko ime je: <b>" . $_GET['new_user'] . "</b>";
            }
            ?>
        </div>

        <?php
    endif;

    if (isset($_GET['del']) && $_GET['del'] == "success") {
        ?>
        <div class="alert alert-success">
            Korisnik je uspešno obrisan.
        </div>
        <?php
    }

    if (isset($_GET['reset']) && $_GET['reset'] == "wrong_token") {
        ?>
        <div class="alert alert-danger">
            Link za resetovanje šifre je neispravan. Molimo Vas da proverite svoj email i unesete ispravan link. Hvala!.
        </div>
        <?php
    }


    if (isset($_POST['pogledaj'])) {
        include_once 'includes/verify.php';
    } elseif (isset($_POST['snimi']) || isset($_POST['stampaj'])) {
        include_once 'includes/snimi.php';
    } else {
        include_once 'includes/blanko_uplatnica.php';
    }
    ?>

</body>
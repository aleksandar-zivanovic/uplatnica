<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand btn-outline-secondary p-1" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link btn-outline-secondary p-1 mr-3" href="trazi_uplatnicu_po_kodu.php">Unesi kod</a>
            <?php if (!isset($_SESSION['username'])): ?>
                <a class="nav-item nav-link btn-outline-secondary p-1 mr-3" href="login.php">Login <span class="sr-only"></span></a>
                <a class="nav-item nav-link btn-outline-secondary p-1 mr-3" href="register.php">Register</a>
            <?php else: ?>
                <a class="nav-item nav-link btn-outline-secondary p-1 mr-3" href="pregled.php">Snimljene uplatnice</a>
                <a class="nav-item nav-link btn-outline-secondary p-1 mr-3" href="edit_acc.php">Izmena naloga</a>
                <a class="nav-item nav-link btn-outline-secondary p-1" href="logout.php">Logout</a>
            <?php endif; ?>


            <!--<a class="nav-item nav-link disabled" href="#">Disabled</a>-->
        </div>
    </div>
</nav>
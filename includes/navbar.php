<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        <?php if(!isset($_SESSION['username'])): ?>
      <a class="nav-item nav-link" href="login.php">Login <span class="sr-only"></span></a>
      <a class="nav-item nav-link" href="register.php">Register</a>
      <?php else: ?>
      <a class="nav-item nav-link" href="pregled.php">Snimljene uplatnice</a>
      <a class="nav-item nav-link" href="edit_acc.php">Izmena naloga</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>
      <?php endif; ?>
      
      
      <!--<a class="nav-item nav-link disabled" href="#">Disabled</a>-->
    </div>
  </div>
</nav>
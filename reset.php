<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>


<?php
if (isset($_SESSION['username'])) {
    die(header("location:index.php"));
}

if (isset($_POST['snimi'])) {
    $email = escape($_GET['email']);
    $new_pass = escape($_POST['password1']);
    $new_pass_conf = escape($_POST['password2']);

    if ($new_pass == $new_pass_conf) {
        if (empty($new_pass) || $new_pass == '' || strlen($new_pass) < 6) {
            $reset_msg = "Polje za sifru mora biti popunjeno <br>i sifra mora imati najmanje 6 karaktera";
        } else {
            $new_pass_hash = password_hash($new_pass, PASSWORD_BCRYPT, ['cost' => 10]);

            if (User::update_password($new_pass_hash, $email)) {
                if (User::add_reset_token('', $email)) {
                    die(header("location:login.php?res_pass=success"));
                }
            } else {
                $reset_msg = "<h1>NIJE UPDATEOVANA SIFRA</h1>";
            }
        } // if - provera duzine i postojanja sifre
    } else {
        $reset_msg = "Sifre nisu identicne ili niste upisali sifru";
    } // if - uporedjivanje sifri
} // prvi if




if (isset($_GET['email']) && isset($_GET['token']) && strlen($_GET['token']) >= 20) {
    $token = escape($_GET['token']);

    if (!User::check_if_exists("reset_token", $token)) {
        header("location: index.php?reset=wrong_token");
    }
    ?>


    <body>



        <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->

                <!-- Message -->
    <?php if (isset($reset_msg)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <svg width="2em" height="2em" viewBox="0 0 20 20" class="bi bi-shield-exclamation" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                        </svg> <?php echo $reset_msg; ?>
                    </div>
    <?php } ?>

                <!-- Login Form -->
                <form action="" method="post">
                    <input type="password" id="password1" class="fadeIn second" name="password1" placeholder="Upiši novu šifru">
                        <input type="password" id="password2" class="fadeIn third" name="password2" placeholder="Potvrdi novu šifru">
                            <input type="submit" name="snimi" class="fadeIn fourth" value="Snimi šifru">
                                </form>

                                <!-- Remind Passowrd -->
                                <!--                                <div id="formFooter">
                                                                    <a class="underlineHover" href="register.php">Napravite nalog</a><br>
                                                                        <a class="underlineHover" href="forgot_password.php">Zaboravili ste šifru</a>
                                                                </div>-->

                                </div>
                                </div>

                                </body>

    <?php
} else {
    header("location:index.php");
}
?>
                            <?php include_once 'includes/footer.php'; ?>
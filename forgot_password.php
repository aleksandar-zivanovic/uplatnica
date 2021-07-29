<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<?php
if (isset($_SESSION['username'])) {
    die(header("location:index.php"));
}
?>

<body>


    <?php
    if (isset($_POST['forgot'])) {
        $sakri_formu = "hidden='hidden'"; // bice poruka o uspesnom resetu
        $length = 20;
        $reset_token = bin2hex(random_bytes($length));


        if (isset($_POST['email']) && $_POST['email'] != '' && strlen($_POST['email']) > 10) {

            $clean_email = escape($_POST['email']);

            require_once 'includes/forgot_password_processing.php';

            if (User::check_if_exists("email_uplatioca" ,$clean_email)) {

                if (!User::add_reset_token($reset_token, $clean_email)) {
                    $token_error = "add_reset_token error";
                }
            } // end of check_if_email_exists()
        } else {
            $no_email = "postoji greska";
        } // end of if za $_POST['email'] parametre 
    } else { // for isset($_POST['forgot']
        $sakri_formu = '';
    } // end of if (isset($_POST['forgot']))
    ?>


    <div class="wrapper fadeInDown" <?php echo $sakri_formu; ?>>
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Message -->
            <?php if (isset($_GET['loggin_msg']) && $_GET['loggin_msg'] == "losipodaci"): ?>
                <div class="alert alert-danger" role="alert">
                    <svg width="2em" height="2em" viewBox="0 0 20 20" class="bi bi-shield-exclamation" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg> Korisničko ime i/ili šifra nisu ispravni.
                </div>
            <?php endif; ?>

            <!-- prijavljuje gresku kod dodavanja tokena u bazu pomovu add_reset_token() metode ---> 
            <?php if (isset($token_error) && $token_error == "add_reset_token error"): ?>
                <div class="alert alert-danger" role="alert">
                    <svg width="2em" height="2em" viewBox="0 0 20 20" class="bi bi-shield-exclamation" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg> Token za reset emaila nije napravljen. <br> Molimo Vas, da pokušate ponovo.
                </div>
            <?php endif; ?>


            <!-- prijavljuje gresku kod dodavanja tokena u bazu pomovu add_reset_token() metode ---> 
            <?php if (isset($no_email) && $no_email == "postoji greska"): ?>
                <div class="alert alert-danger" role="alert">
                    <svg width="2em" height="2em" viewBox="0 0 20 20" class="bi bi-shield-exclamation" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg> Niste upisali email adresu.
                </div>
            <?php endif; ?>



            <!-- Login Form -->
            <form action="" method="post">
                <input type="email" id="email_reset" class="fadeIn third" name="email" placeholder="email adresa">
                    <input type="submit" name="forgot" class="fadeIn fourth" value="Resetuj šifru">
                        </form>

                        <!-- Remind Passowrd -->
                        <div id="formFooter">
                            <a class="underlineHover" href="register.php">Napravite nalog</a><br>
                        </div>

                        </div>
                        </div>

                        </body>


                        <?php include_once 'includes/footer.php'; ?>
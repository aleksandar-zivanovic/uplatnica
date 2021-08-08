<?php require_once 'includes/header.php'; ?>

<?php
if (isset($_SESSION['username'])) {
    die(header("location:index.php"));
}

if (isset($_POST['register']) && !isset($_SESSION['username'])) {

//    provera da li su polja iz forme za registraciju empty
    $kljucevi = array_keys($_POST);
    foreach ($_POST as $key => $value) {
        if (empty($value) || trim($value) == '') {
            $prazna_polja = "prazna_polja";
        }
    } // end foreach

    if (!isset($prazna_polja) && $prazna_polja != "prazna_polja") {

// ako je sve u redu, vrsi se pravljenje promenljivih i dodeljivanje njihovih vrednosti iz $_POST niza
        extract(clean_form_inputs($_POST));
        unset($register);

        if (User::check_username($username) == true) {
            $_SESSION['reg_error'] = "Korisničko ime je zauteto.";
            die(header('location:register.php'));
        }

        if (User::check_email($email_uplatioca) === true) {
            $_SESSION['reg_error'] = "Korisnik sa ovom email adresom već postoji.";
            die(header('location:register.php'));
        }

        User::register_user($username, $password_uplatioca, $email_uplatioca, $ime_uplatioca, $prezime_uplatioca, $adresa_uplatioca, $postanski_br_uplatioca, $mesto_uplatioca);

//        automatsko loginovanje novog korisnika u sluaju uspesne registracija
        $username = escape($_POST['username']);
        $password = escape($_POST['password_uplatioca']);

        $user = User::check_user_existance($username, $password);
        $session->set_session($user);

        header("location:index.php?reg_msg=uspesna_registracija&new_user={$username}");
    }
} // end of 1st if
?>
<body>
    <?php include_once 'includes/navbar.php'; ?>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
              <!--<img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />-->

                <?php if (isset($prazna_polja) && $prazna_polja == "prazna_polja"): ?>
                    <div class="alert alert-danger" role="alert">
                        <svg width="2em" height="2em" viewBox="0 0 20 20" class="bi bi-shield-exclamation" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                        </svg> Morate popuniti sva polja.
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['reg_error'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <svg width="2em" height="2em" viewBox="0 0 20 20" class="bi bi-shield-exclamation" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                        </svg> <?php echo $_SESSION['reg_error']; ?>
                    </div>
                    <?php
                    unset($_SESSION['reg_error']);
                endif;
                ?>


            </div>

            <!-- Register Form -->
            <form action="" method="post">

                <h6 for="username">Korisničko ime:</h6>
                <input type="text" id="username" class="fadeIn second" name="username" placeholder="(korisničko ime)"
                       value="<?php echo isset($prazna_polja) ? htmlspecialchars($_POST['username']) : null; ?>">

                    <h6 for="password">Vaša šifra</h6>
                    <input type="text" id="password" class="fadeIn third" name="password_uplatioca" placeholder="(sifra)"
                           value="<?php echo isset($prazna_polja) ? htmlspecialchars($_POST['password_uplatioca']) : null; ?>">

                        <h6 for="email">Vaša email adresa</h6>
                        <input type="email" id="email" class="fadeIn third" name="email_uplatioca" placeholder="(email adresa)"
                               value="<?php echo isset($prazna_polja) ? htmlspecialchars($_POST['email_uplatioca']) : null; ?>">

                            <h6 for="ime">Vaše puno ime:</h6>
                            <input type="text" id="ime" class="fadeIn second" name="ime_uplatioca" placeholder="(ime)" 
                                   value="<?php echo isset($prazna_polja) ? htmlspecialchars($_POST['ime_uplatioca']) : null; ?>">

                                <h6 for="prezime">Prezime:</h6>
                                <input type="text" id="prezime" class="fadeIn third" name="prezime_uplatioca" placeholder="(prezime)" 
                                       value="<?php echo isset($prazna_polja) ? htmlspecialchars($_POST['prezime_uplatioca']) : null; ?>">

                                    <h6 for="adresa">Adresa: ulica i broj</h6>
                                    <input type="text" id="adresa" class="fadeIn third" name="adresa_uplatioca" placeholder="(adresa - ulica i br.)" 
                                           value="<?php echo isset($prazna_polja) ? htmlspecialchars($_POST['adresa_uplatioca']) : null; ?>"><br>

                                            <h6 for="pbox">Poštanski broj:</h6>
                                            <input type="text" id="pbox" class="fadeIn second" name="postanski_br_uplatioca" placeholder="(postanski broj)" 
                                                   value="<?php echo isset($prazna_polja) ? htmlspecialchars($_POST['postanski_br_uplatioca']) : null; ?>">

                                                <h6 for="grad">Mesto stanovanja:</h6>
                                                <input type="text" id="grad" class="fadeIn third" name="mesto_uplatioca" placeholder="(mesto stanovanja)" 
                                                       value="<?php echo isset($prazna_polja) ? htmlspecialchars($_POST['mesto_uplatioca']) : null; ?>">

                                                    <input type="submit" name="register" class="fadeIn fourth" value="Registruj se">
                                                        </form>

                                                        <!-- Login -->
                                                        <div id="formFooter">
                                                            <a class="underlineHover" href="login.php">Već ste registrovani?</a><br>
                                                                <a class="underlineHover" href="forgot_password.php">Zaboravili ste šifru</a>
                                                        </div>

                                                        </div>
                                                        </div>

                                                        </body>


                                                        <?php include_once 'includes/footer.php'; ?>
<?php
/* SNIMANJE I EDITOVANJE UPLATNICE */
if (isset($_POST['snimi']) || isset($_POST['stampaj']) || isset($_POST['izmeni'])) {
    $db = new Database();


    $su_id_uplatioca = $_SESSION['id_uplatioca'];

    $su_platilac = trim(htmlspecialchars(filter_input(INPUT_POST, 'verify_ime', FILTER_SANITIZE_STRING)));
    $cl_su_uplatilac = $db->conn->real_escape_string($su_platilac);

    $su_svrha = trim(htmlspecialchars(filter_input(INPUT_POST, 'verify_svrha', FILTER_SANITIZE_STRING)));
    $cl_su_svrha = $db->conn->real_escape_string($su_svrha);

    $su_primalac = trim(htmlspecialchars(filter_input(INPUT_POST, 'verify_primalac', FILTER_SANITIZE_STRING)));
    $cl_su_primalac = $db->conn->real_escape_string($su_primalac);

    $su_sifra = trim(htmlspecialchars(filter_input(INPUT_POST, 'verify_sp', FILTER_SANITIZE_NUMBER_INT)));
    $cl_su_sifra = $db->conn->real_escape_string($su_sifra);

    $su_valuta = trim(htmlspecialchars(filter_input(INPUT_POST, 'verify_valuta', FILTER_SANITIZE_STRING)));
    $cl_su_valuta = $db->conn->real_escape_string($su_valuta);

    $su_iznos = trim(htmlspecialchars(filter_input(INPUT_POST, 'verify_iznos', FILTER_SANITIZE_STRING)));
    $su_iznos = str_replace("=", "", $su_iznos);
    $su_iznos = str_replace(".", "", $su_iznos);
    $su_iznos = str_replace(" ", "", $su_iznos);
    $cl_su_iznos = $db->conn->real_escape_string($su_iznos);

    $su_racun_primaoca = trim(htmlspecialchars(filter_input(INPUT_POST, 'verify_racun_prim', FILTER_SANITIZE_STRING)));
    $su_racun_primaoca = str_replace("-", "", $su_racun_primaoca);
    $su_racun_primaoca = str_replace(" ", "", $su_racun_primaoca);
    $cl_su_racun_primaoca = $db->conn->real_escape_string($su_racun_primaoca);

    if (empty($_POST['verify_model'])) {
        $cl_su_model = " ";
    } else {
        $su_model = trim(htmlspecialchars(filter_input(INPUT_POST, 'verify_model', FILTER_SANITIZE_STRING)));
        $cl_su_model = $db->conn->real_escape_string($su_model);
    }

    if (empty($_POST['verify_poz_br'])) {
        $cl_su_poz_na_br = " ";
    } else {
        $su_poz_na_br = trim(htmlspecialchars(filter_input(INPUT_POST, 'verify_poz_br', FILTER_SANITIZE_STRING)));
        $cl_su_poz_na_br = $db->conn->real_escape_string($su_poz_na_br);
    }


    if (empty($_POST['verify_ime']) || empty($_POST['verify_svrha']) || empty($_POST['verify_primalac']) || empty($_POST['verify_sp']) || empty($_POST['verify_valuta']) || empty($_POST['verify_iznos']) || empty($_POST['verify_racun_prim'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert"> <strong>Da biste mogli da snimite uplatnicu, morate da popunite sva polja.</strong> Polja model i poziv na broj (odobrenje) nisu obavezna.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    } else {

        /* SNIMANJE */
        if (isset($_POST['snimi']) && !isset($_SESSION['edit_id'])) {
            $sql = "INSERT INTO sacuvane_uplatnice(su_id_uplatioca, su_uplatilac, su_svrha, su_primalac, su_sifra, su_valuta, su_iznos, su_racun_primaoca, su_model, su_poz_na_br) VALUES($su_id_uplatioca, '$cl_su_uplatilac', '$cl_su_svrha', '$cl_su_primalac', $cl_su_sifra, '$cl_su_valuta', '$cl_su_iznos', '$cl_su_racun_primaoca', '$cl_su_model', '$cl_su_poz_na_br')";
            if ($db->query($sql)) {
                echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert"> <strong>Uspesno ste snimili uplatnicu.</strong> Sve svoje snimljene uplatnice mozete pogledati <a href="pregled.php">OVDE</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            } // END of ---> if ($db->query($sql)) {
        } // END of ---> if (isset($_POST['snimi'])) {


        /* EDITOVANJE */
        if (isset($_SESSION['edit_id']) && !empty($_SESSION['edit_id'])) {
            $edit_id = $_SESSION['edit_id'];
            $sql = "UPDATE sacuvane_uplatnice SET "
                    . "su_id_uplatioca  = '$su_id_uplatioca', "
                    . "su_uplatilac = '$cl_su_uplatilac', "
                    . "su_svrha = '$cl_su_svrha', "
                    . "su_primalac = '$cl_su_primalac', "
                    . "su_sifra = $cl_su_sifra, "
                    . "su_valuta = '$cl_su_valuta', "
                    . "su_iznos = '$cl_su_iznos', "
                    . "su_racun_primaoca = '$cl_su_racun_primaoca', "
                    . "su_model = '$cl_su_model', "
                    . "su_poz_na_br = '$cl_su_poz_na_br' "
                    . "WHERE id_uplate = $edit_id";
            if ($db->query($sql)) {
                echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert"> <strong>Uspesno ste snimili izmene podataka iz uplatnice.</strong> Sve svoje snimljene uplatnice mozete pogledati <a href="pregled.php">OVDE</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                unset($_SESSION['edit_id']);
            } // END of ---> if ($db->query($sql)) {
        }
    }
}
?>
<?php include_once 'navbar.php'; ?>
<body>

    <div class="container">

        <div class="row">

            <div class="container-fluid mt-5">

                <form action="" method="POST">

                    <div id="za_stampanje" class="border">


                        <div class="row p-1">


                            <!-- Levi deo uplatnice -->
                            <div class="col-md-6 float-left">
                                <div class="form-group">
                                    <h6>platilac</h6>
                                    <textarea name="verify_ime" class="form-control custom_input_height" rows="3" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $su_platilac; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <h6>svrha uplate</h6>
                                    <textarea name="verify_svrha" class="form-control custom_input_height" rows="3" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $cl_su_svrha; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <h6>primalac</h6>
                                    <textarea name="verify_primalac" class="form-control custom_input_height" rows="3" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $cl_su_primalac; ?></textarea>
                                </div>
                            </div>  <!-- END of Levi deo uplatnice-->




                            <!-- Desni deo uplatnice -->

                            <div class="col-md-6 border-left float-right">

                                <div class="row">

                                    <div class="col-md-3 form-group">
                                        <h6>sifra placanja</h6>
                                        <textarea name="verify_sp" class="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $cl_su_sifra; ?></textarea>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <h6>valuta</h6>
                                        <textarea name="verify_valuta" class="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;">RSD</textarea>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <h6>iznos</h6>
                                        <textarea name="verify_iznos" class="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $cl_su_iznos; ?></textarea>
                                    </div>

                                </div> <!-- END of row -->


                                <div class="form-group">
                                    <h6>racun primaoca</h6>
                                    <textarea name="verify_racun_prim" class="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $cl_su_racun_primaoca; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <h6> model i poziv na broj (odobrenje)</h6>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <textarea name="verify_model" class="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $cl_su_model; ?></textarea>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea name="verify_poz_br" class="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $cl_su_poz_na_br; ?></textarea>
                                        </div>
                                    </div> <!-- END of row -->


                                </div>

                            </div>   <!-- END of Desni deo uplatnice-->


                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <span class="d-block pl-1 pt-3">____________________________________________________________</span>
                                <span class="d-block pl-1"><mdall>pecat i potpis platioca</mdall></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <span class="d-block float-right pr-1">____________________________________</span><br>
                                <span class="d-block float-right pr-1"><mdall>mesto  i datum prijema</mdall></span>
                            </div>
                            <div class="col-md-6">
                                <span class="d-block pl-2">____________________________________</span>
                                <span class="d-block pl-2"><mdall>datum izvrsenja</mdall></span>
                            </div>
                        </div>

                    </div>  <!-- KRAJ div-a #za-stampanje -->


            </div>  <!-- END of div . container-fluid mt-5  -->

            <div class="d-flex justify-content-between form-group col-md-12">
                <!-- onclick="priznanica()" -->
                <button type="submit" name="izmeni" class="btn btn-info form-control col-md-2">Izmeni</button>

                <button type="submit" name="snimi" class="btn btn-info form-control col-md-2">Sacuvaj</button>
                <button id="za_stampanje" name="stampaj" onclick="printDiv('za_stampanje')" class="btn btn-info form-control col-md-2">Odstampaj</button>
                <a href="index.php" type="obrisi_podatke" name="ponisti" class="btn btn-danger form-control col-md-2 float-right">Ponisti</a>


                </form>
            </div>  <!-- KRAJ div-a u kome je forma uplatnice -->

        </div>  <!-- END of row-->



    </div>



</body>

<script type="text/javascript">
    function printDiv(za_stampanje) {
        var printContents = document.getElementById('za_stampanje').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>
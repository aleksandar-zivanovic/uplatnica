<?php
if (isset($_POST['pogledaj'])) :
    
    $ime_uplatioca = trim(htmlspecialchars(filter_input(INPUT_POST, 'uplatilac', FILTER_SANITIZE_STRING)));
    $svrha_uplate = trim(htmlspecialchars(filter_input(INPUT_POST, 'svrha_uplate', FILTER_SANITIZE_STRING)));
    $primalac = trim(htmlspecialchars(filter_input(INPUT_POST, 'primalac', FILTER_SANITIZE_STRING)));
    $sifra_placanja = trim(htmlspecialchars(filter_input(INPUT_POST, 'sifra_placanja', FILTER_SANITIZE_STRING)));
    $valuta = trim(htmlspecialchars(filter_input(INPUT_POST, 'valuta', FILTER_SANITIZE_STRING)));
    $iznos_uplate = trim(htmlspecialchars(filter_input(INPUT_POST, 'iznos_uplate', FILTER_SANITIZE_STRING)));
    $racun_primaoca = trim(htmlspecialchars(filter_input(INPUT_POST, 'racun_primaoca', FILTER_SANITIZE_STRING)));
    $model = trim(htmlspecialchars(filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING)));
    $poziv_na_br = trim(htmlspecialchars(filter_input(INPUT_POST, 'poziv_na_br', FILTER_SANITIZE_STRING)));


    if (isset($_POST['obrisi_podatke'])) {
        unset($_POST['pogledaj']);
    }
    ?>



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
                                        <textarea name="verify_ime" readonly class="form-control custom_input_height" rows="3" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $ime_uplatioca; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <h6>svrha uplate</h6>
                                        <textarea name="verify_svrha" readonly class="form-control custom_input_height" rows="3" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $svrha_uplate; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <h6>primalac</h6>
                                        <textarea name="verify_primalac" readonly class="form-control custom_input_height" rows="3" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $primalac; ?></textarea>
                                    </div>
                                </div>  <!-- END of Levi deo uplatnice-->




                                <!-- Desni deo uplatnice -->

                                <div class="col-md-6 border-left float-right">

                                    <div class="row">

                                        <div class="col-md-3 form-group">
                                            <h6>sifra placanja</h6>
                                            <textarea name="verify_sp" readonly class="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $sifra_placanja; ?></textarea>
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <h6>valuta</h6>
                                            <textarea name="verify_valuta" readonly class="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;">RSD</textarea>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <h6>iznos</h6>
                                            <textarea name="verify_iznos" readonly class="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $iznos_uplate; ?></textarea>
                                        </div>

                                    </div> <!-- END of row -->


                                    <div class="form-group">
                                        <h6>racun primaoca</h6>
                                        <textarea name="verify_racun_prim" readonly class="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $racun_primaoca; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <h6> model i poziv na broj (odobrenje)</h6>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <textarea name="verify_model" readonly class="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $model; ?></textarea>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea name="verify_poz_br" readonly class="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;"><?php echo $poziv_na_br; ?></textarea>
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

                    <?php if (isset($_SESSION['email_uplatioca'])): ?>
                        <button type="submit" name="snimi" class="btn btn-info form-control col-md-2">Sacuvaj</button>
                    <?php endif; ?>

                    <button id="za_stampanje" onclick="printDiv('za_stampanje')" class="btn btn-info form-control col-md-2">Odstampaj</button>
                    <button type="obrisi_podatke" name="ponisti" class="btn btn-danger form-control col-md-2 float-right">Ponisti</button>

                    </form>
                </div>  <!-- KRAJ div-a u kome je forma uplatnice -->
                    <?php
                    if (!isset($_SESSION['email_uplatioca'])):
                        echo '<div class=" container-fluid alert alert-warning alert-dismissible fade show text-center" role="alert">Da biste <strong>snimili uplatnicu</strong> kliknite <a href="login.php">OVDE</a> da biste se prijavili na sajt.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><br><br>';
                    endif;
                    ?>
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


<?php endif; ?>
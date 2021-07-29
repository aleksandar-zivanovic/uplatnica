<div class="container">

        <div class="row">

            <div class="container-fluid mt-5 border">

                <form action="" method="POST">
                    <div class="row p-1">



                        <!-- Levi deo uplatnice -->
                        <div class="col-xl-6 float-left">
                            <div class="form-group">
                                <h6>platilac - <small>lice koje uplacuje novac</small></h6>
                                <textarea
                                    name="uplatilac" 
                                    id="ime_uplatioca" 
                                    class="align-self-start form-control custom_input_height"
                                    rows="3" 
                                    wrap="soft" 
                                    style="overflow:hidden; resize:none; padding: 5px;"><?php
                                        if (isset($_SESSION['username']) && !isset($_POST['izmeni'])) {
                                            echo $_SESSION['ime_uplatioca'] . " ";
                                            echo $_SESSION['prezime_uplatioca'] . " ";
                                            echo $_SESSION['adresa_uplatioca'] . " ";
                                            echo $_SESSION['postanski_br_uplatioca'] . " ";
                                            echo $_SESSION['mesto_uplatioca'] . " ";
                                        }

                                        if (!isset($_SESSION['username']) && !isset($_POST['izmeni'])) {
                                            echo "ime, prezime i adresa";
                                        }

                                        izmena_podataka('verify_ime');
                                        ?></textarea>
                            </div>

                            <div class="form-group">
                                <h6>svrha uplate</h6>
                                <textarea
                                    name="svrha_uplate" 
                                    id="ime_uplatioca" 
                                    class="align-self-start form-control custom_input_height"
                                    rows="3" 
                                    wrap="soft" 
                                    style="overflow:hidden; resize:none; padding: 5px;"><?php
                                        izmena_podataka('verify_svrha');
                                        ?></textarea>
                                <!--<input type="text" name="svrha_uplate" class="form-control custom_input_height">-->
                            </div>

                            <div class="form-group">
                                <h6>primalac - <small>lice koje prima novac</small></h6>
                                <input type="text" name="primalac" class="form-control custom_input_height"
                                       value="<?php izmena_podataka('verify_primalac'); ?>">
                            </div>
                        </div>  <!-- END of Levi deo uplatnice-->




                        <!-- Desni deo uplatnice -->

                        <div class="col-xl-6 border-left float-right">

                            <div class="row">

                                <div class="col-xl-3 form-group">
                                    <h6>sifra placanja</h6>
                                    <input type="text" value="<?php izmena_podataka('verify_sp') ?>" name="sifra_placanja" class="form-control">
                                </div>

                                <div class="col-xl-3 form-group">
                                    <h6>valuta</h6>
                                    <input type="text" name="valuta" value="RSD" class="form-control">
                                </div>

                                <div class="col-xl-6 form-group">
                                    <h6>iznos</h6>
                                    <input type="text" name="iznos_uplate"
                                           value="<?php
                                           if (isset($_POST['izmeni'])) {
                                               echo trim(htmlspecialchars(filter_input(INPUT_POST, 'verify_iznos', FILTER_SANITIZE_STRING)));
                                           } else {
                                               echo "= ";
                                           }
                                           ?>" class="form-control">
                                </div>

                            </div> <!-- END of row -->

                            <div class="form-group">
                                <h6>racun primaoca</h6>
                                <input type="text" name="racun_primaoca" class="form-control" value="<?php izmena_podataka('verify_racun_prim'); ?>">
                            </div>

                            <div class="form-group">
                                <h6> model i poziv na broj (odobrenje)</h6>
                                <div class="row">
                                    <div class="col-xl-2">
                                        <input type="text" name="model" class="form-control" value="<?php izmena_podataka('verify_model'); ?>">
                                    </div>
                                    <div class="col-xl-10">
                                        <input type="text" name="poziv_na_br" class="form-control" value="<?php izmena_podataka('verify_poz_br') ?>">
                                    </div>
                                </div> <!-- END of row -->
                            </div>

                        </div>   <!-- END of Desni deo uplatnice-->


                    </div>

                    <div class="row">
                        <div class="col-xl-6">
                            <span class="d-block pl-1 pt-3">____________________________________________________________</span>
                            <span class="d-block pl-1"><small>pecat i potpis platioca</small></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6">
                            <span class="d-block float-right pr-1">____________________________________</span><br>
                            <span class="d-block float-right pr-1"><small>mesto  i datum prijema</small></span>
                        </div>
                        <div class="col-xl-6">
                            <span class="d-block pl-2">____________________________________</span>
                            <span class="d-block pl-2"><small>datum izvrsenja</small></span>
                        </div>
                    </div>

                    <div class="form-group col-xl-12">
                        <!-- onclick="priznanica()" -->  
                        <button type="submit" name="pogledaj" class="btn btn-primary form-control">Pogledaj svoju uplatnicu</button>
                    </div>
                </form>
            </div>  <!-- KRAJ div-a u kome je forma uplatnice -->


        </div>  <!-- END of row-->



    </div>  <!-- END of container-->
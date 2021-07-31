



<div class="container-fluid mt-5">

    <form action="" method="POST">

        <div id="za_stampanje" class="border">


            <div class="row p-1">


                <!-- Levi deo uplatnice -->
                <div class="col-md-6 float-left">
                    <div class="form-group">
                        <h6>platilac</h6>
                        <textarea name="verify_ime" readonly class="form-control custom_input_height" rows="3" wrap="soft" style="background-color: white; overflow:hidden; resize:none;"><?php echo $row['su_uplatilac']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <h6>svrha uplate</h6>
                        <textarea name="verify_svrha" readonly class="form-control custom_input_height" rows="3" wrap="soft" style="background-color: white; overflow:hidden; resize:none;"><?php echo $row['su_svrha']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <h6>primalac</h6>
                        <textarea name="verify_primalac" readonly class="form-control custom_input_height" rows="3" wrap="soft" style="background-color: white; overflow:hidden; resize:none;"><?php echo $row['su_primalac']; ?></textarea>
                    </div>
                </div>  <!-- END of Levi deo uplatnice-->




                <!-- Desni deo uplatnice -->

                <div class="col-md-6 border-left float-right">

                    <div class="row">

                        <div class="col-md-3 form-group">
                            <h6>sifra placanja</h6>
                            <textarea name="verify_sp" readonly class="form-control custom_input_height" rows="1" wrap="soft" style="background-color: white; overflow:hidden; resize:none;"><?php echo $row['su_sifra']; ?></textarea>
                        </div>

                        <div class="col-md-3 form-group">
                            <h6>valuta</h6>
                            <textarea name="verify_valuta" readonly class="form-control custom_input_height" rows="1" wrap="soft" style="background-color: white; overflow:hidden; resize:none;">RSD</textarea>
                        </div>

                        <div class="col-md-6 form-group">
                            <h6>iznos</h6>
                            <textarea name="verify_iznos" readonly class="form-control custom_input_height" rows="1" wrap="soft" style="background-color: white; overflow:hidden; resize:none;"><?php echo "= " . $row['su_iznos']; ?></textarea>
                        </div>

                    </div> <!-- END of row -->


                    <div class="form-group">
                        <h6>racun primaoca</h6>
                        <textarea name="verify_racun_prim" readonly class="form-control custom_input_height" rows="1" wrap="soft" style="background-color: white; overflow:hidden; resize:none;"><?php echo $row['su_racun_primaoca']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <h6> model i poziv na broj (odobrenje)</h6>
                        <div class="row">
                            <div class="col-md-2">
                                <textarea name="verify_model" readonly class="form-control custom_input_height" rows="1" wrap="soft" style="background-color: white; overflow:hidden; resize:none;"><?php echo $row['su_model']; ?></textarea>
                            </div>
                            <div class="col-md-10">
                                <textarea name="verify_poz_br" readonly class="form-control custom_input_height" rows="1" wrap="soft" style="background-color: white; overflow:hidden; resize:none;"><?php echo $row['su_poz_na_br']; ?></textarea>
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
    </form>

</div>  <!-- END of div . container-fluid mt-5  -->
<div class="d-flex justify-content-between form-group col-12 mt-2">
    <button id="za_stampanje" onclick="printDiv('za_stampanje')" class="btn btn-info form-control col-12">Odstampaj</button>
</div>  <!-- KRAJ div-a u kome je forma uplatnice -->


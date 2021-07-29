<?php
require_once 'includes/header.php';

if (!isset($_SESSION['email_uplatioca'])) {
    header('location: index.php');
}

$uplatnica = new Uplatnica();
$id = $_SESSION['id_uplatioca'];
$slanje = $uplatnica->find_all_by_param('su_id_uplatioca', $id);


if (isset($_POST['obrisi_upatu'])) {
    $uplatnica::$id = "id_uplate";
    $obrisi_id = $_POST['id_uplate_za_brisanje'];
    if ($uplatnica->delete_by_id($obrisi_id)) {
        $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert"> Uplatnica je <strong>uspesno obrisana.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        $session->set_msg($msg);
        die(header('location: pregled.php'));
    }
}
?>


<?php include_once 'includes/navbar.php'; ?>
<body>
<?php $session->display_msg(); ?>

    <div class="container">

        <div class="row">

            <div class="container-fluid mt-5">

                <table class="table table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Platilac</th>
                            <th scope="col">Svrha uplate</th>
                            <th scope="col">Primalac</th>
                            <th scope="col">Sifra</th>
                            <th scope="col">Valuta</th>
                            <th scope="col">Iznos</th>
                            <th scope="col">Racun primaoca</th>
                            <th scope="col">Model i poziv na br.</th>
                            <th scope="col" style="background-color: lightcyan;">Izmeni</th>
                            <th scope="col" style="background-color: lightsalmon;">Obrisi</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
while ($row = $slanje->fetch_assoc()):
    ?>
                            <tr>
                                <th scope="row"><?php echo $row['id_uplate']; ?></th>
                                <td><?php echo $row['su_uplatilac']; ?></td>
                                <td><?php echo $row['su_svrha']; ?></td>
                                <td><?php echo $row['su_primalac']; ?></td>
                                <td><?php echo $row['su_sifra']; ?></td>
                                <td><?php echo $row['su_valuta']; ?></td>
                                <td><?php echo $row['su_iznos']; ?></td>
                                <td><?php echo $row['su_racun_primaoca']; ?></td>

                                <!-- model i poziv na br. -->
    <?php
    if ($row['su_model'] != " " && $row['su_poz_na_br'] != ' ') {
        echo '<td>' . $row['su_model'] . ' | ' . $row['su_poz_na_br'] . '</td>';
    } else {
        echo '<td>' . $row['su_model'] . $row['su_poz_na_br'] . '</td>';
    }
    ?>




                                <!-- DUGME ZA IZMENU UPLATNICE --> 
                                <td>
                                    <form action="index.php" method="POST">

                                        <input type="hidden" name="edit_id" inpuclass="form-control custom_input_height" rows="3" wrap="soft" style="overflow:hidden; resize:none;" value="<?php echo $row['id_uplate']; ?>"></input>

                                        <input type="hidden" name="verify_ime" inpuclass="form-control custom_input_height" rows="3" wrap="soft" style="overflow:hidden; resize:none;" value="<?php echo $row['su_uplatilac']; ?>"></input>

                                        <input type="hidden" name="verify_svrha" inpuclass="form-control custom_input_height" rows="3" wrap="soft" style="overflow:hidden; resize:none;" value="<?php echo $row['su_svrha']; ?>"></input>


                                        <input type="hidden" name="verify_primalac" inpuclass="form-control custom_input_height" rows="3" wrap="soft" style="overflow:hidden; resize:none;" value="<?php echo $row['su_primalac']; ?>"></input>




                                        <input type="hidden" name="verify_sp" inpuclass="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;" value="<?php echo $row['su_sifra']; ?>"></input>

                                        <input type="hidden" name="verify_valuta" inpuclass="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;" value="RSD"></input>

                                        <input type="hidden" name="verify_iznos" inpuclass="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;" value="<?php echo $row['su_iznos']; ?>"></input>

                                        <input type="hidden" name="verify_racun_prim" inpuclass="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;" value="<?php echo $row['su_racun_primaoca']; ?>"></input>

                                        <input type="hidden" name="verify_model" inpuclass="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;" value="<?php echo $row['su_model']; ?>"></input>

                                        <input type="hidden" name="verify_poz_br" inpuclass="form-control custom_input_height" rows="1" wrap="soft" style="overflow:hidden; resize:none;" value="<?php echo $row['su_poz_na_br']; ?>"></input>

                                        <button type="submit" name="izmeni" class="btn btn-primary">
                                            Izmeni
                                        </button>

                                    </form>


                                </td>
                                <!-- END of DUGME ZA IZMENU UPLATNICE -->



                                <!-- DUGME ZA BRISANJE UPLATNICE --> 
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_modal<?php echo $row['id_uplate']; ?>">
                                        Obrisi
                                    </button>

                                    <!-- DELETE Modal -->
                                    <div class="modal fade bd-example-modal-xl" id="delete_modal<?php echo $row['id_uplate']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Brisanje snimljene uplatnice</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Da li zelite da obrisete uplatu sa ID-jem: <?php echo $row['id_uplate']; ?></h4>


                                                    <table border="1">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Platilac</th>
                                                                <th scope="col">Svrha uplate</th>
                                                                <th scope="col">Primalac</th>
                                                                <th scope="col">Sifra</th>
                                                                <th scope="col">Valuta</th>
                                                                <th scope="col">Iznos</th>
                                                                <th scope="col">Racun primaoca</th>
                                                                <th scope="col">Model</th>
                                                                <th scope="col">Poziv na br</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $row['su_uplatilac']; ?></td>
                                                                <td><?php echo $row['su_svrha']; ?></td>
                                                                <td><?php echo $row['su_primalac']; ?></td>
                                                                <td><?php echo $row['su_sifra']; ?></td>
                                                                <td><?php echo $row['su_valuta']; ?></td>
                                                                <td><?php echo $row['su_iznos']; ?></td>
                                                                <td><?php echo $row['su_racun_primaoca']; ?></td>

                                                                <!-- model i poziv na br. -->
    <?php
    if ($row['su_model'] != " ") {
        echo '<td>' . $row['su_model'] . '</td>';
    } else {
        echo '<td>' . $row['su_model'] . '</td>';
    }


    if ($row['su_poz_na_br'] != ' ') {
        echo '<td>' . $row['su_poz_na_br'] . '</td>';
    } else {
        echo '<td>' . $row['su_poz_na_br'] . '</td>';
    }
    ?>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="id_uplate_za_brisanje" value="<?php echo $row['id_uplate']; ?>">

                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
                                                        <button type="submit" name="obrisi_upatu" class="btn btn-danger">Obrisi</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END of Delete Modal -->

                                </td>

                                <!-- END of DUGME ZA BRISANJE UPLATNICE --> 



                            </tr>
<?php endwhile; ?>
                    </tbody>
                </table>

            </div>  <!-- KRAJ div-a u kome je forma uplatnice -->

        </div>  <!-- END of row-->



    </div>







</body>










<?php require_once 'includes/footer.php'; ?>
<?php
require_once 'includes/header.php';
include_once 'includes/navbar.php';
?>

<body>
    <div class="container">
        <div class="row">
            <?php // $session->display_msg();  ?>

            <form action="includes/search_by_code.php" method="POST" class="container-fluid mt-5">
                <div class="form-group row">
                    <label for="kod_upl" class="col-md-12 col-form-label col-form-label-lg">Pretraga po kodu uplatnice:</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-lg" id="kod_upl" name="kod_upl" placeholder="Unesite kod uplatnice">
                    </div>
                </div>
            </form>

        </div>

        <div class="row" id="rezultat_pretrage">
            <script>pretraga_po_kodu();</script>
        </div>  <!-- END of row-->

    </div>  <!-- END of container-->

</body>


<?php require_once 'includes/footer.php'; ?>


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
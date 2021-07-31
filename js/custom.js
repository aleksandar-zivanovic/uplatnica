function pretraga_po_kodu() {
    $(document).ready(function () {
        $('#kod_upl').keyup(function () {
            var kod_upl = $('#kod_upl').val();
            if (kod_upl.length >= 3){
            $.ajax({
                data: {'kod_upl': kod_upl},
                url: 'includes/ajax_search_process.php',
                type: 'POST',
                contex: this,
                success: function(resposne){
                    $('#rezultat_pretrage').html(resposne);
                }
            });
            }
        });


    });
}


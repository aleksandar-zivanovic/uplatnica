<?php

class Uplatnica extends Db_object {

    public static $table = 'sacuvane_uplatnice';
    public $id_uplatioca;
    public $kod_uplatnice;

    public function provera_duplog_koda() {
        $result = parent::find_all_by_param('kod_uplatnice', $this->kod_uplatnice);
        return $result->num_rows;
    }

    public function pronadji_uplatnicu_po_kodu() {
        if (parent::find_all_by_like_param('kod_uplatnice', $this->kod_uplatnice)->num_rows == 1):
            $row = parent::find_all_by_like_param('kod_uplatnice', $this->kod_uplatnice)->fetch_assoc();

            include_once '../includes/search_by_code.php';
        endif;
        
    }

}

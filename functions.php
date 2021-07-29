<?php

function escape($unos) {
    global $db;

    $html_ent = htmlspecialchars($unos);
    $trim = trim($html_ent);
    return $db->conn->real_escape_string($trim);
}

function clean_form_inputs($unos) {
    return array_map('escape', $unos);
}

function izmena_podataka($podataka) {
    if (isset($_POST['izmeni'])) {
        echo $izm_ime_uplatioca = trim(htmlspecialchars(filter_input(INPUT_POST, $podataka, FILTER_SANITIZE_STRING)));
    }
}


?>
<?php

class User extends Db_object {

    public static $table = "uplatilac";
    public static $id = "id_uplatioca";
//    public $niz_propertija = ['username', 'ime_uplatioca ', 'prezime_uplatioca', 'adresa_uplatioca', 'postanski_br_uplatioca', 'mesto_uplatioca'];
    public $username;
    public $ime_uplatioca;
    public $prezime_uplatioca;
    public $adresa_uplatioca;
    public $postanski_br_uplatioca;
    public $mesto_uplatioca;
    public $user_exists = false;

    public static function check_user_existance($username, $password) {
        global $db;

        $query = $db->query("SELECT * FROM uplatilac WHERE username = '{$username}';");
//        $result = mysqli_fetch_assoc($query);
//        foreach ($result as $key => $value) {
//            $pass_hash = $value;
//        }

        while ($row = mysqli_fetch_assoc($query)) {
            $pass_hash = $row['password_uplatioca'];
        }

        if (password_verify($password, $pass_hash)) {
            $sql = "SELECT * FROM " . static::$table . " WHERE username = '{$username}' AND password_uplatioca = '{$pass_hash}';";
            $rezultat_upita = $db->conn->query($sql);
            return mysqli_fetch_assoc($rezultat_upita);
        }
    }

    public static function check_if_exists($column, $value) {
        global $db;
        $query = $db->query("SELECT * FROM " . static::$table . " WHERE {$column} = '{$value}';");
        if (mysqli_num_rows($query) == 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function pass_hash($password) {
        $pass_hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
        return $pass_hash;
    }

    public static function register_user($username, $password_uplatioca, $email_uplatioca, $ime_uplatioca, $prezime_uplatioca, $adresa_uplatioca, $postanski_br_uplatioca, $mesto_uplatioca) {
        global $db;
        $pass_hash = password_hash($password_uplatioca, PASSWORD_BCRYPT, ['cost' => 10]);
        $sql = "INSERT INTO " . static::$table . " ";
        $sql .= "(username, password_uplatioca, email_uplatioca, ime_uplatioca, prezime_uplatioca, adresa_uplatioca, postanski_br_uplatioca, mesto_uplatioca) ";
        $sql .= "VALUES('{$username}', '{$pass_hash}', '{$email_uplatioca}', '{$ime_uplatioca}', '{$prezime_uplatioca}', '{$adresa_uplatioca}', '{$postanski_br_uplatioca}', '{$mesto_uplatioca}');";
        if ($db->query($sql)) {
            return $reg_msg = "Uspesno ste se registrovali na sajt!";
        }
    }

    public static function update_user($username, $password_uplatioca, $email_uplatioca, $ime_uplatioca, $prezime_uplatioca, $adresa_uplatioca, $postanski_br_uplatioca, $mesto_uplatioca, $id_uplatioca) {
        global $db;
        $sql = "UPDATE uplatilac SET ";
        $sql .= "username = '{$username}', ";
        $sql .= "password_uplatioca = '{$password_uplatioca}', ";
        $sql .= "email_uplatioca = '{$email_uplatioca}', ";
        $sql .= "ime_uplatioca = '{$ime_uplatioca}', ";
        $sql .= "prezime_uplatioca = '{$prezime_uplatioca}', ";
        $sql .= "adresa_uplatioca = '{$adresa_uplatioca}', ";
        $sql .= "postanski_br_uplatioca = '{$postanski_br_uplatioca}', ";
        $sql .= "mesto_uplatioca = '{$mesto_uplatioca}' ";
        $sql .= "WHERE id_uplatioca = '{$id_uplatioca}';";
        if ($db->query($sql)) {
            return $reg_msg = "Uspesno ste azurirali nalog!";
        }
    }

    public static function update_password($password, $email) {
        global $db;
        $sql = "UPDATE uplatilac SET password_uplatioca = '{$password}' WHERE email_uplatioca = '{$email}';";
        if ($db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function add_reset_token($token, $email_uplatioca) {
        global $db;
        $sql = "UPDATE uplatilac SET reset_token = '{$token}' WHERE email_uplatioca = '{$email_uplatioca}';";
        return $db->query($sql);
    }

}

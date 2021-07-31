<?php

class Db_object {

    public static $table;
    public static $id;

    public static function find_all() {
        global $db;
        $sql = "SELECT * FROM " . static::table;
        return $db->query($sql);
    }

    public static function find_all_by_param($param, $value) {
        global $db;
        $sql = "SELECT * FROM " . static::$table . " WHERE {$param} = '{$value}';";
        return $db->query($sql);
    }
    
    public static function find_all_by_like_param($param, $value) {
        global $db;
        $sql = "SELECT * FROM " . static::$table . " WHERE {$param} LIKE '" . $value . "%';";
        return $db->query($sql);
    }

    public static function instanciranje_objekta($sql) {
        global $db;
        $rezultat = $db->query($sql);

        $ime_klase = get_called_class();

        $niz_podataka = [];

        while ($row = mysqli_fetch_assoc($rezultat)) {
            $objekat = new $ime_klase; // isto je i sto i $objekat = new static;

            foreach ($row as $key => $value) {
                $objekat->$key = $value;
            }
            $niz_podataka[] = $objekat;
        }
        return $niz_podataka;
    }
    
    public static function delete_by_id($id_value){
        global $db;
        $sql = "DELETE FROM " . static::$table . " WHERE " . static::$id . " = '{$id_value}';";
        return $db->query($sql);
    }
    
}

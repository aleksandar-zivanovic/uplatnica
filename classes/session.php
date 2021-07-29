<?php

class Session {

//    public $niz_propertija = ['username' => '', 'ime_uplatioca ', 'prezime_uplatioca', 'adresa_uplatioca', 'postanski_br_uplatioca', 'mesto_uplatioca'];
    public $id_uplatioca;
    public $username;
    public $ime_uplatioca;
    public $prezime_uplatioca;
    public $adresa_uplatioca;
    public $postanski_br_uplatioca;
    public $mesto_uplatioca;
    

    public function __construct() {
        session_start();
    }

    public function set_session($user) {
        foreach ($user as $key => $value) {
            $this->$key = $_SESSION[$key] = trim(htmlspecialchars($value));
        }

        unset($_SESSION['password_uplatioca']);
        unset($this->password_uplatioca);
    }

    public function logout() {

        /*         koristim foreach umesto da svaku vrednost unset-ujem rucno jednu   
          //        unset($this->username);
          //        unset($this->ime_uplatioca);
          //        unset($this->prezime_uplatioca);
          //        unset($this->adresa_uplatioca);
          //        unset($this->postanski_br_uplatioca);
          //        unset($this->mesto_uplatioca);
         */

        foreach ($this as $key) {
            unset($key);
        }

        session_unset();
        session_destroy();
    }
    
    public function set_msg($msg) {
        $_SESSION['msg'] = $msg;
    }
    
    public function display_msg(){
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    }

}

$session = new Session;

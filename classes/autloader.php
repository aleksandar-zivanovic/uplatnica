<?php

class autloader {

    public function __construct() {
        spl_autoload_register(array($this, 'classAutloader'));
    }

    public function classAutloader($class) {
        $class_name = strtolower($class);
        $path = "classes/" . $class_name . ".php";

        if (is_readable($path) && !class_exists($class_name)) {
            include_once $path;
        }
    }

}

$autloader = new autloader();
?>
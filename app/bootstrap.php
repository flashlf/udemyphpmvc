<?php
    // Memanggil konfigurasi
    require_once 'config/config.php';

    // otomatis memanggil core libraries
    spl_autoload_register(function($className){
        require_once 'libraries/' . $className . '.php';
    });

<?php

    // Load Config
    require_once "../config/App.php";
    
    // Load Core Files
    require_once "Router.php";

    // Load Helpers
    // require_once 'helpers/url_helper.php';
    // require_once 'helpers/session_helper.php';
    // require_once 'helpers/currency_convertor.php';


    // Autoload Libaries
    spl_autoload_register(function($className){
        require_once "../libs/".$className.".php";
    });
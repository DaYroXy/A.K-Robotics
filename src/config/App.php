
<?php

    // Database Params
    // Global named constant for DB
    define('DB_HOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'ak-robotics');

    // Main Entry Point file
    $MainEntryPointFile = 'main.php';
    define("MainEntryPointFile", $MainEntryPointFile);

    /*
    *   if it is enabled it will exlude the site path name, 
    *   (mostly enabled by default) disable it for production.
    */
    $excludeProjectName = true;
    define("excludeProjectName", $excludeProjectName);

    // get the root directory name 'mostly used if excludeproejctname is enabled'
    $appRootDirectoryName = explode('\\', dirname(dirname(dirname(__FILE__))));
    $appRootDirectoryName = end($appRootDirectoryName);
    define("appRootDirectoryName", $appRootDirectoryName);

    // Site Name
    $siteName = "ak-robotics";
    define("SITENAME", $siteName);

    // App Version
    define("VERSION", "1.0.0");

    // You might face redireciton error, make sure to edit .htaccess to the correct path.

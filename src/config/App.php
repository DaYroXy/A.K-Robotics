
<?php

    // Database Params
    // Global named constant for DB
    define('DB_HOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'pooljunction');

    // Site Path
    /*
    *   if it is enabled it will exlude the site path name, 
    *   (mostly enabled by default) disable it for production.
    */
    $excludeProjectName = true;
    define("excludeProjectName", $excludeProjectName);

    $appRootDirectoryName = explode('\\', dirname(dirname(dirname(__FILE__))));
    $appRootDirectoryName = end($appRootDirectoryName);
    define("appRootDirectoryName", $appRootDirectoryName);


    // Site Name
    $siteName = "Pool Junction";
    define("SITENAME", $siteName);

    // App Version
    define("VERSION", "1.0.0");

    // You might face redireciton error, make sure to edit .htaccess to the correct path.

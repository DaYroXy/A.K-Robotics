<?php
    print_r("Hello");
    require_once "Bootstrap.php";
    $router = new Router();

    /*
     * @Routes Testing
    */
    $router->get('/', function($req) {
        print_r("Hello From index");
    });

    $router->get('/home', function($req) {
        print_r(json_encode($req));
    });

    $router->post('/home', function($req) {
        print_r("Hello From Home");
    });


    $router->dispatch($_SERVER["REQUEST_URI"]);

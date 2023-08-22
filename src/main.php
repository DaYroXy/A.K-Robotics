<?php

$router->get('/', function($req) {
    print_r($req);
});

$router->get('/admin', function($req) {
    print_r($req);
});

?>
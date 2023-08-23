<?php

$router->get('/', function($req) {
    setcookie('cookie_name', 'cookie_value', time() + 3600, '/', '', false, true);
    echo "hi";
}, ['authenticated']);

$router->post('/', function($req) {
    print_r(json_encode($req));
}, ['authenticated']);

$router->put('/', function($req) {
    print_r(json_encode($req));
}, ['authenticated']);

$router->delete('/', function($req) {
    print_r(json_encode($req));
}, ['authenticated']);

$router->patch('/', function($req) {
    print_r(json_encode($req));
}, ['authenticated']);


$router->middleware('authenticated', function($req) {
    return true;
});

$router->get('/admin', function($req) {
});

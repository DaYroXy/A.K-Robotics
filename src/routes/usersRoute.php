<?php

$usersRouter = new Router();

$usersRouter->get("/", function(){
    print_r("userRoutes /index");
});

$usersRouter->get("/name", function() {
    print_r("userRoutes /name");
});
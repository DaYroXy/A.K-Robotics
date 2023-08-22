<?php
    require_once "Bootstrap.php";
    $router = new Router();
    require_once "../$MainEntryPointFile";
    $router->dispatch($_SERVER["REQUEST_URI"]);

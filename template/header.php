<?php

$routes = require 'routes.php';

function generate_url($route_name) {
    global $routes;
    $url = BASE_URL;
    if (isset($routes[$route_name])) {
        $url .= $routes[$route_name];
    }
    return $url;
}

?>

<!doctype html>
<html lang="en">
    <head>
        <title>CRUD Full Stack By Jose Luis Arteaga Rivera</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>

    <nav class="navbar navbar-expand navbar-dark bg-dark">
            <ul class="nav navbar-nav ">
                <li><a class="nav-link text-white" href="<?php echo generate_url('home'); ?>">Inicio</a></li>
                <li><a class="nav-link text-white" href="<?php echo generate_url('contacts'); ?>">Contactos</a></li>
            </ul>
         </nav>

        <main class="container">
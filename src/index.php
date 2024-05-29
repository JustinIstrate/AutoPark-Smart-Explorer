<?php
$request = $_SERVER['REQUEST_URI'];
// Route the request
switch ($request) {
    case '':
    case '/Proiect_TW/src/':
    case 'Proiect_TW/src/homePage/':
        require 'homePage/index.php';
        break;
    case 'csvExplorer':
        require 'csvExplorer/index.php';
        break;
    case '/Proiect_TW/src/login/form.php':
        require 'login/form.php';
        break;
    case 'about':
        require 'about/about.php';
        break;
    default:
        http_response_code(404);
        echo $request;
        break;
}

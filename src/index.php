<?php
$request = $_SERVER['REQUEST_URI'];
$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

function loadPageContent($page) {
    ob_start();
    include $page;
    return ob_get_clean();
}

// Route the request
switch ($request) {
    case '':
    case '/Proiect_TW/src/':
    case '/Proiect_TW/src/homePage':
        $content = loadPageContent('homePage/index.php');
        break;
    case '/Proiect_TW/src/csvExplorer':
        $content = loadPageContent('csvExplorer/index.php');
        break;
    case '/Proiect_TW/src/login':
        $content = loadPageContent('login/index.php');
        break;
    case '/Proiect_TW/src/about':
        $content = loadPageContent('about/index.php');
        break;
    default:
        http_response_code(404);
        $content = 'Page not found';
        break;
}

if ($isAjax) {
    echo $content;
} else {
    include 'layout.php';
}
?>

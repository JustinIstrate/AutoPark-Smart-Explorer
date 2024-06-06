<?php
$request = $_SERVER['REQUEST_URI'];
$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

function loadPageContent($page) {
    ob_start();
    include $page;
    return ob_get_clean();
}

// Define the number of records per page
$rowsPerPage = 10;

// Extract path and query parameters
$urlParts = parse_url($request);
$path = $urlParts['path'] ?? '';
$queryParams = $urlParts['query'] ?? '';
parse_str($queryParams, $params);

// Route the request
switch ($path) {
    case '/Proiect_TW/src/':
    case '/Proiect_TW/src/homePage/':
        $content = loadPageContent('homePage/index.php');
        break;
    case '/Proiect_TW/src/csvExplorer':
        $content = loadPageContent('csvExplorer/index.php');
        break;
    case '/Proiect_TW/src/login':
        $page = isset($params['page']) ? intval($params['page']) : 1;
        $content = loadPageContent('login/index.php');
        break;
    case '/Proiect_TW/src/dataExplorer':
        $page = isset($params['page']) ? intval($params['page']) : 1;
        $content = loadPageContent('dataExplorer/index.php');
        break;
    case '/Proiect_TW/src/about':
        $content = loadPageContent('about/index.php');
        break;
    default:
        http_response_code(404);
        $content = 'Page not found';
        break;
}

// Include pagination input in the content
if (isset($page) && $page > 1) {
    $content .= '<input type="hidden" id="currentPage" value="' . $page . '">';
}

// Output the content
if ($isAjax) {
    echo $content;
} else {
    include 'layout.php';
}
?>

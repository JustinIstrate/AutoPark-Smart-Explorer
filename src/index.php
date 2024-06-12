<?php
// Extract the requested page from the URL query parameters
$mypage = isset($_GET['mypage']) ? $_GET['mypage'] : 'homePage';

// Define the number of records per page
$rowsPerPage = 10;

// Route the request
switch ($mypage) {
    case 'homePage':
        include 'homePage/index.php';
        echo $mypage;
        break;
    case 'csvExplorer':
        include 'csvExplorer/index.php';
        echo $mypage;
        break;
    case 'login':
        include 'login/index.php';
        break;
    case 'dataExplorer':
        include 'dataExplorer/index.php';
        break;
    case 'about':
        include 'about/index.php';
        break;
    default:
        http_response_code(404);
        echo 'Page not found';
        break;
}
?>

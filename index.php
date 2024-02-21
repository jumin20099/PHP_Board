<?php
include('./config/DBConnect.php');
session_start();
$request = $_SERVER['REQUEST_URI'];
$path = explode("?", $request);
$path[1] = isset($path[1]) ? $path[1] : null;
$resource = explode("/", $path[0]);
echo "<script>console.log('path[0] = " . $path[0] . "');</script>";
echo "<script>console.log('path[1] = " . $path[1] . "');</script>";

$page = "";
switch ($resource[1]) {
    case '':
        include('./components/header.php');
        $page = "./pages/main.php";
        break;

    case 'login':
        include('./components/header.php');
        $page = "./pages/" . $resource[1] . ".php";
        break;

    case 'signup':
        include('./components/header.php');
        $page = "./pages/" . $resource[1] . ".php";
        break;

    case 'posting':
        include('./components/header.php');
        $page = "./pages/" . $resource[1] . ".php";
        break;

    case 'logout':
        include('./components/header.php');
        $page = "./pages/" . $resource[1] . ".php";
        break;

    default:
        $page = "./pages/404.php";
        break;
}
include($page);
?>
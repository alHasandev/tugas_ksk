<?php

// property
$controller = "index";

// memasukkan file untuk menolong dalam pemanggilan fungsi dan constant
require('app/helper.php');

// // memanggil file untuk penggunaan database
// require('app/connectdb.php');

// memanggil file untuk mengontrol tampilan
function parseURL()
{
    if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
    }
}
// require_once('app/view.php');

if (file_exists('app/controller_' . parseURL()[0] . ".php")) {
    $controller = parseURL()[0];
}

require_once "app/controller_" . $controller . ".php";

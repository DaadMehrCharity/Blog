<?php

// Configuration
$servername = "localhost";
$dbname = "DaadMehr";

// This web app, uses MySQL server users
// If it can connect to MySQL, then user pass
// is valid else not.
// Create connection
$conn = @new mysqli($servername
    , $_SERVER['PHP_AUTH_USER'] // Username
    , $_SERVER['PHP_AUTH_PW'] // Password
    , $dbname);

// Set database charset to support persian.
// mysqli_set_charset($conn,"utf8");

// Define download path
define('_DownloadsPath', $_SERVER['DOCUMENT_ROOT'] .'/daadmehr.com/download');

// Define the root
$_Root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
$_Root .= "daadmehr.com/";
define('_Root', $_Root);
?>
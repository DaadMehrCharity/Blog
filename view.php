<?php
require_once 'admin/config.pass.php';
require_once 'admin/config.php';
require_once 'admin/time.php';
require_once 'admin/strings.php';

include 'master/header.php'
?>

<?php
// GET PATH INFO

// If does not exist index.php/something
if (!isset($_SERVER['PATH_INFO']))
    return [];

// else
$PathInfo = trim(
    $_SERVER['PATH_INFO']
    , '/');

$PathInfoArray = explode('/', $PathInfo);
$Id = 0;

if (isset($PathInfoArray[0]))
    $Id = $PathInfoArray[0];

if ($Id == 0)
{
    http_response_code(404);
    include('404.html'); // provide your own HTML for the error page
    die();
}

?>


test


<?php
include 'master/footer.php';
?>
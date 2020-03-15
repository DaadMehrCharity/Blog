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

if ($Id == 0 or !is_numeric($Id))
{
    notfound:
    http_response_code(404);
    include('404.html'); // provide your own HTML for the error page
    die();
}

?>


<?php
require_once 'admin/config.pass.php';
require_once 'admin/config.php';
require_once 'admin/time.php';
require_once 'admin/strings.php';
require_once 'admin/time.php';
include 'master/header.php'
?>


<?php
$select_keywords_query = "SELECT *
FROM `News`
WHERE `Id` = " . $Id;

$result = $conn->query($select_keywords_query);

if (!$row = $result->fetch_assoc())
    goto notfound;    
?>

<span><?php echo time_elapsed_string($row['Submit']) ?></span>
<h1><?php echo $row['Title'] ?></h1>
<p class="text-muted"><?php echo $row['Abstract'] ?></p>
<p><?php echo $row['Body'] ?></p>

<p>

<?php
include 'master/footer.php';
?>
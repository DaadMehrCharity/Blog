
<?php
require_once 'admin/config.pass.php';
require_once 'admin/config.php';
?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>درباره موسسه دادمهر</title>

<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/rastikerdar/sahel-font/v3.3.1/dist/font-face.css">
<link rel="stylesheet" type="text/css" href="css/about.css">

</head>
<body>
<header style="text-align: center">
    <img src="<?php echo _Root ?>media/logo.png" alt="موسسه‌ی خیریه‌ی دادمهر" />
    <h2>درباره موسسه داد‌مهر</h2>
    <p>حامی زنان سرپرست خانواده</p>
    <a href="index.php">بازگشت</a>
</header>


<div class="timeline">
  
<?php
$select_keywords_query = "SELECT *
FROM `Posts`
ORDER BY `Submit` DESC";

$result = $conn->query($select_keywords_query);
$right = true;
while ($row = $result->fetch_assoc()) {
    $right=!$right;
?>


<div class="container <?php echo $right ? "right" : "left" ?>">
    <div class="content">
        <h2><?php echo $row['Title'] ?></h2>
        <img src="<?php echo $row['Image'] ?>" alt="<?php echo $row['Title'] ?>" />
        <p><?php echo $row['Abstract'] ?></p>
        <a href="<?php echo $row['Canonical'] ?>">بیشتر...</a>
    </div>
</div>

<?php
}
?>

</div>

</body>
</html>

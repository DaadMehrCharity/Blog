<?php
require_once 'admin/config.pass.php';
require_once 'admin/config.php';
require_once 'admin/time.php';
require_once 'admin/strings.php';

include 'master/header.php'
?>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
      <form class="card-body form-inline justify-content-center text-center">
        <label class="card-title m-2 p-2" for="q">
          جستجو:
        </label>
        <input class="form-control m-2 p-2" type="text" name="q" id="q" data-toggle="tooltip" title="عبارت مورد نظر را وارد نمایید" />
        <button type="submit" class="btn btn-success m-2 p-2"  data-placement="top" />
        بگرد
        </button>
      </form>
    </div>
</div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<?php
if (!isset($_GET['q']))
$select_keywords_query = "SELECT *
FROM `News`
ORDER BY `Submit` DESC
LIMIT 25";
else
$select_keywords_query = "SELECT *
FROM `News`
WHERE `Title` LIKE '%" . injection_prevent($_GET['q']) . "%'
OR `Abstract` LIKE '%" . injection_prevent($_GET['q']) . "%'
ORDER BY `Submit` DESC
LIMIT 50 
";

$result = $conn->query($select_keywords_query);

while ($row = $result->fetch_assoc()) {
?>
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img class="card-img" src="download/<?php echo $row['Image'] ?>" alt="<?php echo $row['Title'] ?>">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><a href="<?php echo _Root . "view.php/" . $row['Id'] ?>"><?php echo $row['Title'] ?></a></h5>
          <p class="card-text">
          <?php echo $row['Abstract'] ?>
          </p>
          <p class="card-text"><small class="text-muted">
          <?php echo time_elapsed_string($row['Submit']); ?>
          </small></p>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>
<?php
include 'master/footer.php';
?>
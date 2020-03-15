<?php


require_once 'admin/config.pass.php';
require_once 'admin/config.php';
require_once 'admin/time.php';
require_once 'admin/strings.php';

if (isset($_POST['body']))
{
  $sql = "INSERT INTO `Comments` (`Phone`, `Body`) VALUES ('" . injection_prevent($_POST["phone"]) . "', '" . injection_prevent($_POST["body"]) . "')";

  if ($conn->query($sql) === TRUE) {
    $message = "پیام شما ارسال شد";
  }
}

include 'master/header.php';

if (isset($message))
{
?>
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title">پیامی دارید</h5>
      </div>
      <div class="modal-body">
        <p>پیغام شما با موفقیت ارسال شد. بررسی آن ممکن است از چند ساعت تا چند روز به طول بیانجامد. لطفا شکیبا باشید.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">متوجه شدم</button>
      </div>
    </div>
  </div>
</div>
<script>
$('.modal').modal('show')
</script>
<?php
}
?>

<form method="post">
    <h2>پیام شما به ما می‌رسد</h2>
    <div class="form-group">
        <label for="exampleInputPhone">شماره تلفن (دلخواه)</label>
        <input name="phone" type="text" class="form-control" id="exampleInputPhone" aria-describedby="phoneHelp" placeholder="09xxxxxxxxx">
        <small id="phoneHelp" class="form-text text-muted">اگر تمایل به دریافت پاسخ پیامتان دارید، شماره‌ی تلفن همراه خود را وارد نمایید.</small>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">متن پیام شما</label>
        <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">ارسال</button>
</form>

<?php

include 'master/footer.php'

?>
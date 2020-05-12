<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>اترك اثر</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $css_c; ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $css_c; ?>bootstrap-rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $css_c; ?>/reg.css">
  </head>
  <body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-wrapper login">
        <h3 class="text-center form-title">اعادة تعين الرقم السري</h3>

        <!-- <div class="alert alert-danger">

          <li>
          </li>
        </div> -->

        <form action="reset_password.php" method="post">

          <div class="form-group">
            <label>الرقم السري</label>
            <input type="password" name="password" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label>اكد الرقم السري</label>
            <input type="password" name="passwordConf" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <button type="submit" name="reset-password-btn" class="btn btn-lg btn-block">اعادة تعين الرقم السري</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?php echo $js_c; ?>/jquery.min.js"></script>
  <script src="<?php echo $js_c; ?>/bootstrap.min.js"></script>
  <script src="<?php echo $js_c; ?>/main.js"></script>

</body>

</html>

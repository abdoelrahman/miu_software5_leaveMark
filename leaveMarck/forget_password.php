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
    <link href="<?php echo $css_c; ?>/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $css_c; ?>/bootstrap-rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $css_c; ?>/reg.css">
  </head>
  <body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-wrapper login">
        <h3 class="text-center form-title">استعادة كلمة المرور</h3>

        <!-- <div class="alert alert-danger">

          <li>
          </li>
        </div> -->
        <form action="forget_password.php" method="post">
          <p>من فضلك اكتب اللبريد الالكتروني الذي استخدمته في تسجيل حسابك سوف نساعدك في استعادة كلمة مرورك</p>

          <div class="form-group">

            <input type="text" name="email" class="form-control form-control-lg" >
          </div>

          <div class="form-group">
            <button type="submit" name="forget-password" class="btn btn-lg btn-block">استعادة كلمة المرور</button>
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

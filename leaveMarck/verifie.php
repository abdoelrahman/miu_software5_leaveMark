<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyEmail($token);
}
// verify user password
if (isset($_GET['password-token'])) {
    $passwordToken = $_GET['password-token'];
    resetPassword($passwordToken);
}

// redirect user to login page if they're not logged in
if (empty($_SESSION['email'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="ar">
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
      <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 home-wrapper">

        <?php if (isset($_SESSION['message'])): ?>
        <div class="alert <?php echo $_SESSION['type'] ?>">
          <?php
echo $_SESSION['message'];
unset($_SESSION['message']);
unset($_SESSION['type']);
?>
        </div>
        <?php endif;?>

        <h4>Welcome,
          <?php echo $_SESSION['username']; ?>
        </h4>
        <a href="logout.php" style="color: red">تسجيل الخروج</a>
        <?php if (!$_SESSION['verified']): ?>
        <div class="alert alert-warning alert-dismissible " role="alert">
          <p> تحتاج الي تأكيد انك تمتلك الايميل الالكتروني</p>
          <strong><?php echo $_SESSION['email']; ?></strong>
          <p>لقد قمنا بأرسال لينك علي هذا الايميل  .</p>
        </div>
        <?php else: ?>
        <button class="btn btn-lg btn-primary btn-block">I'm verified!!!</button>
        <?php endif;?>
      </div>
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

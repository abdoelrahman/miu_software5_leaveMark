<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>اترك اثر</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="<?php echo $css_ca; ?>bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $css_ca; ?>bootstrap-rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $css_ca; ?>header.css">
  <link rel="stylesheet" href="<?php echo $css_ca; ?>profile.css">
</head>

<body>
  <div class="container">
    <!-- /////////////nav -->
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

  <div class="admin-wrapper clearfix">

    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

    <!-- Admin Content -->
    <div class="admin-content clearfix">
      <div class="">
        <h2 style="text-align: center;"> عدل </h2>
        <?php include(ROOT_PATH ."/app/helpers/formErrors.php") ?>
        <form action="edit.php" method="post" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $id; ?>"name="id" >
          <div class="input-group">
            <label>الاسم</label>
            <input type="text" value="<?php echo $username; ?>"name="username" class="text-input">
          </div>
          <div class="input-group">
            <label>البريد الالكتروني</label>
            <input value="<?php echo $email ?>" type="email" name="email" class="text-input">
          </div>
          <div class="input-group">
            <label>رقم الهاتف </label>
            <input value="<?php echo $phone_num ?>" type="phone_num" name="phone_num" class="text-input">
          </div>
          <div class="input-group">
            <label>الصور</label>
            <input type="file" name="user_image" value="<?php echo $image; ?>"class="text-input">
          </div>
          <div class="input-group">
            <label>الرقم السري</label>
            <input type="password" name="password" class="text-input">
          </div>
          <div class="input-group">
            <label>اكد الرقم السري</label>
            <input type="password" name="passwordConf" class="text-input">
          </div>
          <div class="input-group">
            <button type="submit" name="update_user" class="btn">عدل </button>
          </div>
        </form>

      </div>
    </div>
    <!-- // Admin Content -->


  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- CKEditor 5 -->
  <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

  <!-- Custome Scripts -->
  <script src="../../assets/js/scripts.js"></script>

</body>

</html>

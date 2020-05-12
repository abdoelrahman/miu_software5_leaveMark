<?php include("../path.php"); ?>
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
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/bootstrap-rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/header.css">
  <link rel="stylesheet" href="../assets/css/profile.css">
</head>

<body>

  <div class="container">
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <div class="admin-wrapper clearfix">
      <?php include( ROOT_PATH . "/app/includes/messages.php"); ?>  

      <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>


      <!-- Admin Content -->
      <div class="admin-content clearfix">

        <div class="">
          <h2 style="text-align: center;"> لوحت القياده للمشرفين.</h2>





        </div>
      </div>
      <!-- // Admin Content -->
    </div>

  </div>

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- CKEditor 5 -->
  <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

  <!-- Custome Scripts -->
  <script src="../assets/js/scripts.js"></script>

</body>

</html>

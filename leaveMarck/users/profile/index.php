<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");

if (isset($_GET['u_name'])) {
  $user = selectOne('users',['id'=> $_GET['u_']]);
}else {
  $user =$_SESSION;
}
?>
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
      <!-- Left Sidebar -->
      <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
      <!-- // Left Sidebar -->

      <!-- Admin Content -->
      <!------ Include the above in your HEAD tag ---------->

      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">


            <div class="panel panel-info">
              <?php include(ROOT_PATH ."/app/includes/messages.php") ?>
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $username; ?></h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo BASE_URL.'/assets/img/'.$user_image ; ?>" class="img-circle img-responsive"> </div>
                  <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                      <tbody>
                        <tr>
                          <td>البريد الالكتروني</td>
                          <td><a href=""><?php echo $email; ?></a></td>
                        </tr>
                        <td>رقم الهاتف</td>
                        <td><?php echo $phone_num; ?>
                        </td>
                        </tr>
                        <tr>
                          <td>تقيم </td>
                          <td>
                            <div class="stars">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span> </div>
                          </td>
                        </tr>

                      </tbody>
                    </table>
                    <?php if ($_SESSION && $_SESSION['id'] == $user['id']):?>
                    <a href="<?php echo BASE_URL . 'users/profile/edit.php?id=' .$_SESSION['id']; ?>" class="btn btn-primary">نعديل</a>

                  </div>
                </div>
              </div>
              <div class="panel-footer">
                <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary" href="../message/index.html"><i class="glyphicon glyphicon-envelope"></i></a>

              </div>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>



    </div>



    <!-- JQuery -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo $js_ca; ?>bootstrap.min.js"></script>
    <script src="<?php echo $js_ca; ?>main.js"></script>

</body>

</html>

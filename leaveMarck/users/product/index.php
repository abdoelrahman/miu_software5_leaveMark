<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/products.php");
$user_products=selectAll($table,['user_id'=> $_SESSION['id']]);
if (isset($_GET['p_id'])) {
  $user = selectAll('users',['id'=> $_GET['p_id']]);
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

    <div class="container">
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <div class="admin-wrapper clearfix">

      <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
      <!-- Admin Content -->
      <div class="admin-content clearfix">
        <div class="row">
          <div class="col-xs-10">
            <div class="button-group">
              <a href="create.php" class="btn btn-sm">اضافة معروض</a>

              <hr>
              <?php include(ROOT_PATH ."/app/includes/messages.php") ?>
            </div>
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="panel-title">
                  <div class="row">
                    <div class="col-xs-6">
                      <h5> المنشورات</h5>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel-body">

                <?php foreach ($user_products as $key => $product): ?>
                  <div class="row">
                    <div class="col-xs-3"><img class="img-responsive" src="<?php echo BASE_URL.'/assets/img/'.$product['image']; ?>">
                    </div>
                    <div class="col-xs-5">
                      <h4 class="product-name"><strong><?php echo $product['title']; ?></strong></h4>
                      <h4><small><?php echo html_entity_decode(substr($product['description'],0,100)."....") ; ?></small></h4>
                      <i class="fa fa-calendar"></i> <?php echo date('F j. Y',strtotime($product['created_at'])) ; ?>
                    </div>
                    <div class="col-xs-4">
                      <div class="col-xs-4 text-right">
                      <a href="edit.php?id=<?php echo $product['id'];?>" class="edit">عدل</a>
                    </div>
                      <div class="col-xs-4">
                        <a href="index.php?delete_id=<?php echo $product['id'];?>" class="delete"> <span class="glyphicon glyphicon-trash"> </span>  </a>
                      </div>
                      <div class="col-xs-4">
                        <?php if ($product['published']): ?>
                          <td><a href="edit.php?published=0&p_id=<?php echo $product['id']; ?>" class="unpublish">الفاء النشر</a></td>

                        <?php else: ?>
                           <td><a href="edit.php?published=1&p_id=<?php echo $product['id']; ?>" class="publish">انشر</a></td>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <hr>
                <?php endforeach; ?>

                <div class="row">
                  <div class="text-center">
                    <div class="col-xs-9">
                    </div>
                    <div class="col-xs-3">
                      <a href="create.php">
                        <button type="button"  class="btn btn-default btn-sm btn-block">
                          اضاقة معروض
                        </button>
                      </a>

                    </div>
                  </div>
                </div>
              </div>
            </div>
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

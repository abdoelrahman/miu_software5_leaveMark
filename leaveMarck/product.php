<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/products.php");
if (isset($_GET['p_id'])) {
  $product = selectOne('products',['id'=> $_GET['p_id']]);
  $publiser = selectOne('users',['id'=>$product['user_id']]);

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
  <link href="<?php echo $css_c; ?>bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $css_c; ?>bootstrap-rtl.min.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo $css_c; ?>/header.css">
  <link rel="stylesheet" href="<?php echo $css_c; ?>/product.css">
</head>

<body>
  <div class="container">

    <!-- /////////////////////nav -->
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <!-- /////////////////////nav -->
    <div class="container">
      <div class="card">
        <div class="container-fliud">
          <div class="wrapper row">
            <div class="preview col-md-6">

              <div class="preview-pic tab-content">
                  <div class="tab-pane active" id="pic-1"><img src="<?php echo BASE_URL.'/assets/img/'.$product['image']; ?>" /></div>


                </div>

            </div>
            <div class="details col-md-6">
              <h3 class="product-title"><?php echo $product['title']; ?></h3>
              <div class="list-inline-item"><a href="<?php echo BASE_URL .'/users/profile/index.php?id='.$publiser['id']; ?>"><i class="	glyphicon glyphicon-user"></i> <?php echo $publiser['username']; ?></a><div>
              <div class="rating">
                <div class="stars">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
                <span class="review-no">41 مراجعة</span>
              </div>

              <p class="product-description"> <?php echo $product['description']; ?></p>
              <h4 class="price">رقم الهاتف: <span><?php echo $publiser['phone_num']; ?></span></div>
              <h4 class="price">البريد الالكتروني للناشر: <span><?php echo $publiser['email']; ?></span></div>
              <div class="list-inline-item"><i class="fa fa-clock-o"></i> <?php echo date('F j. Y',strtotime($product['created_at'])) ; ?></div>
                <hr>
              <div class="action">
                <a href="<?php echo BASE_URL .'/users/profile/index.php?u_id='.$publiser['id']; ?>"><button class="add-to-cart btn btn-default" type="button">مراسلة الناشر</button></a>
                <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>



    <div class="footer-bottom">
      <p>© Coding Poets | Designed by miu software5</p>
    </div>
  </div>
  <!-- // FOOTER -->



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?php echo $js_c; ?>/jquery.min.js"></script>
  <script src="<?php echo $js_c; ?>/bootstrap.min.js"></script>
  <script src="<?php echo $js_c; ?>/main.js"></script>

  </body>

  </html>

<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/sections.php");

$section_products =array();
if (isset($_POST['search-term'])) {
  // dd($_POST);
  $postTitle ='you search for "'.$_POST['search-term'] .'"';
  $section_products = searchPosts($_POST['search-term']);
}else {

  $section_products =getPublishedSectionProuducts();

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
  <link rel="stylesheet" href="<?php echo $css_c; ?>/sections.css">
  <link rel="stylesheet" href="<?php echo $css_c; ?>/footer.css">

</head>

<body>
  <div class="container">

    <!-- /////////////////////nav -->
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <!-- /////////////////////nav -->
    <!-- /////////search -->

    <!--end of col-->
    <header class="jumbotron my-4">
      <h1 class="display-3"><?php echo $name; ?></h1>
      <p class="lead"><?php echo $description; ?></p>
      <?php if (!$_SESSION): ?>
        <a href="signup.php" class="btn btn-primary btn-md  "style=" background-color: #ff9f1a;">سجل الان</a>
      <?php endif; ?>

      <div class="container h-100">

      </div>
    </header>
    <div class="container">
      <div class="search">

          <form action="sections.php" method="post">
            <button type="submit"name="search-term" class="btn bt btn-primary btn-sm">البحث</button>
            <input type="text" name="search-term" class="text-input" placeholder="Search...">

          </form>
        </div>
      <!-- <div class="row">
        <div class="">

          <input type="text" class="form-control input-sm" maxlength="64" placeholder="Search" />

        </div>
      </div> -->
    </div>
    <hr>
    <div class="container">
        <?php foreach ($section_products as $key => $product): ?>
          <?php $u = selectOne('users',['username'=>$product['username']]) ?>
          <div class="row mb-4">
            <div class="col-md-4">
              <a href="product.php?p_id=<?php echo $product['id']; ?>">
                <div class="product border">
                  <div class="product-img">
                    <img src="<?php echo BASE_URL.'/assets/img/'.$product['image']; ?>">
                  </div>
                  <div class="product-block">
                    <h4><?php echo $product['title']; ?> </h4>
                      <li class="list-inline-item"><i class="	glyphicon glyphicon-user"></i><a href='<?php echo BASE_URL .'/users/profile/index.php?id='.$u ['id']; ?>'><?php echo $product['username']; ?></li>
                    <p><?php echo html_entity_decode(substr($product['description'],0,120)."....") ; ?></p>
                    <div class="rating-block">
                      <h5>تقيم الناشر</h5>
                      <h4 class="bold padding-bottom-7">4.3 <small>/ 5</small></h4>

                    </div>
                    <ul class="list-inline ">
                      <li class="list-inline-item"><i class="fa fa-clock-o"></i> <?php echo date('F j. Y',strtotime($product['created_at'])) ; ?></li>
                    </ul>
                  </div>
                  <div class="product-footer">
                    <div class="row">
                      <div class="col-md-6">
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
        <?php endforeach; ?>
      <hr>
    </div>
  </div>
  </div>
  </div>

  </div>
  </section>




  <!-- //////////////////pager -->
  <hr>
  <ul class="pager">
    <li><a href="#">Previous</a></li>
    <li><a href="#">Next</a></li>
  </ul>
  <hr><hr>



  </div>
  </div>
  </section>

  <!-- Page Features -->

  </div>

  <!-- footer////////////////// --> -->
  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?php echo $js_c; ?>/jquery.min.js"></script>
  <script src="<?php echo $js_c; ?>/bootstrap.min.js"></script>
  <script src="<?php echo $js_c; ?>/main.js"></script>

</body>

</html>

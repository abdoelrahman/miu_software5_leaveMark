<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/sections.php");
$products =array();
$products =getPublishedProuducts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>اترك اثر</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link href="<?php echo $css_c; ?>bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $css_c; ?>bootstrap-rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $css_c; ?>header.css">
  <link rel="stylesheet" href="<?php echo $css_c; ?>main.css">
  <link rel="stylesheet" href="<?php echo $css_c; ?>footer.css">
</head>

<body>

  <div class="navbar-wrapper">

    <div class="container ">
      <!-- /////////////nav -->
      <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
      <?php include(ROOT_PATH ."/app/includes/messages.php") ?>
      <div id="myCarousel" class="carousel slide" style="margin-bottom: 60px;" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" style="  height: 500px;  background-color: #777;">
          <div class="item ">
            <img src="assets/img/image_1.png" alt="Chania">
            <div class="carousel-caption">
              <div class="col-md-12 text-center">

              </div>
            </div>
          </div>

          <div class="item active" style="  height: 500px;  background-color: #777;">
            <img src="assets/img/image_3.png" alt="">
            <div class="carousel-caption">
              <div class="col-md-12 text-center">
                <h2>
                  <span class="wh">اهلا بك في  <strong>اترك اثر</strong></span>
                </h2>
                <br>
                <h3>
                  <span class="wh">معا لتحقيق اكثر استفاده ...... انضم الينا </span>
                </h3>
                <br>
                <?php if(!isset($_SESSION['id'])): ?>
                  <div class="">
                    <a class="btn btn-theme btn-sm btn-min-block" href="login.php">تسجيل دخول</a><a class="btn btn-theme btn-sm btn-min-block" href="signup.php">تسجسل حساب</a>
                  </div>
                <?php endif; ?>
                  <hr>

              </div>

              <hr>
            </div>
          </div>

          <div class="item" style="  height: 500px;  background-color: #777;">
            <img src="assets/img/image_2.png" alt="">
            <div class="carousel-caption">
              <div class="col-md-12 text-center">
                <h2>
                  <span class="wh">لا تجعل خجلك يحرمك من متعــة مساعدة الآخريــن .. عندما تقرر لا تفكــر</span>
                </h2>
                <h1 style="padding-bottom:70px;"> # العطاء__ ثراء</h1>
              </div>
            </div>
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <!-- consal/////////////////////////////////////// -->
      <div class="container">
        <h1 class="text-center" style="color:#666;">الاقسام</h1>
        <div class="row">
          <?php foreach ($sections as $key => $section): ?>
            <div class="col-12 col-sm-6 col-md-4 image-grid-item">
              <div style="background-image: url(<?php echo BASE_URL.'/assets/img/'.$section['image_section']; ?>	);" class="image-grid-cover">
                <a href="sections.php?id=<?php echo $section['id']; ?>" class="image-grid-clickbox"></a>
                <a href="sections.php?id=<?php echo $section['id']; ?>"class="cover-wrapper"><?php echo $section['name']; ?></a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>




      <!-- ///////////////////////////////////// -->

      <!-- /////////////////////////////////////// post-->
      <div class="page-header">
        <h1 style="color:#666;text-align: center;">اخر المنشورات</h1>
      </div>
      <div class=" mar">
        <div class="row ls">
          <div class="col-xs-12 col-md-12 col-centered ">

            <div id="carousel" class="carousel slide " data-ride="carousel" data-type="multi" data-interval="2500">
              <div class="carousel-inner ls">
                <?php foreach ($products as $key => $product): ?>
                    <div class="item <?php if ($key ==0 ||$key ==3 ||$key == 4): ?>
                      <?php echo 'active'; ?>
                    <?php endif; ?>">
                      <div class="carousel-col">
                        <?php $u = selectOne('users',['username'=>$product['username']]) ?>
                        <div class="block yellow img-responsive"><img class="logo" src="<?php echo BASE_URL.'/assets/img/'.$product['image']; ?>" style="width:100%;height:100%;"></div>
                        <h4 class="card-title"><?php echo $product['title']; ?> </h4>
                        <i class="	glyphicon glyphicon-user"></i><a href='<?php echo BASE_URL .'/users/profile/index.php?id='.$u['id']; ?>'><?php echo $product['username']; ?></a>
                        <p class="card-text"><?php echo html_entity_decode(substr($product['description'],0,20)."....") ; ?> </p>
                        <p class="card-text"><i class="fa fa-clock-o"></i><small class="text-muted"><?php echo date('F j. Y',strtotime($product['created_at'])) ; ?></small></p>
                        <button type="button" class="btn btn-default btn-disable"><a href='product.php?p_id=<?php echo $product['id']; ?>'>عرض</a></button>
                      </div>
                    </div>
                <?php endforeach; ?>
              </div>
              <!-- Controls -->
              <div class="left carousel-control">
                <a href="#carousel" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
              </div>
              <div class="right carousel-control">
                <a href="#carousel" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>

          </div>

          <!-- ////////////////////////////////////////////////////////////////////////// -->
          <div class="counter" style="background-image: url(assets/img/c0.jpg); background-repeat: no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
            <div class="page-header ">
              <h1 style="color:#666;text-align: center;">احصاءيات الموقع</h1>
            </div>
            <div class="container mar">

              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="employees ">

                    <p class="counter-count ">80</p>
                    <p class="employee-p">المستخدمين</p>
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="customer">
                    <p class="counter-count">90</p>
                    <p class="customer-p">المعروضات</p>
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="design">
                    <p class="counter-count">10</p>
                    <p class="design-p">الزيارات</p>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

        <hr>
        <hr>
      </div>
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

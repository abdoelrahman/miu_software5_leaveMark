<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/products.php");?>

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
      <div class="button-group">
        <a href="create.php" class="btn btn-sm">اضافة مستخدم</a>
      </div>
      <div class="">
        <h2 style="text-align: center;">اضافة معروض</h2>
        <?php include( ROOT_PATH . "/app/helpers/formErrors.php"); ?>

        <form action="create.php" method="post" enctype="multipart/form-data">
          <div class="input-group">
            <label>العنون</label>
            <input type="text" name="title" value="<?php echo $title; ?>"class="text-input">
          </div>
          <div class="input-group">
            <label>الوسف</label>
            <textarea class="text-input" name="description" id="body"><?php echo $description; ?></textarea>
          </div>
          <div class="input-group">
            <label>الصور</label>
            <input type="file" name="image" class="text-input">
          </div>
          <div class="input-group">
            <label>الاقسام</label>
            <select class="text-input" name="section_id">
              <option value=""></option>
              <?php foreach ($sections as $key => $section): ?>
                <?php if (!empty(topic_id) && $section_id==$section['id']): ?>

                    <option selected value="<?php echo $section['id'];?>"><?php echo $section['name'];?></option>
                <?php else: ?>
                    <option value="<?php echo $section['id'];?>"><?php echo $section['name'];?></option>
                <?php endif; ?>


              <?php endforeach; ?>
            </select>
          </div>
          <div class="input-group">
            <?php if (empty($published)): ?>
              <label>
                <input type="checkbox" name="published" />الحاله من النشر
              </label>
            <?php else: ?>
              <label>
                <input checked type="checkbox" name="published" /> الحاله من النشر
              </label>

            <?php endif; ?>

          </div>
          <div class="input-group">
            <button type="submit" name="add-product" class="btn">احفظ المعروض</button>
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

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

    <!-- // header -->


  <div class="admin-wrapper clearfix">

    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
      <!-- Admin Content -->
    <div class="admin-content clearfix">
      <div class="button-group">
        <a href="create.php" class="btn btn-sm"> اضافه معروض</a>

      </div>
      <div class="">
        <h2 style="text-align: center;">المعروضات</h2>
        <?php include(ROOT_PATH ."/app/includes/messages.php") ?>
        <table>
          <thead>
            <th>N</th>
            <th>العنوان</th>
            <th colspan="3">Action</th>
          </thead>
          <tbody>
            <?php foreach ($products as $key => $product): ?>
              <tr class="rec">
                <td><?php echo $key+1?></td>
                <td><?php echo $product['title']; ?></td>
                <td><a href="edit.php?id=<?php echo $product['id'];?>" class="edit">عدل</a></td>
                <td><a href="edit.php?delete_id=<?php echo $product['id'];?>" class="delete">  امسح  </a></td>
                <?php if ($product['published']): ?>
                  <td><a href="edit.php?published=0&p_id=<?php echo $product['id']; ?>" class="unpublish">الفاء النشر</a></td>

                <?php else: ?>
                   <td><a href="edit.php?published=1&p_id=<?php echo $product['id']; ?>" class="publish">انشر</a></td>
                <?php endif; ?>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>

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

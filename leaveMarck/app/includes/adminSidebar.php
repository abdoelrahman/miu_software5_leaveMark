
    <?php if ($_SESSION): ?>
      <div class="admin-wrapper clearfix">
        <!-- Left Sidebar -->
        <div class="left-sidebar">
          <ul>

            <li><a href="<?php echo BASE_URL.'users/profile/index.php?id='.$_SESSION['id']; ?>">الصقحه الشخصيه</a></li>
            <li><a href=<?php echo BASE_URL . 'users/message/index.php'; ?>>الرسأل</a></li>
            <li><a href=<?php echo  BASE_URL. 'users/product/index.php'; ?>>منشوراتي</a></li>
            <?php if ($_SESSION['admin']): ?>
            <li><a href=<?php echo BASE_URL . 'admin/products/index.php'; ?>> عجل المعروضات</a></li>
            <li><a href=<?php echo BASE_URL . 'admin/sections/index.php';?>>عدل الاقسام</a></li>
            <li><a href=<?php echo BASE_URL . 'admin/users/index.php';?>>عدل المستخدمين</a></li>
            <?php endif; ?>
          </ul>
        </div>


    <?php endif; ?>

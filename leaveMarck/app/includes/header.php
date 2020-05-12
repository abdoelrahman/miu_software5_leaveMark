
<nav class="navbar navbar-inverse navbar-static-top">

  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo BASE_URL.'index.php' ?>"><img class="logo" src="<?php echo BASE_URL.'assets/img/logo.PNG'; ?>" style="padding: 0 10px 0 0; width:50px;length:60px; display: flex;" alt=""></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo BASE_URL.'index.php' ?>">اترك اثر</a></li>
        <?php if(isset($_SESSION['id'])): ?>
        <li class="dropdown">
          <a href="<?php echo BASE_URL.'users/profile/index.php?id='.$_SESSION['id']; ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">الصفحه الشخصيه <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo BASE_URL.'users/profile/index.php?id='.$_SESSION['id']; ?>"><?php echo $_SESSION['username']; ?></a></li>
            <li><a href="<?php echo BASE_URL.'users/messages/index.php?id='.$_SESSION['id']; ?>">الرسأل</a></li>
            <li><a href="<?php echo BASE_URL.'users/product/index.php?id='.$_SESSION['id']; ?>">المنشوراتي</a></li>
          </ul>
        </li>
        <?php endif; ?>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">الاقسام <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <?php foreach($sections as $key =>$section): ?>
              <li><a href=<?php echo BASE_URL."sections.php?id=" . $section['id']; ?>><?php echo $section['name']; ?></a></li>
              <?php endforeach; ?>
          </ul>
        </li>
        <li><a href="<?php echo BASE_URL.'aboutus.php' ?>">عن اترك اثر</a></li>
        <li><a href="<?php echo BASE_URL . '/logout.php'; ?>">
            <span class="glyphicon glyphicon-log-out pull-lift"></span> تسجيل الخروج
          </a></li>
      </ul>

    </div>
  </div>
</nav>
<!-- ///carousel -->

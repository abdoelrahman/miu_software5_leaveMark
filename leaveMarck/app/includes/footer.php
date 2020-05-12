<div class="footer">
  <div class="footer-content">
    <div class="footer-section about ">
      <h1 class="logo-text"><span>اترك</span> اثر</h1>
      <p>موقعنا هوا موقع غير هادف للربح الغرد منه تسهيل تقديم المساعدة إلى الشخص الذي يحتاج حقًا إلى المساعدة ، وسيوفر موقعنا الإلكتروني هذه العملية بأسهل الطرق وأفضلها تنظيمًا.</p>
      <div class="contact">
        <i class="fa fa-phone"> &nbsp; 123-456-789</i>
        <i class="fa fa-envelope"> &nbsp; abdo55mohamed1@gmail.com</i>
      </div>

      <div class="social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-youtube-play"></i></a>
      </div>

    </div>

    <div class="footer-section quick-links">
      <h2>الاقسام </h2>
      <ul>
        <?php foreach($sections as $key =>$section): ?>
          <a href="<?php echo "sections.php?id=" . $section['id']; ?>><?php echo $section['name']; ?>">
            <li><?php echo $section['name']; ?> </li>
          </a>
          <?php endforeach; ?>
      </ul>
    </div>

    <div class="footer-section contact-form-div">
      <h2>اتصل بنا</h2>
      <br>
      <form action="index.php" method="post">
        <input type="text" name="email-address" class="text-input contact-input" placeholder="Your email address">
        <textarea name="message" cols="30" rows="3" class="text-input contact-input" placeholder="Message..."></textarea>
        <button type="submit" name="send-msg-btn" class="send-msg-btn">
          <i class="fa fa-send"></i> ارسال
        </button>
      </form>
    </div>

  </div>

  <div class="footer-bottom">
    <p>© Coding Poets | Designed by miu software5</p>
  </div>
</div>
<!-- // FOOTER -->

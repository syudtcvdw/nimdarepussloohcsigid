
  <footer class="footer">
    <p> Copyright ©2017. Victor I. Afolabi. All rights reserved.</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write("<script src='<?= ASSET_PATH . 'js/jquery.min.js'; ?>''><\/script>")</script>
  <script src="<?= ASSET_PATH . 'js/tether.min.js'; ?>"></script>
  <script src="<?= ASSET_PATH . 'js/bootstrap.min.js'; ?>"></script>
  <?php
  if ( isset($this->js) )
    foreach ($this->js as $js)
      echo '<script src="' . PROJECT_PATH . 'app/views/' . $js .'"></script >';
  ?>

</body>
</html>
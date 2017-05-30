
  <footer class="footer">
    <p> Copyright ©2017. Victor I. Afolabi. All rights reserved.</p>
  </footer>

  <script src="<?= ASSET_PATH . 'js/bootstrap.min.js'; ?>"></script>
  <?php
  if ( isset($this->js) )
    foreach ($this->js as $js)
      echo '<script src="' . PROJECT_PATH . 'app/views/' . $js .'"></script >';
  ?>

</body>
</html>
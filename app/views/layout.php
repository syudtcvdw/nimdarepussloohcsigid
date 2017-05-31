<?php require_once $this->header; ?>
<?php if ( isset($this->sidebar) ) require_once $this->sidebar; ?>
  <div class="container">

    <?php require_once $viewFile;  ?>

  </div>
<?php require_once $this->footer; ?>
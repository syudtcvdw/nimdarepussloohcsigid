<?php require_once $this->header; ?>
    <div class="wrapper">

        <div class="left  transition col-md-3 col-sm-3 slide-in-sidebar">
            <?php require_once $this->sidebar; ?>
        </div>

        <div class="right col-md-9 col-sm-9 col-xs-12">
            <?php require_once $viewFile; ?>
        </div>

    </div>
<?php require_once $this->footer; ?>
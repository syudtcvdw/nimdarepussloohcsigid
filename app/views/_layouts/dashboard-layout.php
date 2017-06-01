<?php require_once $this->header; ?>
    <div class="wrapper">

<div class="left transition">
            <?php require_once $this->sidebar; ?>
        </div>

        <div class="right">
                     <div class="content">
                            <nav class=' nav navbar right-nav override-nav'>
                       <div class="container-fluid  center-things">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            
                            <button type="button" class="navbar-toggle showSidebar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="/"><?= $this->title ?></a>
                        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="my-navbar">
                           </div>
                   </div>
               </nav>
               
            <?php require_once $viewFile; ?>
        </div>              
</div>
<?php require_once $this->footer; ?>


<div class="login-wrapper">
    <div class="container-fluid">
        <div class="col-md-offset-4 col-lg-4 col-sm-4 col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3> Admin Login </h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" autocomplete="off">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email Address" value="<?= _preserveInputs('email'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" value="<?=
                            _preserveInputs('password'); ?>" required>
                        </div>
                        <div class="checkbox">
                            <label> <input type="checkbox"> Remember me </label>
                        </div>
                        <? if ( isset($this->notice) ): ?>
                            <p class="text-danger notice"><?= $this->notice; ?></p>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
  <p>Digischools <?= date("© Y"); ?>. All rights reserved.</p>
</footer>
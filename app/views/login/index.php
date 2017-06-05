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
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i> </span>
                                <input type="email" class="form-control" id="email" name="useremail" placeholder="Enter your Email Address" value="<?= _preserveInputs('useremail'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i> </span>
                                <input type="password" class="form-control" id="password" name="userpass" placeholder="Enter Your Password" value="<?=
                            _preserveInputs('userpass'); ?>" required>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember"> Remember Me</label>
                        </div>
                        <? if ( isset($this->notice) ): ?>
                            <p class="text-danger notice">
                                <?= $this->notice; ?>
                            </p>
                            <?php endif; ?>
                            <div class="form-group btn-s">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <p>Digischools
        <?= date("© Y"); ?>. All rights reserved.</p>
</footer>

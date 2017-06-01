<div class="login-wrapper">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3> Admin Login </h3>
    </div>
    <div class="panel-body">
      <form action="" method="POST">
        <div class="form-group">
          <label for="useremail">Email address</label>
          <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Email" value="<?= _preserveInputs('useremail'); ?>">
        </div>
        <div class="form-group">
          <label for="userpass">Password</label>
          <input type="password" class="form-control" id="userpass" name="userpass" placeholder="Password" value="<?=
_preserveInputs('userpass'); ?>">
        </div>
        <div class="checkbox">
          <label> <input type="checkbox" name="remember" <?= _preserveCheckBox('remember'); ?>> Remember me
          </label>
        </div>
        <? if ( isset($this->notice) ): ?>
          <p class="text-danger notice"><?= $this->notice; ?></p>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>
</div>

<footer class="footer">
  <p>Digischools <?= date("© Y"); ?>. All rights reserved.</p>
</footer>
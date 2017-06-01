<div class="login-wrapper">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3> Admin Login </h3>
    </div>
    <div class="panel-body">
      <form action="" method="POST">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= preserveInputs('email'); ?>" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?=
preserveInputs('password'); ?>" required>
        </div>
        <div class="checkbox">
          <label> <input type="checkbox"> Remember me </label>
        </div>
        <? if ( isset($this->status) ): ?>
          <p class="text-danger notice"><?= $this->status; ?></p>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>
</div>

<footer class="footer">
  <p>Digischools <?= date("© Y"); ?>. All rights reserved.</p>
</footer>
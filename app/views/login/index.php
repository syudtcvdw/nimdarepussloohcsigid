<form action="" method="POST">
  <ul>
    <li>
      <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= preserveInputs('email'); ?>" required>
    </li>
    <li>
      <label for="password">Password</label>
      <input type="password" name="password" id="password" value="<?= preserveInputs('password'); ?>" required>
    </li>
    <li>
      <input type="submit" value="Login">
    </li>
  </ul>
  <?php if( isset($this->status) ): ?>
    <p class="error"><?= $this->status; ?></p>
  <?php endif; ?>
</form>
<form action="" method="POST">
  <ul>
    <li>
      <label for="fullname">Fullname</label>
      <input type="text" name="fullname" id="fullname" value="<?= preserveInputs('fullname'); ?>">
    </li>
    <li>
      <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= preserveInputs('email'); ?>">
    </li>
    <li>
      <label for="password">Password</label>
      <input type="password" name="password" id="password" value="<?= preserveInputs('password'); ?>">
    </li>
  </ul>
</form>
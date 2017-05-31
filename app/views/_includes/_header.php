<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> <?= isset($this->title) ? $this->title . " &bull; MVC Boiler Plate" : "MVC Boiler Plate"; ?> </title>
  <link rel="stylesheet" href="<?= ASSET_PATH . 'css/bootstrap.min.css'; ?>">
  <link rel="stylesheet" href="<?= ASSET_PATH . 'css/bootstrap-reboot.min.css'; ?>">
  <link rel="stylesheet" href="<?= ASSET_PATH . 'css/bootstrap-grid.min.css'; ?>">
  <link rel="stylesheet" href="<?= ASSET_PATH . 'css/style.css'; ?>">
</head>
<body>

<header>
  <nav>
    <ul>
      <li> <a href="<?= PROJECT_PATH; ?>">Home</a> </li>
      <li> <a href="<?= PROJECT_PATH; ?>about">About</a> </li>
      <?php if ( $this->loggedIn ): ?>
        <li> <a href="<?= PROJECT_PATH; ?>dashboard">Dashboard</a> </li>
        <li> <a href="<?= PROJECT_PATH; ?>logout"> Logout </a></li>
      <?php else: ?>
        <li> <a href="<?= PROJECT_PATH; ?>login">Login</a> </li>
        <li> <a href="<?= PROJECT_PATH; ?>register">Register</a> </li>
      <?php endif; ?>
    </ul>
  </nav>
</header>

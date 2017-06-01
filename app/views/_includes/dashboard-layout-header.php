<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> <?= isset($this->title) ? $this->title . " &bull; Digischools" : "Digischools"; ?> </title>
    <link rel="stylesheet" href="<?= ASSET_PATH . 'css/bootstrap.min.css'; ?>">
    <!--<link rel="stylesheet" href="<?= ASSET_PATH . 'css/bootstrap-reboot.min.css'; ?>">
    <link rel="stylesheet" href="<?= ASSET_PATH . 'css/bootstrap-grid.min.css'; ?>">-->
    <link rel="stylesheet" href="<?= ASSET_PATH . 'css/style.css'; ?>">
    <link rel="stylesheet" href="<?= ASSET_PATH . 'css/dashboard.css'; ?>">
    <?php
    if ( isset($this->css) )
        foreach ($this->css as $css)
            echo '<link rel="stylesheet" href="' . ASSET_PATH . 'css/' . $css .'.css">';
    ?>
</head>
<body>
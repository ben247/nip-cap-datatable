<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <ul id="menu">
    <li><a href="<?php echo url_for('/watersystem.php'); ?>">View Water Systems</a></li>
    <li><a href="<?php echo url_for('/staff/watersystems/index.php'); ?>">Login</a></li>
  </ul>
    
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php include("includes/init.php"); ?>
<?php include("includes/license.php"); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<?php include("includes/head.php"); ?>
<body>
  <?php include("includes/header.php"); ?>
  <div id="page">
    <div id="logo">
      <h1><?php echo $sec_title; ?>/</h1>
      <h2><?php echo $title; ?></h2>
    </div>
    <hr />
    <!-- end #logo -->
    <div id="content">
      <div class="post">
      <?php
        include($filename);
      ?>  
      </div>
    </div>
    <?php include("includes/sidebar.php"); ?>
    <div style="clear: both;">&nbsp;</div>
  </div>
<?php include("includes/footer.php"); ?>
</body>
</html>

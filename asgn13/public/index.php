<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); 
?>


  <ul>
    <li><a href="<?php echo url_for('birds/birds.php'); ?>">View Our Inventory</a></li>
    <li><a href="<?php echo url_for('/about.php'); ?>">About Us</a></li>
    <?php if ($session->logged_in_level('/members/') != false) { ?>
    <li><a href="<?php echo url_for('/members/index.php'); ?>">Members</a></li>
    <?php } ?>
  </ul>
    

<?php include(SHARED_PATH . '/public_footer.php'); ?>

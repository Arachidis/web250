<!doctype html>

<html lang="en">
  <head>
    <title>WNC Birds <?php if(isset($page_title)) { echo ' - ' . h($page_title); } ?></title>
    <meta charset="utf-8">
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo url_for('/index.php'); ?>">
          WNC Birds
        </a>
      </h1>
    </header>

    <navigation>
      <ul>
        <?php if($session->is_logged_in()) { ?>
        
        <li><a href="<?php echo url_for('/index.php'); ?>">Menu</a></li>
        <li><a href="<?php echo url_for('/logout.php'); ?>">Logout, <?= $session->username ?></a></li>
        <?php echo display_session_message(); ?>
        <?php } else { ?>
          <li><a href="<?php echo url_for('/login.php'); ?>">Log In</a></li>
          <li><a href="<?php echo url_for('/create_user.php'); ?>">Sign Up</a></li>
        <?php } ?>
      </ul>
    </navigation>

  

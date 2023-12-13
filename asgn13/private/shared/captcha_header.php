<?php
  if(!isset($page_title)) { $page_title = 'Create Account'; }
?>

<!doctype html>

<html lang="en">
<head>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <title>WNC Birds <?php if(isset($page_title)) { echo ' - ' . h($page_title); } ?></title>
  <meta charset="utf-8">
</head>

  <body>
    <header>
      <h1>WNC Birds Members</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/index.php'); ?>">Home</a></li>
        <li><a href="<?php echo url_for('/login.php'); ?>">Login</a></li>
      </ul>
    </navigation>


<?php

require_once('../../private/initialize.php');
if (require_login_access_level(getcwd()) == false) {
  redirect_to((url_for('/login.php')));
}
/* 
  Use the bicycles/staff/new.php file as a guide 
  so your file mimics the same functionality.
  Be sure to include the display_errors() function.
*/

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['bird'];
  $bird = new Bird($args);
  $result = $bird->save();
  
  if($result === true) {
    $new_id = $bird->id;
    $session->message('The bicycle was created successfully.');
    redirect_to(url_for('birds/show.php?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $bird = new Bird();
}

?>

<?php $page_title = 'Create bird'; ?>
  <a class="back-link" href="<?= url_for('birds/birds.php') ?>">&laquo; Back to List</a>

    <h1>Create bird</h1>

  <?= display_errors($bird->errors)?>
  <form action="<?= url_for('birds/new.php') ?>" method="post">

    <?php include('form_fields.php'); ?>
    <input type="submit" value="Create Bird" />

  </form>

<?php include(SHARED_PATH . '/public_footer.php'); ?>

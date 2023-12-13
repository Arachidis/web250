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
  $args = $_POST['member'];
  $member = new Member($args);
  $result = $member->save();
  
  if($result === true) {
    $new_id = $member->id;
    $session->message('The member was created successfully.');
    redirect_to(url_for('members/show.php?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $member = new Member();
}

?>

<?php $page_title = 'Create Member'; ?>
<?php include(SHARED_PATH . '/member_header.php'); ?>
  <a class="back-link" href="<?= url_for('members/index.php') ?>">&laquo; Back to List</a>

    <h1>Create a New Member</h1>

  <?= display_errors($member->errors)?>
  <form action="<?= url_for('members/new.php') ?>" method="post">

    <?php include('form_fields.php'); ?>
    <input type="submit" value="Create member">

  </form>

<?php include(SHARED_PATH . '/member_footer.php'); ?>

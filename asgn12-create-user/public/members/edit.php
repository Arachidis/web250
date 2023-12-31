<?php

require_once('../../private/initialize.php');
require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/members/index.php'));
}
$id = $_GET['id'];
$member = Member::find_by_id($id);
if($member == false) {
  redirect_to(url_for('/members/index.php'));
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['member'];
  $member->merge_attributes($args);
  $result = $member->save();

  if($result === true) {
    $session->message('The member was updated successfully.');
    redirect_to(url_for('/members/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit Member'; ?>
<?php include(SHARED_PATH . '/member_header.php'); ?>


  <a href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <h1>Edit Member</h1>

  <?php echo display_errors($member->errors); ?>

  <form action="<?php echo url_for('/members/edit.php?id=' . h(u($id))); ?>" method="post">
    <?php include('form_fields.php'); ?>
    <input type="submit" value="Edit member" />
  </form>



<?php include(SHARED_PATH . '/member_footer.php'); ?>

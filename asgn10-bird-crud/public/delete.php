<?php

require_once('../private/initialize.php');

/* 
  Use the bicycles/staff/delete.php file as a guide 
  so your file mimics the same functionality.
*/
if(!isset($_GET['id'])) {
  redirect_to(url_for('/birds.php'));
}
$id = $_GET['id'];
$bird = Bird::find_by_id($id);
if ($bird == false) {
  redirect_to((url_for('/birds.php')));
}

if(is_post_request()) {

  // Delete the bird
  $result = $bird->delete();
  $_SESSION['message'] = 'The bird was deleted successfully.';
  redirect_to(url_for('/birds.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Bird'; ?>
  <a href="<?= url_for('birds.php') ?>">&laquo; Back to List</a>
  <h1>Delete Bird</h1>
  <p>Are you sure you want to delete this bird?</p>
  <p ><?= ($bird->common_name) . " with an ID of " . $id . "?"?></p>

  <form action="<?= url_for('/delete.php?id=' . h(u($id))) ?>" method="post">
      <input type="submit" name="commit" value="Delete Bird" />
  </form>

<?php include(SHARED_PATH . '/public_footer.php'); ?>

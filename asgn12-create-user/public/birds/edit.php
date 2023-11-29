<?php 

require_once('../../private/initialize.php');

/* 
  Use the bicycles/staff/edit.php file as a guide 
  so your file mimics the same functionality.
  Be sure to include the display_errors() function.
*/

if(!isset($_GET['id'])) {
 // redirect_to(url_for('/birds.php'));
}
$id = $_GET['id'];
$bird = Bird::find_by_id($id);
if ($bird == false) {
 // redirect_to((url_for('/birds.php')));
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['bird'];
  $bird->merge_attributes($args);
  $result = $bird->save($args);

  if($result === true) {
    $session->message('The bird entry was updated successfully.');
    redirect_to(url_for('/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form
  $bird = Bird::find_by_id($id);
  if ($bird == false) {
    redirect_to((url_for('/birds.php')));
  }
}
?>


<?php $page_title = 'Edit Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

  <a href="<?= url_for('/birds.php') ?>">&laquo; Back to List</a>

  <h1>Edit Bird</h1>

  <?= display_errors($bird->errors) ?>
  <form action="<?= url_for('/edit.php?id=' . h(u($id))) ?>" method="post">
    <?php include('form_fields.php'); ?>
    <input type="submit" value="Edit Bird" />
  </form>

<?php include(SHARED_PATH . '/public_footer.php'); ?>

<?php require_once('../private/initialize.php'); ?>

<?php

$id = $_GET['id'] ?? false; // PHP > 7.0

$bird = Bird::find_by_id($id);

if(!$id) {
  redirect_to('birds.php');
}
/*
  Use the bicycles/staff/edit.php file as a guide 
  so your file mimics the same functionality.
*/

?>

<?php $page_title = 'Detail: ' . $bird->common_name; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

  <a href="<?php echo url_for("birds.php");?>">Back to Inventory</a>
  <dl>
    <dt>ID</dt>
    <dd><?php echo h($bird->id); ?></dd>
  </dl>
  <dl>
    <dt>Name</dt>
    <dd><?php echo h($bird->common_name); ?></dd>
  </dl>
  <dl>
    <dt>Habitat</dt>
    <dd><?php echo h($bird->habitat); ?></dd>
  </dl>
  <dl>
    <dt>Food</dt>
    <dd><?php echo h($bird->food); ?></dd>
  </dl>
  <dl>
    <dt>Conservation Level</dt>
    <dd><?php echo h($bird->conservation()); ?></dd>
  </dl>
  <dl>
    <dt>Backyard Tips</dt>
    <dd><?php echo h($bird->backyard_tips); ?></dd>
  </dl>

<?php include(SHARED_PATH . '/public_footer.php'); ?>



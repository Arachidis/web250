<?php require_once('../../private/initialize.php'); ?>
<?php if (require_login_access_level(getcwd()) == false) {
  redirect_to((url_for('/login.php')));
}?>
<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$member = Member::find_by_id($id);

?>

<?php $page_title = 'Show member: ' . h($member->full_name()); ?>
<?php include(SHARED_PATH . '/member_header.php'); ?>

  <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <h1>Member: <?php echo h($member->full_name()); ?></h1>
    <dl>
      <dt>First name</dt>
      <dd><?php echo h($member->first_name); ?></dd>
    </dl>
    <dl>
      <dt>Last name</dt>
      <dd><?php echo h($member->last_name); ?></dd>
    </dl>
    <dl>
      <dt>Email</dt>
      <dd><?php echo h($member->email); ?></dd>
    </dl>
    <dl>
      <dt>Username</dt>
      <dd><?php echo h($member->username); ?></dd>
    </dl>

    <?php include(SHARED_PATH . '/member_footer.php'); ?>

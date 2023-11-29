<?php 
  require_once('../../private/initialize.php');
  require_login(); ?>
<?php
  $page_title = 'Member List';
  include(SHARED_PATH . '/member_header.php');
  // Create a new member object that uses the find_all() method
  $members = Member::find_all();
?>

<h2>Members</h2>



<a href="<?= url_for("members/new.php")?>">Create New Member</a>

  <table border="1">
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Username</th>
      <th>Email</th>
      <th>User Level</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
    </tr>

<?php
      foreach($members as $member) { ?>
        <tr>
          <td><?= h($member->id) ?></td>
          <td><?= h($member->first_name) ?></td>
          <td><?= h($member->last_name) ?></td>
          <td><?= h($member->username) ?></td>
          <td><?= h($member->email) ?></td>
          <td><?= h($member->user_level) ?></td>
          <td><a href="<?= url_for("members/show.php?id=" . h(u($member->id))) ?>">View</a></td>
          <td><a href="<?= url_for("members/edit.php?id=" . h(u($member->id))) ?>">Edit</a></td>
          <td><a href="<?= url_for('members/delete.php?id=' . h(u($member->id))) ?>">Delete</a></td>
        </tr>
      <?php } ?>

    </table>

<?php include(SHARED_PATH . '/member_footer.php'); ?>

<?php 
  require_once('../../private/initialize.php');
  $page_title = 'Bird List';
  include(SHARED_PATH . '/public_header.php');
  if (!require_login_access_level(getcwd()) == false) {
  
?>

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

<a href="<?= url_for("birds/new.php")?>">Create New Bird</a>

  <table border="1">
    <tr>
      <th>Name</th>
      <th>Habitat</th>
      <th>Food</th>
      <th>Conservation</th>
      <th>Backyard Tips</th>
      <th>&nbsp;</th>
    </tr>

<?php

// Create a new bird object that uses the find_all() method
  $birds = Bird::find_all();
      foreach($birds as $bird) { ?>
        <tr>
          <td><?= h($bird->common_name) ?></td>
          <td><?= h($bird->habitat) ?></td>
          <td><?= h($bird->food) ?></td>
          <td><?= h($bird->conservation()) ?></td>
          <td><?= h($bird->backyard_tips) ?></td>
          <td><a href="detail.php?id=<?= $bird->id ?>">View</a></td>
          <td><a href="edit.php?id=<?= $bird->id ?>">Edit</a></td>
          <td><a href="<?= url_for('birds/delete.php?id=' . h(u($bird->id))) ?>">Delete</a></td>

        </tr>
      <?php } ?>

    </table>
    <?php }  else { ?>

    <h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

  <table border="1">
    <tr>
      <th>Name</th>
      <th>Habitat</th>
      <th>Food</th>
      <th>Conservation</th>
      <th>Backyard Tips</th>
    </tr>

<?php

// Create a new bird object that uses the find_all() method
  $birds = Bird::find_all();
      foreach($birds as $bird) { ?>
        <tr>
          <td><?= h($bird->common_name) ?></td>
          <td><?= h($bird->habitat) ?></td>
          <td><?= h($bird->food) ?></td>
          <td><?= h($bird->conservation()) ?></td>
          <td><?= h($bird->backyard_tips) ?></td>

        </tr>
      <?php } ?>

    </table>
<?php } ?>
    
<?php include(SHARED_PATH . '/public_footer.php'); ?>



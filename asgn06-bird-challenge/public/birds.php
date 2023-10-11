<?php 
  require_once('../private/initialize.php');
  $page_title = 'Sightings';
  include(SHARED_PATH . '/public_header.php');
?>

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

<table border="1">
  <tr>
    <th>Name</th>
    <th>Habitat</th>
    <th>Food</th>
    <th>Nest Placement</th>
    <th>Behavior</th>
    <th>Conservation Status</th>
    <th>Backyward Tips</th>
  </tr>
<?php

  $parser = new ParseCSV(PRIVATE_PATH . '/csv-files/wnc-birds.csv');
  $bird_array = $parser->parse();
  foreach($bird_array as $args) {
    $bird = new Bird($args);

?>
    <tr>
      <td><?= h($bird->common_name);?></td>
      <td><?= h($bird->habitat);?></td>
      <td><?= h($bird->food);?></td>
      <td><?= h($bird->nest_placement);?></td>
      <td><?= h($bird->behavior);?></td>
      <td><?= h($bird->conservation());?></td>
      <td><?= h($bird->backyard_tips);?></td>
    </tr>
    
<?php } ?>

  </table>
  
<?php include(SHARED_PATH . '/public_footer.php'); ?>

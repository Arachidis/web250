<?php

/* 
  Use the bicycles/staff/form_fields.php file as a guide 
  so your file mimics the same functionality.
 
*/

// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($bird)) {
  redirect_to(url_for('/birds.php'));
}
?>

<dl>
  <dt>Common Name</dt>
  <dd><input type="text" name="bird[common_name]" value="<?=h($bird->common_name)?>" /></dd>
</dl>

<dl>
  <dt>Habitat</dt>
  <dd><input type="text" name="bird[habitat]" value="<?=h($bird->habitat)?>" /></dd>
</dl>


<dl>
  <dt>Food</dt>
  <dd><input type="text" name="bird[food]" value="<?=h($bird->food)?>" /></dd>
</dl>
  
  <dl>
    <dt>Conservation Status</dt>
    <dd>
      <select name="bird[conservation_id]">
      <?php 

        // Creates an array of the CONSERVATION_OPTIONS constant. 
        $conservationOptions = Bird::getConservationOptions();?>
        <?php foreach($conservationOptions as $i => $conDesc) { ?>
          <option value="<?php 
            // Key is used for the value.
            echo $i; ?>"
            <?php if ($bird->conservation_id == $i) {echo 'selected'; }?>>
            <?php 
            // Displays the array value for the option text.
            echo $conDesc; ?>
          </option>
        <?php } ?>

      </select>
    </dd>
  </dl>
  <dl>

  <dt>Description</dt>
  <dd><textarea name="bird[backyard_tips]" rows="5" cols="50"><?=h($bird->backyard_tips)?></textarea></dd>
</dl>

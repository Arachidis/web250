<?php

class Bird {
  public $common_name;
  public $habitat;
  public $food;
  public $nest_placement;
  public $behavior;
  public $conservation_id;
  public $backyard_tips;

  protected const CONSERVATION_OPTIONS = array(1 => 'Low concern', 2 => 'Moderate concern', 3 => 'Extreme concern', 4 => 'Extinct'); 

 public function __construct($args=[]) {
  $this->common_name = $args['common_name'] ?? NULL;
  $this->habitat = $args['habitat'] ?? NULL;
  $this->food = $args['food'] ?? NULL;
  $this->nest_placement = $args['nest_placement'] ?? NULL;
  $this->behavior = $args['behavior'] ?? NULL;
  $this->conservation_id = $args['conservation_id'] ?? 1;
  $this->backyard_tips = $args['backyard_tips'] ?? NULL;
}

// Retrieves the conservation status based on the current conservation_id
  public function conservation() {
    if ($this->conservation_id > 0) {
      return Bird::CONSERVATION_OPTIONS[$this->conservation_id];
    }
    else {
      return 'Unknown';
    }
  }
}

?>

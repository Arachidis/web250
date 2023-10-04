<?php 

Class Bicycle {
  public $brand;
  public $model;
  public $year;
  public $category;
  public $color;
  public $description;
  public $gender;
  public $price;
  protected $weight_kg;
  protected $condition_id;

  public const CATEGORIES = array('road','mountain','hybrid','cruiser','city','BMX');

  public const GENDERS = array('men','women','unisex');

  // Used to store a list of the differnet conditions a bike may be in. A number is associated with the different conditions so that the wording can be changed at a later date. 
  protected const CONDITION_OPTIONS = array(1 => 'Beat up', 2 => 'Decent', 3 => 'Good', 4 => 'Great', 5 => 'Like New');

  public function __construct($args=[]) {
    $this->brand = $args['brand'] ?? NULL;
    $this->model = $args['model'] ?? NULL;
    $this->year = $args['year'] ?? NULL;
    $this->category = $args['category'] ?? NULL;
    $this->color = $args['color'] ?? NULL;
    $this->description = $args['description'] ?? NULL;
    $this->price = $args['price'] ?? NULL;
    $this->weight_kg = $args['weight_kg'] ?? NULL;
    $this->condition_id = $args['condition_id'] ?? NULL;
  }

  public function weight_kg() {
    return $this->weight_kg;
  }
  
  public function set_weight_kg($weight_kg) {
    $this->weight_kg = $weight_kg;
  }
  
  public function weight_lbs() {
    return $this->weight_kg * 2.204;
  }
  
  public function set_weight_lbs($weight_lbs) {
    $this->weight_kg = $weight_lbs / 2.204;
  }
  
  // Returns one of the conditions from the CONDITION_OPTIONS connstant depending on the condition_id. 
  public function condition() {
    if ($this->condition_id > 0) {
      return Bicycle::CONDITION_OPTIONS[$this->condition_id];
    }
    else {
      return 'Unknown';
    }
  }
  
}

//EOF

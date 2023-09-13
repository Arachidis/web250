<?php

class Bicycle {
  public $brand;
  public $description;
  public $model;
  public $year;
  //Changing this to private causes the Unicycle class to not be able to modify it without a get/set method.
  private $weight_kg;
  protected $wheels = 2; 
  

  public function name () {
    return $this->brand . ' ' . $this->model .' '. $this->year;  
  }

  public function weight_lbs () {
    return $this->weight_kg * 2.2046226218.'lbs';  
  }

  public function wheelsDetails() {
    if ($this->wheels > 1) {
      return 'It has '.$this->wheels.' wheels.';
    }
    else {
      return 'It has '.$this->wheels.' wheel.';
    }
  }

  public function set_weight_lbs ($weight) {
    $this->weight_kg = $weight / 2.2046226218;  
  }

  public function setWeightKg ($weight) {
    $this->weight_kg = $weight;
  }
  public function getWeightKg () {
    return $this->weight_kg.'kg';
  }
}

class Unicycle extends Bicycle {
  protected $wheels = 1;
}

//********************************************/

$bike = new Bicycle();
$unicycle = new Unicycle();

//Bike 
$bike->brand = 'Giant';
$bike->model = 'Anthem Advanced Pro 29';
$bike->year = '2022';
$bike->description = 'This is a great bike';
$bike->setWeightKg(11.4);
// Unicycle
$unicycle->brand = 'Nimbus';
$unicycle->model = '24';
$unicycle->year = '2023';
$unicycle->description = 'This is a great unicycle';
//Set the weight on the unicycle using the set_weight_lbs method.
$unicycle->set_weight_lbs(10);

//Display bike vars
echo('Bike properties: <br>');
echo('<pre>');
print_r(get_object_vars($bike));
echo('</pre><br>');
//Method results
echo('Bike name: '. $bike->name() .'<br>');
echo('Bike weight in lbs: '. $bike->weight_lbs() .'<br>');
echo($bike->wheelsDetails().'<br><hr>');

//Display unicycle vars
echo('Unicycle properties: <br>');
echo('<pre>');
print_r(get_object_vars($unicycle));
echo('</pre><br>');
//Method results
echo('Unicycle name: '. $unicycle->name() .'<br>');
echo('Unicycle weight in lbs: '. $unicycle->weight_lbs() .'<br>');
echo($unicycle->wheelsDetails().'<br><hr>');

//EOF
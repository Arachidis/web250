<?php

use Bicycle as GlobalBicycle;

class Bicycle {
  //Constant for categories
  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];
  public $category;
  public $brand;
  public $description;
  public $model;
  public $year;
  public static $instance_count;
  //Changing this to private causes the Unicycle class to not be able to modify it without a get/set method.
  private $weight_kg;
  protected static $wheels = 2; 
  
  public static function create () {
    $class_name = get_called_class();
    self::$instance_count++;
    return new $class_name; 
  }

  public function name () {
    return $this->brand . ' ' . $this->model .' '. $this->year;  
  }

  public function weight_lbs () {
    return $this->weight_kg * 2.2046226218.'lbs';  
  }

  public function wheelsDetails() {
    //Uses static to get the right value
      return 'It has '.static::$wheels.' wheels.';
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
  protected static $wheels = 1;
}

//********************************************/

$bike = Bicycle::create();
$unicycle = Unicycle::create();

//Bike 
$bike->category = Bicycle::CATEGORIES[1];
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
//Display category
echo('Bike category: '. $bike->category .'<br>');
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
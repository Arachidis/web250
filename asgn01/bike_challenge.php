<?php

class Bicycle {
  var $brand;
  var $model;
  var $year;
  var $description;
  var $weight_kg;

  function name () {
    return $this->brand . ' ' . $this->model .' '. $this->year;  
  }

  function weight_lbs () {
    return $this->weight_kg * 2.2046226218;  
  }

  function set_weight_lbs ($weight) {
    $this->weight_kg = $weight / 2.2046226218;  
  }
}

//********************************************/

$bike1 = new Bicycle;
$bike2 = new Bicycle;

//Bike 1
$bike1->brand = 'Giant';
$bike1->model = 'Anthem Advanced Pro 29';
$bike1->year = '2022';
$bike1->description = 'This is a great bike';
$bike1->weight_kg = 11.4;
//Bike 2
$bike2->brand = 'Trek';
$bike2->model = 'Farley 9';
$bike2->year = '2023';
$bike2->description = 'This is also a great bike';
//Set the weight on bike2 using the set_weight_lbs method.
$bike2->set_weight_lbs(40.35);

//Display class vars
echo('Class variables: <br>');
echo('<pre>');
print_r(get_class_vars('Bicycle'));
echo('</pre><br><hr>');
//Display bike1 vars
echo('Bike1 variables: <br>');
echo('<pre>');
print_r(get_object_vars($bike1));
echo('</pre><br>');
//Method results
echo('Bike name: '. $bike1->name() .'<br>');
echo('Bike weight in lbs: '. $bike1->weight_lbs() .'<br><hr>');
//Display bike2 vars
echo('Bike2 variables: <br>');
echo('<pre>');
print_r(get_object_vars($bike2));
echo('</pre><br>');
//Method results
echo('Bike name: '. $bike2->name() .'<br>');
echo('Bike weight in lbs: '. $bike2->weight_lbs() .'<br><hr>');

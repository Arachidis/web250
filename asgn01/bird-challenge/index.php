<?php

class Bird {
  var $commonName;
  var $food = 'None';
  var $nestPlacement = 'Rocks';
  var $conservationLevel;

  function song () {
    if ($this->commonName == 'Eastern Towhee') {
      return 'drink-your-tea!';
    }
    else if ($this->commonName == 'Indigo Bunting') {
      return 'whatwhat!!';
    }
    else {
      return 'This bird has no song';
    }
  }

  function canFly () {
    if ($this->commonName == 'Eastern Towhee') {
      return 'This bird can fly';
    }
    else if ($this->commonName == 'Indigo Bunting') {
      return 'This bird can fly';
    }
    else if ($this->commonName == 'Emperor Peguin') {
      return 'This bird cannot fly';
    }
    else {
      return 'Unknown';
    }
  }
}

//********************************************/

$bird1 = new Bird();
$bird2 = new Bird();

//bird 1
$bird1->commonName = 'Eastern Towhee';
$bird1->food = 'seeds, fruits, insects, spiders.';
$bird1->nestPlacement = 'Ground';
$bird1->conservationLevel = 'Low';
//bird 2
$bird2->commonName = 'Indigo Bunting';
$bird2->food = 'small seeds, berries, buds, and insects';
$bird2->nestPlacement = 'roadsides, and railroad rights-of-wafields and on the edges of woods';
$bird2->conservationLevel = 'Low';
//Display class vars
echo('Empty class properties: <br>');
echo('<pre>');
print_r(get_class_vars('Bird'));
echo('</pre><br><hr>');
//Display bird1 vars
echo('bird1 properties: <br>');
echo('Bird Name: '. $bird1->commonName .'<br>');
echo('Food: '. $bird1->food .'<br>');
echo('Nest Placement: '. $bird1->nestPlacement .'<br>');
echo('Conservation Level: '. $bird1->conservationLevel .'<br>');
//Method results
echo('Bird Song: '. $bird1->song() .'<br>');
echo('Bird flight: '. $bird1->canFly() .'<br><hr>');
//Display bird2 vars
echo('bird2 properties: <br>');
echo('Bird Name: '. $bird2->commonName .'<br>');
echo('Food: '. $bird2->food .'<br>');
echo('Nest Placement: '. $bird2->nestPlacement .'<br>');
echo('Conservation Level: '. $bird2->conservationLevel .'<br>');
//Method results
echo('Bird Song: '. $bird2->song() .'<br>');
echo('Bird flight: '. $bird2->canFly() .'<br><hr>');

//EOF

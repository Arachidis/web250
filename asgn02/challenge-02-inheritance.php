<?php

class Dog {
  var $breed_name;
  var $color;
  var $size;
  var $food;

  function getFoodAmount()  {
    return $this->food.' cups of kibble.';
  }

  function getInfo() {
    return 'This is a '. $this->breed_name.'. It is a '. $this->size.' sized '. $this->color.' dog.';
  }
}

class LargeBreed extends Dog {
  //Large breed class
  var $size = 'large';
  var $food = 3;
  var $dirt;

  function Clean()  {
    if ($this->dirt == "dirty") {
      $this->dirt = 'clean';
      return 'The dog has been bathed.';
    }
    else if ($this->dirt == 'clean') {
      return 'The dog is already clean.';
    }
  }
  function rollInMud() {
    if ($this->dirt == 'clean') {
      $this->dirt = 'dirty';
      return 'Your dog rolled in mud.';
    }
    else {
      return 'Your dog rolled in the mud. Thankfully it was already dirty.';
    }
  }
 }

class MediumBreed extends Dog {
  //Medium breed class
  var $size = 'medium';
  var $food = 2;
  var $toy = 'stick';
 
  function giveToy()  {
    //Randomize the toy that is given
    if (rand(1, 2) == 2) { 
      $this->toy = 'tennis ball';
    }
    else {
      $this->toy = 'bone';
    }
    return 'You gave the dog a '.$this->toy.'.';
  }

  function collectToy() {
    return 'You found a '. $this->toy .' burried in your yard.';
  }
}

class SmallBreed extends Dog {
  var $size = "small";
  var $food = 1;
  var $barks = 0;

  function stopBarking()  {
    //1/5 chance of having the dog listen.
    if (rand(1, 5) < 5) { 
      $this->barks++;
      return 'The dog barked again. It has barked '. $this->barks. ' times now.';
    }
    else {
      $this->barks = 0;
      return 'The dog finally stopped barking.';
    }
  }
}

$large_dog = new LargeBreed();
$med_dog = new MediumBreed();
$small_dog = new SmallBreed();

//Large dog
$large_dog->breed_name = 'Great Dane';
$large_dog->color = 'black';
$large_dog->dirt = 'dirty';

//Medium dog
$med_dog->breed_name = 'Boxer';
$med_dog->color = 'brown';
$med_dog->toy = 'bone';

//Small dog
$small_dog->breed_name = 'Chihuahua';
$small_dog->color = 'white';


//Use methods in the classes
echo('<h2>Large Dog: '.$large_dog->getInfo().'</h2>');
echo('<p>Clean the dog: '.$large_dog->Clean().'</p>');
echo('<p>Walk the dog: '.$large_dog->rollInMud().'</p>');

echo('<hr><h2>Medium Dog: '.$med_dog->getInfo().'</h2>');
echo('<p>Find a dog toy: '.$med_dog->collectToy().'</p>');
echo('<p>Give the dog a toy: '.$med_dog->giveToy().'</p>');

echo('<hr><h2>Small Dog: '.$small_dog->getInfo().'</h2>');
echo('<p>You tell the '.$small_dog->breed_name.' to stop barking</p>');
for ($i = 0; $i < 10; $i++) {
 echo('<p>'.$small_dog->stopBarking().'</p>');
}

//Display feeding instruction
echo('<hr><h2>Feeding instructions: </h2>');
echo('<p>The '.$large_dog->breed_name.' gets '.$large_dog->getFoodAmount().'</p>');
echo('<p>The '.$med_dog->breed_name.' gets '.$med_dog->getFoodAmount().'</p>');
echo('<p>The '.$small_dog->breed_name.' gets '.$small_dog->getFoodAmount().'</p>');



//EOF

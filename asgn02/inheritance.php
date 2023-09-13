<?php

class Dog {
  public $breed_name;
  public $color;
  protected $size;
  protected $food;

  public function getInfo() {
    return 'This is a '. $this->breed_name.'. It is a '. $this->size.' sized '. $this->color.' dog.';
  }
//Get set method for the food and coat color

  public function setFoodAmount($food) {
    $this->food = $food;
  }

  public function getFoodAmount()  {
    return $this->food.' cups of kibble.';
  }
  
  public function setColor($color) {
    $this->color = $color;
  }

  public function getColor() {
    return 'The dog is now colored '.$this->color.'.';
  }
}

class LargeBreed extends Dog {
  //Large breed class
  protected $size = 'large';
  protected $food = 3;
  private $dirt = 'dirty';

  //These methods already act as a get/set
 public function Clean()  {
    if ($this->dirt == "dirty") {
      $this->dirt = 'clean';
      return 'The dog has been bathed.';
    }
    else if ($this->dirt == 'clean') {
      return 'The dog is already clean.';
    }
  }
 public  function rollInMud() {
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
  protected $size = 'medium';
  protected $food = 2;
  private $toy = 'stick';
 
  public function giveToy()  {
    //Randomize the toy that is given
    if (rand(1, 2) == 2) { 
      $this->toy = 'tennis ball';
    }
    else {
      $this->toy = 'bone';
    }
    return 'You gave the dog a '.$this->toy.'.';
  }

  public function collectToy() {
    return 'You found a '. $this->toy .' burried in your yard.';
  }
  //Get set for the toy
  public function setToy($toy) {
    $this->toy = $toy;
  }
  public function getToy() {
    return 'You have a '. $this->toy .'.';
  }
}

class SmallBreed extends Dog {
  protected $size = "small";
  protected $food = 1;
  private $barks = 0;

  public function stopBarking()  {
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
//Changed to use get/set methods
//Large dog
$large_dog->breed_name = 'Great Dane';
$large_dog->setColor('black');

//Medium dog
$med_dog->breed_name = 'Boxer';
$med_dog->setColor('brown');
$med_dog->setToy('bone');

//Small dog
$small_dog->breed_name = 'Chihuahua';
$small_dog->setColor('white');


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
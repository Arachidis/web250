<?php 

class Bird {
  public $commonName;
  public $latinName;

  public function __construct($commonName, $latinName) {
    $this->commonName = $commonName;
    $this->latinName = $latinName;
  }
}

//Creates instances of the Bird Class
$robin = new Bird("Robin", "Turdus migratorius");
$towhee = new Bird("Eastern towhee", "Pipilo erythrophthalmus");

//Prints the commonName and latinName
echo('<span>Common name: '.$robin->commonName.'</span><br>');
echo('<span>Latin name: '.$robin->latinName.'</span><br>');
echo('<hr>');
echo('<span>Common name: '.$towhee->commonName.'</span><br>');
echo('<span>Latin name: '.$towhee->latinName.'</span>');

//EOF

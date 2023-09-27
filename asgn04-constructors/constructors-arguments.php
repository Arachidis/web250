<?php

class Bird {
  public $commonName;
  public $latinName;

  public function __construct($args=[]) {
    $this->commonName = $args['commonName'] ?? NULL;
    $this->latinName = $args['latinName'] ?? NULL;
  }
}

//Creates new instances of the Bird clas using arrays for the parameters
$flycather = new Bird(['commonName' => 'Acadian Flycatcher', 'latinName' => 'Turdus migratorius']);
$wren = new Bird(['commonName' => 'Carolina Wren', 'latinName' => 'Thryothorus ludovicianus']);

//Prints the commonName and latinName
echo('<span>Common name: '.$flycather->commonName.'</span><br>');
echo('<span>Latin name: '.$flycather->latinName.'</span><br>');
echo('<hr>');
echo('<span>Common name: '.$wren->commonName.'</span><br>');
echo('<span>Latin name: '.$wren->latinName.'</span>');

//EOF

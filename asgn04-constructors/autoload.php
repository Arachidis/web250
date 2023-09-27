<?php 

//Autoload function
function my_autoload($class_name) {
  if (preg_match('/\A\w+\Z/', $class_name)) {
    //Uses strtolower because the server being used is case sensitive
    include 'classes/' . strtolower($class_name) . '.class.php';
  }
}

spl_autoload_register('my_autoload');

//Creates a new instance of the Bird class and prints the commonName
$flycather = new Bird(['commonName' => 'Acadian Flycatcher', 'latinName' => 'Turdus migratorius']);
echo('<span>Common name: '.$flycather->commonName.'</span><br>');

//EOF

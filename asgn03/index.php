<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asgn02 Inheritance</title>
</head>
<body>
<h1>Inheritance Examples</h1>

<?php 
    include 'Bird.php';
    
    $bird = new Bird;
    echo '<p>The generic song of any bird is "' . $bird->song . '".</p>';
    echo "<p>There are currently ".Bird::$instance_count." birds. </p>";    

    $fly_catcher = new YellowBelliedFlyCatcher;
    echo '<p>The song of the ' . $fly_catcher->name . ' on breeding grounds is "' . $fly_catcher->song . '".</p>';
    echo "<p>There are currently ".YellowBelliedFlyCatcher::$instance_count." birds. </p>";    

    $kiwi = new Kiwi;
    Kiwi::$flying = "no";
    echo "<p>The " . $kiwi->name . " " . $kiwi->can_fly() . ".</p>";    
    echo "<p>There are currently ".Kiwi::$instance_count." birds. </p>";    

    echo ('<hr>');
    
    $bird2 = Bird::create();
    echo '<p>The generic song of any bird is "' . $bird2->song . '".</p>';
    echo "<p>There are currently ".Bird::$instance_count." birds. </p>";    
    
    $fly_catcher2 = YellowBelliedFlyCatcher::create();
    echo '<p>The song of the ' . $fly_catcher2->name . ' on breeding grounds is "' . $fly_catcher2->song . '".</p>';
    echo "<p>There are currently ".YellowBelliedFlyCatcher::$instance_count." birds. </p>";   
    $fly_catcher2->get_eggs();
    
    $kiwi2 = Kiwi::create();
    Kiwi::$flying = "no";
    echo "<p>The " . $kiwi2->name . " " . $kiwi2->can_fly() . ".</p>";    
    echo "<p>There are currently ".Kiwi::$instance_count." birds. </p>";    

?>
    </body>
</html>


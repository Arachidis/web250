<?php

class Bird {
    public static $instance_count = 0; 
    public static $egg_num = '0'; 
    var $habitat;
    var $food;
    var $nesting = "tree";
    var $conservation;
    var $song = "chirp";
    //Swithced to static to fit with the method in the assignment
    public static $flying = "yes";

    function can_fly() {
      //Ternary statement
      static::$flying == "yes" ? $flying_string = "bird can fly" : $flying_string = " cannot fly and it stuck on the ground"; 
       return $flying_string;
      }

    public static function create () {
      self::$instance_count++;
      $class_name = get_called_class();
      return new $class_name;
    }

    public function get_eggs () {
      //Extra function just to show that egg_num is behainving how it should.
      echo('Self egg_num: '.self::$egg_num.'.<br>');
      echo('Static egg_num: '.static::$egg_num.'.<br>');
    }
}

class YellowBelliedFlyCatcher extends Bird {
  //egg_num override
  public static $egg_num = '3-4, sometimes 5.';
    var $name = "yellow-bellied flycatcher";
    var $diet = "mostly insects.";
    var $song = "flat chilk";

}

class Kiwi extends Bird {
    var $name = "kiwi";
    var $diet = "omnivorous";
    //Swithced to static to fit with the method in the assignment
    public static $flying = "no";
}

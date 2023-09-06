<?php 

function fizzBuzz($i) {
  //FizzBuzz function
  $temp = '';
  if ($i % 3 == 0) {
    $temp .= 'Fizz';
  } 
  if ($i % 5 == 0) {
    $temp .= 'Buzz';
  }
  elseif ($temp == '') {
    return $i;
  }
  return $temp;
}

for ($i = 1; $i <= 100; $i++) {
  echo (fizzBuzz($i) .'<br>');
}

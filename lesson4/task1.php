<?php
// 1. Реализовать функцию a+b, где каждое из чисел а и b имеет не менее 1000 разрядов.
// Числа хранятся в файле chisla.txt на двух строчках. Ответ вписать на третью строчку

include '../randArray.php';

$filename = 'chisla.txt';
file_put_contents(
  $filename,
  randNumString(1000) . PHP_EOL . randNumString(1000)
);

/**
 * Function sums 2 big numbers (including 1000 more rank numbers)
 * @param $filename - function takes numbers from  first 2 strings of the given file
 * @return void - result will put in the 3rd string of given file
 */
function sumBigNumbers($filename): void {
  $file = fopen($filename, 'a+');
  $firstNum  = array_reverse(str_split(trim(fgets($file))));
  $secondNum = array_reverse(str_split(trim(fgets($file))));

  $maxCount = (count($firstNum) > count($secondNum)) ? count($firstNum) : count($secondNum);
  $sum = 0;
  $total = '';

  for ($i = 0; $i < $maxCount; $i++) {
    $sum = floor($sum / 10) + $firstNum[$i] + $secondNum[$i];
    $total .= $sum % 10;
  }

  if ($sum > 9) $total .= floor($sum/10);

  fwrite($file, PHP_EOL . strrev($total));

}

sumBigNumbers($filename);
// echo file_get_contents($filename);





<?php
// 3.* Выполнить умножение двух чисел a * b , где а и b имеют до 100 разрядов

/**
 * Function sums 2 big numbers (including 1000 more rank numbers)
 * @param string $a
 * @param string $b
 * @return string
 */
function sum(string $a, string $b): string {

  $firstNum = str_split(strrev($a));
  $secondNum= str_split(strrev($b));

  $maxCount = (count($firstNum) > count($secondNum)) ? count($firstNum) : count($secondNum);
  $sum = 0;
  $total = '';

  for ($i = 0; $i < $maxCount; $i++) {
    $sum = floor($sum / 10) + $firstNum[$i] + $secondNum[$i];
    $total .= $sum % 10;
  }

  if ($sum > 9) $total .= floor($sum/10);

  return strrev($total);

}

/**
 * Function performs multiplication of two up to 100 ranks numbers
 * @param string $a
 * @param string $b
 * @return string
 */
function multiplyBigNumbers(string $a, string $b): string {
  $firstNum = str_split(strrev($a));
  $secondNum= str_split(strrev($b));

  $total = 0;

  for ($i=0; $i < count($secondNum); $i++) {

    $product = str_pad('', $i, '0');
    $mult =0;

    for ($j = 0; $j < count($firstNum); $j++) {

      $mult = $secondNum[$i] * $firstNum[$j] + floor($mult/10);
      $product = $mult % 10 . $product;
    }

    if ($mult > 9) $product = floor($mult/10) . $product;

    $total = sum($total, $product);
  }

 return $total;
}


/*---------------------------------------------*/
include '../randArray.php';
$filename = 'chisla3.txt';

$a = randNumString(100);
$b = randNumString(100);

file_put_contents(
  $filename,
  $a . PHP_EOL . $b
);


$result = multiplyBigNumbers($a, $b);
file_put_contents($filename, PHP_EOL . $result, FILE_APPEND);
echo "$a * $b = $result";

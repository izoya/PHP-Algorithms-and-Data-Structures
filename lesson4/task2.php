<?php
// 2. Для натуральных чисел a и n вычислить a^n. Входные числа имеют диапазон 1 <= a <= 9 и 1 <= n <= 1000.
// Ответ вывести в файл otvet.txt

/** Function multiplyBigNumbers() */
ob_start();
include 'task3.php';
ob_clean();

/** Function calculates the power using binary power algorithm
 * and long numbers multiplication
 * @param string $val - value of 1-9 range
 * @param $pow - value of 1-1000 range
 * @return string
 */
function bigPower(string $val, int $pow): string
{
  if ($pow == 0) return 1;
  if ($pow == 1) return $val;
  if ($pow == 2) return multiplyBigNumbers($val, $val);

  $extraMultiplier = ($pow % 2 === 1) ? $val : 1;
  $result = bigPower($val, floor($pow/2));

  return multiplyBigNumbers(bigPower($result, 2), $extraMultiplier);

}


/*------------------------------------*/
$filename = 'otvet.txt';

$a = 8;
$b = 999;

file_put_contents($filename,$a . PHP_EOL . $b);

$result = bigPower($a, $b);
file_put_contents($filename, PHP_EOL . $result, FILE_APPEND);

echo "$a ^ $b = $result";

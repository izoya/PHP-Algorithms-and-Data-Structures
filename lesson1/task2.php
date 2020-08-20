<?php
/**
 * 2. Простые делители числа 13195 - это 5, 7, 13 и 29.
 * Каков самый большой делитель числа 600851475143,
 * являющийся простым числом?
 */
$start = microtime(true);
$before = memory_get_usage();
///*------------------------------*/

$number = 600851475143;

$heap = new SplMaxHeap();
$divident = $number;

while ($divident > 1) {

  if ($divident % 2 == 0) {
    $divident = $divident / 2;
    $heap->insert(2);
    continue;
  }

  for ($i = 3; $i < $divident / 2; $i += 2) {
    if ($divident % $i == 0) {
      $divident = $divident / $i;
      $heap->insert($i);
      continue 2;
    }
  }

  $heap->insert($divident);
  $divident = 1;
}

echo "Number: $number " . PHP_EOL ;
echo "Max Prime Divisor:" . $heap->top() . PHP_EOL;

/*------------------------------*/
echo PHP_EOL;
echo "Exec time: " . (microtime(true) - $start) . PHP_EOL;



/*----------Alternative solution------------------*/

function maxPrimeDivider($num)
{
  $res = $num % 2 ? 1 : 2;

  while (!($num % 2)) {
    $num /= 2;
  }

  for ($q = 3; $q*$q < $num; $q += 2) {

    for (; !($num % $q); $num /= $q) {
      $res = $q;
    }
  }

  return $res > $num ? $res : $num;
}

var_dump(maxPrimeDivider($number));
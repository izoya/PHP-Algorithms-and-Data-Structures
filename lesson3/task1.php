1. Дан массив из n элементов, начиная с 1. Каждый следующий элемент равен (предыдущий + 1).
Но в массиве гарантированно 1 число пропущено. Необходимо вывести на экран пропущенное число.
Примеры:
[1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16] => 11
[1, 2, 4, 5, 6] => 3
[] => 1

<?php
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16];
//$arr = [1, 2, 4, 5, 6] ;
//$arr = [];

function searchMissingNum($arr)
{
  if (count($arr) === 0) return 1;
  $start = 0;
  $end = count($arr) - 1;

  while ($start <= $end) {

    $baseIndex = floor(($start + $end) / 2);

    if ($arr[$baseIndex] - $arr[$baseIndex - 1] == 2) return $arr[$baseIndex] - 1;

    if ($arr[$baseIndex] == $baseIndex + 1) {
      $start = $baseIndex + 1;
    } else {
      $end = $baseIndex - 1;
    }

  }

  return null;
}

var_dump(searchMissingNum($arr));
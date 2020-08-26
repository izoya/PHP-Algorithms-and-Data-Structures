4**. Реализовать на РНР сортировку слиянием (не копируя готовое :) )
<?php

function mergeSort($arr)
{
  $arrCount = count($arr);

  if ($arrCount < 2) return $arr;
  
  $arrMiddle = ceil($arrCount / 2);

  $left = array_slice($arr, 0, $arrMiddle);
  $right = array_slice($arr, $arrMiddle);

  $left = mergeSort($left);
  $right = mergeSort($right);

  $mergeArr = [];
  $i = 0; $j = 0;
  while (count($mergeArr) < $arrCount) {

    if (empty($left[$i])) {
      $mergeArr[] = $right[$j++];
      continue;
    }

    if (empty($right[$j])) {
      $mergeArr[] = $left[$i++];
      continue;
    }

    if (empty($left[$i]) || $left[$i] > $right[$j]) {
      $mergeArr[] = $right[$j++];
      continue;
    }

    if ($left[$i] === $right[$j]) {
      $mergeArr[] = $left[$i++];
      $mergeArr[] = $right[$j++];
      continue;
    }

    $mergeArr[] = $left[$i++];
  }

  return $mergeArr;
}

//$arr = [  1,   14,   13,   9,  11,  14,  144,  16,  2,  19,  22,  24,  25,  27, 1, 100, 1, 18];
include dirname(__DIR__) . '/randArray.php';
$arr = _randArray(10000, 0, 101);

$arr = mergeSort($arr);
foreach ($arr as $i) {
  echo "$i ";
}
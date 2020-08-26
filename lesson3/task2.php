3*. Доработать алгоритм бинарного поиска для нахождения кол-ва повторений в массиве.
Сложность O(logn) не должна измениться.
Учтите, что массив длиной n может состоять из одного значения [4, 4, 4, 4, ...(n)..., 4]

<?php
/** Find last occurrence */
function rightSearch($arr, $num, $start, $end)
{
  $rangeEnd = $start;

  while ($start < $end) {

    $baseIndex = floor(($start + $end) / 2);

    if ($arr[$baseIndex] === $num) {
      $rangeEnd = $baseIndex;

      if ($arr[$baseIndex + 1] == $num) {
        $rangeEnd = rightSearch($arr, $num, $baseIndex + 1, $end);
      }

      return $rangeEnd;
    }

    if ($arr[$baseIndex] < $num) {
      $start = $baseIndex + 1;
    }
    else $end = $baseIndex - 1;
  }

  return $rangeEnd;
}

/** Find first occurrence */
function leftSearch($arr, $num, $start, $end)
{
  $rangeStart = $end;

  while ($start < $end) {

    $baseIndex = floor(($start + $end) / 2);

    if ($arr[$baseIndex] === $num) {
      $rangeStart = $baseIndex;

      if ($arr[$baseIndex - 1] == $num) {
        $rangeStart = leftSearch($arr, $num, $start, $baseIndex - 1);
      }

      return $rangeStart;
    }

    if ($arr[$baseIndex] < $num) {
      $start = $baseIndex + 1;
    }
    else $end = $baseIndex - 1;
  }

  return $rangeStart;
}

function allEntriesBinarySearch($arr, $num)
{
  $start = 0;
  $end = count($arr) - 1;

  $range = [];

  while ($start <= $end) {

    $baseIndex = floor(($start + $end) / 2);

    if ($arr[$baseIndex] === $num) {

      $range[1] = $range[0] = $baseIndex;

      if ($arr[$baseIndex-1] == $num) {
        $range[0] = leftSearch($arr, $num, $start, $baseIndex - 1);
      }
      if ($arr[$baseIndex+1] == $num) {
        $range[1] = rightSearch($arr, $num, $baseIndex + 1, $end);
      }
      return $range;
    }

    if ($arr[$baseIndex] < $num) {
      $start = $baseIndex + 1;
    }
    else $end = $baseIndex - 1;

  }

  return null;
}

//$arr =
//  [  1,   1,   1,   9,  11,  14,  14,  16,  16,  19,  22,  24,  25,  27,  28,  33,  34,  34,  35,  35,
//    41,  48,  48,  48,  49,  49,  66,  69,  72,  75,  82,  88,  89,  92,  95, 101, 104, 107, 110, 145,
//   145, 145, 148, 148, 148, 148, 148, 148, 148, 148, 148, 148, 148, 148, 148, 148, 148, 148, 148, 180,
//   180, 181, 183, 191, 194, 194, 199, 200, 200, 204, 232, 238, 239, 239, 239, 241, 244, 251, 253, 254];
$arr = [4, 4, 4, 4, 4];

/** @var array $arr */
$range = allEntriesBinarySearch($arr, 4);

if (!empty($range)) echo "{$range[0]}-{$range[1]}";
else echo "Not found";
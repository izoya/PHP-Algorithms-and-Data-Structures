3. Требуется написать метод, принимающий на вход размеры двумерного массива
и выводящий массив в виде инкременированной цепочки чисел,
идущих по спирали против часовой стрелки.
Примеры:
2х3   |  3х1    |   4х4           |   0х7
-----------------------------------------------
1 6   |  1 2 3  |   01 12 11 10   |   Ошибка!
2 5   |         |   02 13 16 09   |
3 4   |         |   03 14 15 08   |
      |         |   04 05 06 07   |
-----------------------------------------------

<?php

$arr = getNumberArray(30, 30);

function getNumberArray(int $cols, int $rows)  // 4 - 4
{
  if ($cols <= 0 || $rows <= 0) return null;

  $arr[] = [];
  $counter = 0;
  $rowCount = 0;
  $colCount = 0;

  $i = -1;
  $j = 0;
  $numLength = strlen($cols * $rows);

  do {
    //  первый
    while ($i < $rows - $rowCount - 1) { // 0 -> (4 - 0)
      $i++;
      $arr[$i][$j] = str_pad(++$counter, $numLength, "0", STR_PAD_LEFT);
    }

    //второй
    while ($j < $cols - $colCount - 1) { // 1 -> (4 - 0)
      $j++;
      $arr[$i][$j] = str_pad(++$counter, $numLength, "0", STR_PAD_LEFT);
    }

    if ($cols === 1 || $rows === 1) break;

    // третий
    while ($i > $rowCount) {
      $i--;
      $arr[$i][$j] = str_pad(++$counter, $numLength, "0", STR_PAD_LEFT);
    }

    $colCount++;
    $rowCount++;

    // четвертый
    while ($j > $colCount) {
      if ($counter === $rows * $cols) break;
      $j--;
      $arr[$i][$j] = str_pad(++$counter, $numLength, "0", STR_PAD_LEFT);
    }

  } while (($rowCount < $rows / 2) && ($colCount < $cols / 2));

  return $arr;
}


if (!empty($arr)) {
  for ($i = 0; $i < @count($arr); $i++) {
    for ($j = 0; $j < @count($arr[$i]); $j++) {
      echo $arr[$i][$j] . " ";
    }
    echo PHP_EOL;
  }
}
else echo "Error!";

<?php
/**
 * 1. Проверить баланс скобок в выражении, игнорируя любые внуренние символы.
 * В решении по возможности испольщовать SplStack.
 * Примеры:
 * "Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: {[][()]}" - true
 * ((a + b)/ c) - 2 - true
 * "([ошибка)" - false
 * "(") - false
 */
function isOpenBracket($bracket)
{
  return strpos('([{', $bracket) === false ? false : true;
}

function isPair($openBracket, $closeBracket)
{
  $openPos = strpos('([{', $openBracket);
  $closePos = strpos(')]}', $closeBracket);

  if ($closePos === false || $openPos === false) return false;

  return  $closePos === $openPos;
}

function isBracketsBalanced($string)
{
  $stack = new SplStack();

  // remove text in quotes "" and all non-brackets symbols
  $string = preg_replace([ "/[\"].*[\"]/U",  "/[^(){}\[\]]/" ], '',  $string);

  for ($i = 0; $i < strlen($string); $i++) {

    if (isOpenBracket($string[$i])) {
      $stack->push($string[$i]);
      continue;
    }

    if (!$stack->count()) return false;

    if (isPair($stack->top(), $string[$i])) {
      $stack->pop();
      continue;
    }

    return false;
  }

  if (!$stack->count()) return true;

  return false;
}


$testStrings = [
  'Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: {[][()]}',
  '((a + b)/ c) - 2',
  '([ошибка)',
  '"(")',
];

foreach ($testStrings as $string) {
  echo $string . PHP_EOL;
  var_dump(isBracketsBalanced($string));
  echo PHP_EOL;
}

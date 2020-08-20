<?php
/**
 * 3. Написать аналог «Проводника» в Windows для директорий на сервере при помощи итераторов.
 */
function getHtml(DirectoryIterator $file, $isDir = true)
{
  $html = '';
  $link = getLink($file);

  if ($file->isDir()) {

    if (!$file->isDot()) $html .= '<img src="folder.svg" width="18px" alt="folder">';

    $html .= ' <a href="' . getLink($file) . '">' . $file->getFilename() . '</a><br>';
  }
  else {
    $html .= '<img src="file.svg" width="18px" alt="file"> ' . $file->getFilename() . '<br>';
  }

  return $html;
}

function getLink(DirectoryIterator $file)
{
  $path = ($file->getPath() == '/.') ? DIRECTORY_SEPARATOR : $file->getPath() . DIRECTORY_SEPARATOR;

  if ($file->getFilename() === '.') $path = DIRECTORY_SEPARATOR;

  return "?path={$path}{$file->getFilename()}";
}

$path = (!empty($_GET['path'])) ? realpath($_GET['path']) : '/.';
$dir = new DirectoryIterator($path);

echo "<h3>" . $dir->current()->getPath() . "</h3>";

$files = new SplStack();

foreach ($dir as $file) {

  if ($file->isDir()) {
    echo getHtml($file);
  }
  else {
    $files->push(getHtml($file));
  }
}

for ($i = 0; $i < $files->count(); $i++) {
  echo ($files->pop());
}


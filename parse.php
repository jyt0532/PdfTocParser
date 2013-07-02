<?php
$fileName = 'Toc.txt';
$outputArticles = array();
$handle = fopen($fileName, "r");
if($handle){
  while(($buffer = fgets($handle, 4096)) !== false){
    if(strstr($buffer, 'NumberOfPages')){
      break;
    }
  }
  while (($titleLine = fgets($handle, 4096)) !== false) {
    $levelLine = fgets($handle, 4096);
    $pageNumberLine = fgets($handle, 4096);
    $explodedTitleLine = explode("BookmarkTitle: ", $titleLine);
    $explodedLevelLine = explode("BookmarkLevel: ", $levelLine);
    $explodedPageNumberLine = explode("BookmarkPageNumber: ", $pageNumberLine);
    if(count($explodedTitleLine) !== 2
      || count($explodedLevelLine) !== 2
      || count($explodedPageNumberLine) !== 2){
        continue;
      }
    if(ord($explodedTitleLine[1]) === 32
      || ord($explodedLevelLine[1]) === 32
      || ord($explodedPageNumberLine[1]) === 32){
        continue;
      }
    $title = mb_convert_encoding($explodedTitleLine[1], 'UTF-8', 'HTML-ENTITIES');
    $level = $explodedLevelLine[1];
    $pageNumber = $explodedPageNumberLine[1];
    $level = str_replace("\n", '', $level);
    $pageNumber = str_replace("\n", '', $pageNumber);
    $title = str_replace("\n", '', $title);
    if($level === '1')
      continue;
    array_push($outputArticles, array(
      'title' => $title
      , 'level' => $level
      , 'pageNumber' => $pageNumber
    ));
  }
  fclose($handle);
}

?>

<?php
  require_once ('medoo.php');
  $database = new medoo();
  $albums = $database->select('base','aTitle');
  //var_dump($albums);
  foreach ($albums as $cover) {
    $title = preg_replace('#[^0-9a-z]+#i', '-', $cover);
    echo"<img class='shadow' src='./img/covers/".$title."_front.jpg' width='100px'>";
  }
 ?>

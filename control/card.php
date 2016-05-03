<?php
include(dirname(__FILE__).'/../model/card.php');

if (isset($_GET['card'])) {
  $card=$_GET['card'];
  $_SESSION['card']=$_GET['card'];
  $datas = LoadCard($_GET['card']);
  $tracks = LoadTracks($_GET['card']);
}
else{
  echo "Card unkown";
}

$title=preg_replace('#[^0-9a-z]+#i', '-', $datas[0]['title']);
$_SESSION['album']=$title;
$i=-1;

if (isset($_POST['go']) AND $_POST['go']=='Delete') {
  deleteCD($card);
}

include(dirname(__FILE__).'/../vue/card.php');

?>

<?php
include(dirname(__FILE__).'/../model/catalog.php');

if (isset($_GET['limit'])) {
  $limit=$_GET['limit'];
  }
  else{
    $limit=0;
  }
  $datas = LoadList($limit);
  $stats = albumStat();
  $i=0;
  $pagemax =$stats / 10;

include(dirname(__FILE__).'/../vue/catalog.php');

?>

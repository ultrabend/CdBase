<?php

include(dirname(__FILE__).'/../model/byartist.php');

if (isset($_GET['limit'])) {
  $limit=$_GET['limit'];
  }
  else{
    $limit="A%";
  }
  $datas = LoadList($limit);
  $i=0;

include(dirname(__FILE__).'/../vue/byartist.php');

?>

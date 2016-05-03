<?php
include(dirname(__FILE__).'/../model/addcd.php');

if (isset($_POST['album'])) {
  add_album();
}

include(dirname(__FILE__).'/../vue/addcd.php');

?>

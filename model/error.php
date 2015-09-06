<?php
  error_reporting(0);
/*  if ($_GET['type'] == 1) {
    $message = "No album defined";
  }*/


  switch ($_GET['type']) {
    case '1':
      $message = "No album defined";
      break;
    case '2':
      $message = "Server time out or no tracks found, you can try again";
      break;
    default:
      $message = "Keep smile, this is the error page !";
      break;
  }

 ?>

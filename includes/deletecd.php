<?php
    session_start();
    require_once('db_connect.php');
    $id=$_SESSION['card'];
    $sql = "DELETE FROM base WHERE id_album = $id";
    $bdd->exec($sql);
    header("Location: ../index.php?state=list.php");
    ?>

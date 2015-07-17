<?php
	session_start();
	require_once('medoo.php');
	require_once('functions.php');

	if (isset($_GET['count'])) {
		$i=$_GET['count'];
		$database = new medoo();
		$database->insert('base',['brainz_id'=>$_SESSION['album'][$i]['id'],
		'aTitle'=>$_SESSION['album'][$i]['title'],
		'band'=>$_SESSION['album'][$i]['artist'],
		'ayear'=>$_SESSION['album'][$i]['date'],
		'barcode'=>$_SESSION['album'][$i]['barcode'],
		'format'=>$_SESSION['album'][$i]['format'],
		'media'=>$_SESSION['album'][$i]['disc'],
		'nb_tracks'=>$_SESSION['album'][$i]['tracks'],
		'label'=>$_SESSION['album'][$i]['label']]);

		CoverRecup($_SESSION['album'][$i]['id'],$_SESSION['album'][$i]['title']);

	$_SESSION['album']=array();

	header("Location: ../index.php?state=list.php");
	}
	else{

		header("Location: ../index.php?state=importcdbarcode.php");
	}

?>

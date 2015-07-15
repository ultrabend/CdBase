<?php
	session_start();
	require_once('medoo.php');
	require_once('functions.php');
	$database = new medoo();
	$database->insert('base',['brainz_id'=>$_SESSION['barcode'][0]['id'],'aTitle'=>$_SESSION['barcode'][0]['title'],'band'=>$_SESSION['barcode'][0]['artist'],'ayear'=>$_SESSION['barcode'][0]['date'],'barcode'=>$_SESSION['barcode'][0]['barcode'],'format'=>$_SESSION['barcode'][0]['format'],'nb_tracks'=>$_SESSION['barcode'][0]['tracks'],'label'=>$_SESSION['barcode'][0]['label'],'media'=>$_SESSION['barcode'][0]['disc']]);

	CoverRecup($_SESSION['barcode'][0]['id'],$_SESSION['barcode'][0]['title']);

	$_SESSION['barcode']=array();

	header("Location: ../index.php?state=list.php");

?>

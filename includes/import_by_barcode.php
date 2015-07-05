<?php
	session_start();
	require_once('db_connect.php');
	include("functions.php"); 
	
	$req = $bdd->prepare('INSERT INTO base (brainz_id,aTitle,band,ayear,barcode,format,nb_tracks,label,media) VALUES (?,?,?,?,?,?,?,?,?)');
	$req->execute(array($_SESSION['barcode'][0]['id'],$_SESSION['barcode'][0]['title'],$_SESSION['barcode'][0]['artist'],$_SESSION['barcode'][0]['date'],$_SESSION['barcode'][0]['barcode'],$_SESSION['barcode'][0]['format'],$_SESSION['barcode'][0]['tracks'],$_SESSION['barcode'][0]['label'],$_SESSION['barcode'][0]['disc']));
	$req->closeCursor();

	CoverRecup($_SESSION['barcode'][0]['id'],$_SESSION['barcode'][0]['title']);

	
	

	$_SESSION['barcode']=array();
	
	header("Location: ../index.php?state=importcdbarcode.php");
		
?>
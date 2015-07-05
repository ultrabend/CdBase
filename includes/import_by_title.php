<?php
	session_start();
	require_once('db_connect.php');
	include("musicbrainz.php"); 
	$instance = new MusicBrainz;
	
	if (isset($_GET['release'])) {
		$album=$_GET['release'];
		$id=$_GET['id'];
		$i = $_GET['cd'];
	
	$data = $instance->DiscSearch($_GET['id']);
	$date = $_SESSION['album'][$i]['date'];
	$artist = $_SESSION['album'][$i]['artist'];
	$title = $_SESSION['album'][$i]['title'];
	$barcode = $_SESSION['album'][$i]['barcode'];
	$disc = $_SESSION['album'][$i]['disc'];
	$format = $_SESSION['album'][$i]['format'];
	$tracks = $_SESSION['album'][$i]['tracks'];
	
	
	$req = $bdd->prepare('INSERT INTO base (brainz_id,aTitle,band,ayear,barcode,format,nb_tracks) VALUES (?,?,?,?,?,?,?)');
	$req->execute(array($id,$title,$artist,$date,$barcode,$format,$tracks));
	$req->closeCursor();
	$_SESSION['album']=array();
	
	header("Location: ../index.php");
	}
	else{

		header("Location: ../index.php");
	}	
	
?>
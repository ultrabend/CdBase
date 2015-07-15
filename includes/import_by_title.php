<?php
	session_start();
	require_once('medoo.php');
	include("musicbrainz.php");
	$instance = new MusicBrainz;

	if (isset($_GET['release'])) {
		$album=$_GET['release'];
		$id=$_GET['id'];
		$i = $_GET['cd'];

	$data = $instance->DiscSearch($_GET['id']);

	$database = new medoo();
	$database->insert('base',['brainz_id'=>$id,'aTitle'=>$_SESSION['album'][$i]['title'],'band'=>$_SESSION['album'][$i]['artist'],'ayear'=>$_SESSION['album'][$i]['date'],'barcode'=>$_SESSION['album'][$i]['barcode'],
	'format'=>$_SESSION['album'][$i]['format'],'nb_tracks'=>$_SESSION['album'][$i]['tracks']]);

	$_SESSION['album']=array();

	header("Location: ../index.php?state=list.php");
	}
	else{

		header("Location: ../index.php?state=importcdtitle.php");
	}

?>

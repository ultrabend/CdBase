<?php
	error_reporting(0);
	session_start();
	require_once('medoo.php');
	require_once('functions.php');
	require_once('musicbrainz.php');
	$database = new medoo();

//if data exist
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$i = $_GET['cd'];
		// download album info
		download_album_Title($i);
		// download album cover
		CoverRecup($_SESSION['album'][$i]['id'],$_SESSION['album'][$i]['title']);
		// download album tracks
		$tracks = download_tracks($id);
		// if error try again
		if (!$tracks) {
			while(!$tracks){
					$tracks = download_tracks($id);
			}
		}
		// save tracks data
		$max = $tracks['media'][0]['track-count'];
		$id_album = $database->select('base','id_album',['brainz_id'=>$_SESSION['album'][$i]['id']]);
		for ($i=0; $i <$max ; $i++) {
			$database->insert('albums',[
				'id_album'=>$id_album[0],
				'id_track'=>$tracks['media'][0]['tracks'][$i]['number'],
				'ncd'=>$tracks['media'][0]['position'],
				'title'=>$tracks['media'][0]['tracks'][$i]['title'],
				'duration'=>$tracks['media'][0]['tracks'][$i]['length']]);
		}

	$_SESSION['album']=array();

	header("Location: ../index.php?page=card&card=".$id_album[0]);
	}
	else{
		header("Location: ../index.php?page=error&type=1");
	}

?>

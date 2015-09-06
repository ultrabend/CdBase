<?php
	error_reporting(0);
	session_start();
	require_once('medoo.php');
	require_once('functions.php');
	require_once('musicbrainz.php');
	$database = new medoo();

//if data exist
	if (isset($_GET['count'])) {
		$count=$_GET['count'];
		// download album info
		download_album($count);
		// download album cover
		CoverRecup($_SESSION['album'][$count]['id'],$_SESSION['album'][$count]['title']);
		// download album tracks
		$tracks = download_tracks($_SESSION['album'][$count]['id']);
		// if error try again
		if (!$tracks) {
			while(!$tracks){
				$tracks = download_tracks($_SESSION['album'][$count]['id']);
			}
		}
		// save tracks data
		for ($j=0; $j <$_SESSION['album'][$count]['disc'] ; $j++) {
			$max = $tracks['media'][$j]['track-count'];
			echo $max;
			$id_album = $database->select('base','id_album',['brainz_id'=>$_SESSION['album'][$count]['id']]);
			for ($i=0; $i <$max ; $i++) {
				$database->insert('albums',[
					'id_album'=>$id_album[0],
					'id_track'=>$tracks['media'][$j]['tracks'][$i]['number'],
					'ncd'=>$tracks['media'][$j]['position'],
					'title'=>$tracks['media'][$j]['tracks'][$i]['title'],
					'duration'=>$tracks['media'][$j]['tracks'][$i]['length']]);
			}
		}

	// erase session data
	$_SESSION['album']=array();

	header("Location: ../index.php?page=card&card=".$id_album[0]);
	}
	else{
	header("Location: index.php?page=error&type=1");
	}

?>

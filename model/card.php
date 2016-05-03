<?php
  require_once ('includes/medoo.php');
  session_start();

  function LoadCard($card){
    $database = new medoo();
    $list = $database->select('albums',
    ["[>]bands" => ["band_id" => "id"]],
    ['albums.genre','albums.title','albums.year','albums.label','bands.name','albums.nb_tracks','albums.barcode'],['albums.id'=>$card] );
    return $list;
  }

  function LoadTracks($card){
    $database = new medoo();
    $tracks = $database->select('tracks',
    ['tracks.id_track','tracks.ncd','tracks.title','tracks.duration'],['album_id'=>$card]);
    return $tracks;
  }

  function deleteCD($card){
    $database = new medoo();
    $database->delete('tracks',['album_id'=>$card]);
    $database->delete('albums',['id'=>$card]);
    header("Location: index.php?state=list.php");
  }

	if (isset($_GET['card'])) {
		$card=$_GET['card'];
		$_SESSION['card']=$_GET['card'];
		$datas = LoadCard($_GET['card']);
    $tracks = LoadTracks($_GET['card']);
  }
	else{
		echo "Card unkown";
	}
	$title=preg_replace('#[^0-9a-z]+#i', '-', $datas[0]['title']);
	$_SESSION['album']=$title;
  $i=-1;

  if (isset($_POST['go']) AND $_POST['go']=='Delete') {
    deleteCD($card);
  }

 ?>

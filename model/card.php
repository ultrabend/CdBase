<?php
  require_once ('includes/medoo.php');
  session_start();

  function LoadCard($card){
    $database = new medoo();
    $list = $database->select('albums',
    ["[>]bands" => ["id_band" => "id"]],
    ['albums.title','albums.year','bands.name','albums.label','albums.nb_tracks','albums.genre','albums.barcode'],['id_album'=>$card]);
    return $list;
  }

  function LoadTracks($card){
    $database = new medoo();
    $tracks = $database->select('albums',
    ["[>]tracks" => "id_album"],
    ['tracks.id_track','tracks.ncd','tracks.title','tracks.duration'],['id_album'=>$card]);
    return $tracks;
  }

  function deleteCD($card){
    $database = new medoo();
    $database->delete('tracks',['id_album'=>$card]);
    $database->delete('albums',['id_album'=>$card]);
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

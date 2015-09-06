<?php
  require_once ('includes/medoo.php');
  session_start();

  function LoadCard($card){
    $database = new medoo();
    $list = $database->select('base',
    ["[>]bands" => ["id_band" => "id"]],
    ['base.aTitle','base.aYear','bands.name','base.label','base.nb_tracks','base.genre','base.barcode'],['id_album'=>$card]);
    return $list;
  }

  function LoadTracks($card){
    $database = new medoo();
    $tracks = $database->select('base',
    ["[>]albums" => "id_album"],
    ['albums.id_track','albums.ncd','albums.title','albums.duration'],['id_album'=>$card]);
    return $tracks;
  }

  function deleteCD($card){
    $database = new medoo();
    $database->delete('albums',['id_album'=>$card]);
    $database->delete('base',['id_album'=>$card]);
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
	$title=preg_replace('#[^0-9a-z]+#i', '-', $datas[0]['aTitle']);
	$_SESSION['album']=$title;
  $i=-1;

  if (isset($_POST['go']) AND $_POST['go']=='Delete') {
    deleteCD($card);
  }

 ?>

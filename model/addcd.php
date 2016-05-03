<?php
  require_once ('includes/medoo.php');

  function add_artist($band){
      $database = new medoo();
      $test = $database->select('bands','id',['name'=>$band]);
      if(empty($test)){
        $database->insert('bands',['name'=>$band]);
      }
  }

  function add_album(){
      add_artist($_POST['band']);
      $database = new medoo();
      $id_band = $database->select('bands','id',['name'=>$_POST['band']]);
      $database->insert('albums',['title'=>$_POST['album'],'year'=>$_POST['year'],'band_id'=>$id_band[0],'nb_tracks'=>$_POST['tracks'],'label'=>$_POST['label'],'barcode'=>$_POST['barcode']]);
  }

	if (isset($_POST['album'])) {
		add_album();
	}
?>

<?php
  require_once ('medoo.php');
 	function CoverRecup($id,$album){
       // Le chemin de sauvegarde
        $path = '../img/covers/';
        // L'url du fichier
        $url = "http://coverartarchive.org/release/".urlencode($id)."/front";
        if (file_get_contents($url)) {
            // On coupe le chemin
            $exp = explode('/',$url);
            // On recup l'adresse du serveur
            $serv = $exp[0].'//'.$exp[2];
            // On recup le nom du fichier
            $name = array_pop($exp);
            // On genere le contexte (pour contourner les protections anti-leech)
            $xcontext = stream_context_create(array("http"=>array("header"=>"Referer: ".$serv."\r\n")));
            // On tente de recuperer l'image
            $content = file_get_contents($url,false,$xcontext);
            if ($content === false) {
                echo "\nImpossible de récuperer le fichier.";
                exit(1);
            }
            // Sinon, si c'est bon, on sauvegarde le fichier
            $album= preg_replace('#[^0-9a-z]+#i', '-', $album);
            $test = file_put_contents($path.'/'.$album.'_'.$name.'.jpg',$content);
            if ($test === false) {
                echo "\nImpossible de sauvegarder le fichier.";
                exit(1);
            }
            else{

            }
            // Tout est OK
            echo "\nSauvegarde effectuee avec succes.";
            }
  }

  function CoverDown($url,$album){
       // Le chemin de sauvegarde
        $path = 'img/covers';
        // L'url du fichier
        if (file_get_contents($url)) {
            // On coupe le chemin
            $exp = explode('/',$url);
            // On recup l'adresse du serveur
            $serv = $exp[0].'//'.$exp[2];
            // On recup le nom du fichier
            $name = array_pop($exp);
            // On genere le contexte (pour contourner les protections anti-leech)
            $xcontext = stream_context_create(array("http"=>array("header"=>"Referer: ".$serv."\r\n")));
            // On tente de recuperer l'image
            $content = file_get_contents($url,false,$xcontext);
            if ($content === false) {
                echo "\nImpossible de récuperer le fichier.";
                exit(1);
            }
            // Sinon, si c'est bon, on sauvegarde le fichier
            $album= preg_replace('#[^0-9a-z]+#i', '-', $album);
            $test = file_put_contents($path.'/'.$album.'_front.jpg',$content);
            if ($test === false) {
                echo "\nImpossible de sauvegarder le fichier.";
                exit(1);
            }
            else{

            }
            // Tout est OK
            //echo "\nSauvegarde effectuee avec succes.";
            $card=$_SESSION['card'];
            header("Location: index.php?state=card.php&card=$card");
            }
  }

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
      $database->insert('album',['title'=>$_POST['album'],'year'=>$_POST['year'],'id_band'=>$id_band[0],'nb_tracks'=>$_POST['tracks'],'label'=>$_POST['label'],'barcode'=>$_POST['barcode']]);
      echo '<div class="alert alert-success">
            <strong>Well done!</strong> Album successfully add.
            </div>';
  }

  function download_album($i){
      add_artist($_SESSION['album'][$i]['artist']);
      $database = new medoo();
      $id_band = $database->select('bands','id',['name'=>$_SESSION['album'][$i]['artist']]);
      $database->insert('albums',['brainz_album'=>$_SESSION['album'][$i]['id'],
  		'title'=>$_SESSION['album'][$i]['title'],
  		'id_band'=>$id_band[0],
  		'year'=>$_SESSION['album'][$i]['date'],
  		'barcode'=>$_SESSION['album'][$i]['barcode'],
  		'format'=>$_SESSION['album'][$i]['format'],
  		'media'=>$_SESSION['album'][$i]['disc'],
  		'nb_tracks'=>$_SESSION['album'][$i]['tracks'],
  		'label'=>$_SESSION['album'][$i]['label']]);
  }

  function download_album_Title($i){
      add_artist($_SESSION['album'][$i]['artist']);
      $database = new medoo();
      $id_band = $database->select('bands','id',['name'=>$_SESSION['album'][$i]['artist']]);
      $database->insert('albums',['brainz_album'=>$_SESSION['album'][$i]['id'],
      'title'=>$_SESSION['album'][$i]['title'],
      'id_band'=>$id_band[0],
      'year'=>$_SESSION['album'][$i]['date'],
      'barcode'=>$_SESSION['album'][$i]['barcode'],
      'format'=>$_SESSION['album'][$i]['format'],
      'media'=>$_SESSION['album'][$i]['disc'],
      'nb_tracks'=>$_SESSION['album'][$i]['tracks']]);
  }

  function download_tracks($id){
    $instance2 = new MusicBrainz;
    $data_tracks = $instance2->DiscSearch($id);
    return $data_tracks;
  }

  function LoadList($limite){
    $database = new medoo();
    $list = $database->select('albums',
    ["[>]bands" => ["id_band" => "id"]],
    ['albums.id_album','albums.title','albums.year','albums.label','bands.name'],
    ["GROUP"=>'albums.id_album',"ORDER"=>['bands.name ASC','albums.year'],"LIMIT"=>[$limite,10]]);
    return $list;
  }

  function albumStat(){
    $statbase = new medoo();
    $stat = $statbase->count('albums','id_album');
    return $stat;
  }


  function LoadCard($card){
    $database = new medoo();
    $list = $database->select('albums',
    ["[>]bands" => ["id_band" => "id"]],
    ['albums.title','albums.year','bands.name','albums.label','albums.nb_tracks','albums.genre','albums.barcode'],['id_album'=>$card]);
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
    $database->delete('tracks',['id_album'=>$card]);
    $database->delete('albums',['id_album'=>$card]);
    header("Location: index.php?state=list.php");
  }

?>

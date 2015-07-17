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

  function add_album(){
      $database = new medoo();
      $database->insert('base',['aTitle'=>$_POST['album'],'ayear'=>$_POST['year'],'band'=>$_POST['band'],'nb_tracks'=>$_POST['tracks'],'label'=>$_POST['label'],'barcode'=>$_POST['barcode']]);
      echo '<div class="alert alert-success">
            <strong>Well done!</strong> Album successfully add.
            </div>';
  }

  function LoadList($limite){
    $database = new medoo();
    $list = $database->select('base',['id_album','aTitle','aYear','band','label'],["GROUP"=>'id_album',"ORDER"=>['band ASC','aYear'],"LIMIT"=>[$limite,10]]);
    return $list;
  }

  function albumStat(){
    $statbase = new medoo();
    $stat = $statbase->count('base','id_album');
    return $stat;
  }

  /*function bandStat(){
    $statbase = new medoo();
    $stat = $statbase->count('base',['band']);
    return $stat;
  }*/

  function LoadCard($card){
    $database = new medoo();
    $list = $database->select('base',['id_band','cover','aTitle','aYear','band','label','nb_tracks','genre','barcode'],['id_album'=>$card]);
    return $list;
  }

  function deleteCD($card){
    $database = new medoo();
    $database->delete('base',['id_album'=>$card]);
    header("Location: index.php?state=list.php");
  }

?>

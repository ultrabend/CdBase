<?php
	error_reporting(0);
  session_start();
  function CoverDown($url,$album){
        $path = 'img/covers';
        if (file_get_contents($url)) {
            $exp = explode('/',$url);
            $serv = $exp[0].'//'.$exp[2];
            $name = array_pop($exp);
            $xcontext = stream_context_create(array("http"=>array("header"=>"Referer: ".$serv."\r\n")));
            $content = file_get_contents($url,false,$xcontext);
            if ($content === false) {
                echo "\nImpossible de récuperer le fichier.";
                exit(1);
            }
            $album= preg_replace('#[^0-9a-z]+#i', '-', $album);
            $test = file_put_contents($path.'/'.$album.'_front.jpg',$content);
            if ($test === false) {
                echo "\nImpossible de sauvegarder le fichier.";
                exit(1);
            }
            //echo "\nSauvegarde effectuee avec succes.";
            $card=$_SESSION['card'];
            header("Location: index.php?page=card&card=$card");
            }
            else {
              echo '<div class="alert alert-danger">
                      <strong>Oh crap!</strong> No data was recived.
                    </div>';
            }
  }
 ?>

<?php

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
?>

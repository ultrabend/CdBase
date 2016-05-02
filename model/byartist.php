<?php
      require_once ('includes/medoo.php');

      function LoadList($limite){
        $database = new medoo();
        $list = $database->select('albums',
        ["[>]bands" => ["id_band" => "id"]],
        ['albums.id_album','albums.title','albums.year','albums.label','bands.name'],
        ["bands.name[~]"=>$limite,"ORDER"=>['bands.name ASC']]);
        return $list;
      }

      function albumStat(){
        $statbase = new medoo();
        $stat = $statbase->count('albums','id_album');
        return $stat;
      }

  	if (isset($_GET['limit'])) {
  		$limit=$_GET['limit'];
  		}
  		else{
  			$limit="A%";
  		}
      $datas = LoadList($limit);
      //$stats = albumStat();
 	    $i=0;
 	    //$pagemax =$stats / 10;
?>

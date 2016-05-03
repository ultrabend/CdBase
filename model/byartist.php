<?php
      require_once ('includes/medoo.php');

      function LoadList($limite){
        $database = new medoo();
        $list = $database->select('albums',
        ["[>]bands" => ["band_id" => "id"]],
        ['albums.band_id','albums.title','albums.year','albums.label','bands.name','albums.id'],
        ["bands.name[~]"=>$limite,"ORDER"=>['bands.name ASC']]);
        return $list;
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

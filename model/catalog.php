<?php
      require_once ('includes/medoo.php');

      function LoadList($limite){
        $database = new medoo();
        $list = $database->select('albums',
        ["[>]bands" => ["band_id" => "id"]],
        ['albums.band_id','albums.title','albums.year','albums.label','bands.name','albums.id'],
        ["GROUP"=>'albums.band_id',"ORDER"=>['bands.name ASC','albums.year'],"LIMIT"=>[$limite,10]]);
        return $list;
      }

      function albumStat(){
        $statbase = new medoo();
        $stat = $statbase->count('albums','id');
        return $stat;
      }

  	if (isset($_GET['limit'])) {
  		$limit=$_GET['limit'];
  		}
  		else{
  			$limit=0;
  		}
      $datas = LoadList($limit);
      $stats = albumStat();
 	    $i=0;
 	    $pagemax =$stats / 10;
?>

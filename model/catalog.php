<?php
      require_once ('includes/medoo.php');

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
        $stat = $statbase->count('base','id_album');
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

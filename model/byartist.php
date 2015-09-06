<?php
      require_once ('includes/medoo.php');

      function LoadList($limite){
        $database = new medoo();
        $list = $database->select('base',
        ["[>]bands" => ["id_band" => "id"]],
        ['base.id_album','base.aTitle','base.ayear','base.label','bands.name'],
        ["bands.name[~]"=>$limite,"ORDER"=>['bands.name ASC']]);
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
  			$limit="A%";
  		}
      $datas = LoadList($limit);
      //$stats = albumStat();
 	    $i=0;
 	    //$pagemax =$stats / 10;
?>

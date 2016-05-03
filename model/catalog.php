<?php
      require_once ('includes/medoo.php');

      function LoadList($limite){
        $database = new medoo();
        $list = $database->select('albums',
        ["[>]bands" => ["band_id" => "id"]],
        ['albums.band_id','albums.title','albums.year','albums.label','bands.name','albums.id'],
        ["GROUP"=>'albums.id',"ORDER"=>['bands.name ASC','albums.year'],"LIMIT"=>[$limite,10]]);
        return $list;
      }

      function albumStat(){
        $statbase = new medoo();
        $stat = $statbase->count('albums','id');
        return $stat;
      }


?>

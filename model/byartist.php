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
?>

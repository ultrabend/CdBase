<div id="page-wrapper">
      	<div class="row">
      		<div class="col-md-12">
      			<h1 class="page-header style0">IMPORT WITH ALBUM TITLE</h1>
      		</div>
      	</div>
      	<div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="widget-container widget_search styled boxed-velvet">
            <table class='table'>
              <thead>
                <tr>
                  <td></td>
                  <td>Cd Id</td>
                  <td>Release</td>
                  <td>Artist</td>
                  <td>Format</td>
                  <td>Media</td>
                  <td>Tracks</td>
                  <td>Date</td>
                  <td>Country</td>
                  <td>Barcode</td>
                  <td>Import</td>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;
                //print_r($albums);
                  foreach ($albums as $album) {
                    //print_r($album);
                    $i=$i+1;
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    if (isset($album['id'])) {
                      $_SESSION['album'][$i]['brainz_album']=$album['id'];
                      echo "<td>".$album['id']."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }
                    if (isset($album['title'])) {
                      $_SESSION['album'][$i]['title']=$album['title'];
                      echo "<td>".$album['title']."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }
                    if (isset($album['artist-credit']['0']['artist']['name'])) {
                      $_SESSION['album'][$i]['band']=$album['artist-credit']['0']['artist']['name'];
                      echo "<td>".$album['artist-credit']['0']['artist']['name']."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }
                    if (isset($album['media'][0]['format'])) {
                      $_SESSION['album'][$i]['format']=$album['media'][0]['format'];
                      echo "<td>".$album['media'][0]['format']."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }
                    if (isset($album['count'])) {
                      $_SESSION['album'][$i]['media']=$album['count'];
                      echo "<td>".$album['count']."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }
                    if (isset($album['track-count'])) {
                      $_SESSION['album'][$i]['nb_tracks']=$album['track-count'];
                      echo "<td>".$album['track-count']."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }
                    if (isset($album['date'])) {
                      $_SESSION['album'][$i]['year']=$album['date'];
                      echo "<td>".$album['date']."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }
                    if (isset($album['country'])) {
                      //$_SESSION['album'][$i]['country']=$album['country'];
                      echo "<td>".$album['country']."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }
                    if (isset($album['barcode'])) {
                      $_SESSION['album'][$i]['barcode']=$album['barcode'];
                      echo "<td>".$album['barcode']."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }?>
                    <td><a class='btn btn-sm btn-warning' href="<?php echo (site_url('AddCd/save_release/').$album['id']) ?>">ok</a></td>
                    <?php
                    echo "</tr>";
                  }
                 ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-1"></div>
      	</div>
      </div>
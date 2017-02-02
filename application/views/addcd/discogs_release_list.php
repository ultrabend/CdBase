<div id="page-wrapper" class="container">
      	<div class="row">
      		<div class="col-md-12">
      			<h1 class="page-header style0">SEARCH RESULTS</h1>
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
                  <td>Band</td>
                  <td>Format</td>
                  <td>Date</td>
                  <td>Country</td>
                  <td>Barcode</td>
                  <td>Import</td>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;
                  foreach ($albums as $album) {
                    $release = explode(" - ", $album['title']);
                    $i=$i+1;
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    if (isset($album['id'])) {
                      echo "<td>".$album['id']."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }
                    if (isset($release[1])) {
                      echo "<td>".$release[1]."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }
                    if (isset($release[0])) {
                      echo "<td>".$release[0]."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }
                    if (isset($album['format'][0])) {
                      echo "<td>".$album['format'][0]."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }
                    if (isset($album['year'])) {
                      echo "<td>".$album['year']."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }
                    if (isset($album['country'])) {
                      echo "<td>".$album['country']."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }
                    if (isset($album['barcode'][0])) {
                      echo "<td>".$album['barcode'][0]."</td>";
                    }
                    else {
                      echo "<td></td>";
                    }?>
                    <td><a class='btn btn-sm btn-warning' href="<?php echo (site_url('AddCd/discogs_save_release/').$album['id']) ?>">ok</a></td>
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
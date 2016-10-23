<div id="page-wrapper">
            <div class="container-fluid">
              <div class="row">
                <div><h1 class="page-header"><?php echo $album[0]['title']; ?></h1></div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <table>
                    <tr>
                      <td>
                        <?php
                          $file="img/covers/".$album[0]['title']."_front.jpg";
                          if (file_exists($file)) {
                            echo"<img class='shadow' src='img/covers/".$title."_front.jpg' width='100%'>";
                          }
                          else{
                            echo "<img class='shadow' src='".base_url()."/assets/img/covers/cdcover.jpg' width='100%'>";
                            echo "<br>";
                            echo "<br>";
                            echo"<a href='#'><button type='button' class='btn btn-sm btn-warning'>Add Cover</button></a>";
                          }?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <br>
                        <a class='btn btn-sm btn-danger' href="<?php echo (site_url('Cards/delete/').$album['0']['id']) ?>">Delete</a>
                      </td>
                    </tr>
                  </table>

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-7">
                  <div class="row">
                    <div><h2><?php echo $album[0]['name']; ?></h2></div>
          					<div>
          						<span><strong>Release date : </strong><?php echo $album[0]['year']; ?></span><br>
                      <span><strong>Label : </strong><?php echo $album[0]['label']; ?></span><br>
                      <span><strong>Tracks : </strong><?php echo $album[0]['nb_tracks']; ?></span><br>
                      <span><strong>barcode : </strong><?php echo $album[0]['barcode']; ?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div><h3 class="page-header">Tracks</h3></div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <td>N°</td>
                            <td>Title</td>
                            <td>Duration</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i=-1;
                            foreach ($tracks AS $data) {
                              $i++; 
                              echo "<tr>";
                              echo "<td>".$data['id_track']."</td>";
                              echo "<td>".$data['title']."</td>";
                              $tmp = floor($tracks[$i]['duration'] /60000).' : '.floor(($tracks[$i]['duration'] % 60000)/1000);
                              echo "<td>".$tmp."</td>";
                              echo "</tr>";
                              }
                           ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-1">

                </div>
              </div>
            </div>
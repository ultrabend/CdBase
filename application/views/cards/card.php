<div id="page-wrapper">
            <div class="container">
              <div class="row">
                <div><h1 class="page-header"><?php echo $album[0]['title']; ?></h1></div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <table>
                    <tr>
                      <td>
                        <?php
                          $_SESSION['album'] = $album[0];                            
                          $title= preg_replace('#[^0-9a-z]+#i', '-', $album[0]['title']);
                          $file="assets/img/covers/".$title."_front.jpg";
                          if (file_exists($file)) {
                            echo"<img class='shadow' src='".base_url().$file."' width='100%'>";
                          }
                          else{
                            echo "<img class='shadow' src='".base_url()."/assets/img/covers/cdcover.jpg' width='100%'>";
                            echo "<br>";
                            echo "<br>";
                          }?>
                      </td>
                    </tr>
                    <tr>
                      <td><br>
                      <div class="row well">
                        <div><?php 
                          if (!file_exists($file)) {
                              echo '<a type="button" onclick="load_cover();"><span class="red glyphicon glyphicon-picture"> Download Cover</span></a>';} ?>
                        </div><br>
                          <div id="cover" style="display:none">
                            <?php echo form_open('AddCd/download_cover', 'role="form"');?>
                            <div class="form-group input-group">
                                <input class="form-control" name="url" placeholder="Url" id='url' required="" type="text" />
                                <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
                            </div>
                            <?php echo '</form>';?> 
                          </div>
                        <div><a target="blank" href="http://m.youtube.com/results?q=<?php echo $title; ?>"><span class="glyphicon glyphicon-headphones"> Listen</span></a></div><br>
                        <div><a href="<?php echo (site_url('Cards/delete/').$album['0']['id']) ?>"><span class="glyphicon glyphicon-trash"> Delete</span></a></div>
                      </div>
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
                              if (strpos($tracks[$i]['duration'],':')) {
                                $tmp = $tracks[$i]['duration'];
                              }
                              else{
                                $tmp = floor($tracks[$i]['duration'] /60000).' : '.floor(($tracks[$i]['duration'] % 60000)/1000);  
                              }
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
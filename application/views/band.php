<div id="page-wrapper">
            <div class="container">
              <div class="row">
                <div><h1 class="page-header"><?php echo $band[0]['name']; ?></h1></div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <table>
                    <tr>
                      <td>
                        <?php //print_r($band);                          
                          $file="assets/img/bands/".$band[0]['name'].".jpg";
                          if (file_exists($file)) {
                            echo"<img class='shadow' src='".base_url().$file."' width='400px'>";
                          }
                          else{
                            echo "<img class='shadow' src='".base_url()."/assets/img/covers/cdcover.jpg' width='50%'>";
                            echo "<br>";
                            echo "<br>";
                          }?>    
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div><h2>BIO</h2></div>
                        <div>
                          <span><strong>Country : </strong><?php echo $band[0]['country']; ?></span><br>
                          <span><strong>Area : </strong><?php echo $band[0]['area']; ?></span><br>
                          <span><strong>Year begin : </strong><?php echo $band[0]['yearbegin']; ?></span>
                        </div>        
                      </td>
                    </tr>
                  </table>                       
                </div>                
                <div class="col-md-1"></div>
                <div class="col-md-7">
                  <section>
                    <p>lorem ipsum</p>
                  </section>
                </div>
                <div class="col-md-1"></div>
              </div>
            </div>
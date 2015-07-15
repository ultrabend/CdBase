<?php
    require_once('includes/functions.php');
  	if (isset($_GET['limit'])) {
  		$limit=$_GET['limit'];
  		}
  		else{
  			$limit=0;
  		}
      $datas = LoadList($limit);
      $stats = albumStat();
      //$statbands = bandStat();
 	    $i=0;
 	    $pagemax =$stats / 10;
?>

<div id="page-wrapper">
	<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-header">Collection</h1>
      </div>
    </div>
		<div class="row">
      <div class="col-md-12">
        <div>
          <p>You actually have <?php echo $stats." albums ! "; ?></p>
			  </div>
        <br>
				<div>
          <a href="index.php?state=list.php&limit=0">0</a>
						<?php
							for ($j=1; $j<=$pagemax ; $j++) {
								echo " - "; ?>
								<a href="index.php?state=list.php&limit=<?php echo $j*10 ?>"><?php echo $j ?></a>
							<?php }	 ?>
				</div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cover</th>
                  <th>Artist/Band</th>
                  <th>Album</th>
                  <th>Date release</th>
                  <th>label</th>
                </tr>
              </thead>
              <tbody>
                 <?php
                 foreach ($datas as $data) {
                 $i++;
                 $title=preg_replace('#[^0-9a-z]+#i', '-', $data['aTitle']);
                 ?>
                 <tr>
                   <td><?php echo $i+$limit;?></td>
                   <td><a href="index.php?state=card.php&card=<?php echo $data['id_album']; ?>">
                     <?php
                       $file="img/covers/".$title."_front.jpg";
                       if (file_exists($file)) {
                         echo"<img class='shadow' src='img/covers/".$title."_front.jpg' width='100px'>";
                       }
                       else{
                         echo"<img src='img/covers/cdcover.jpg' width='100px'>";
                       }?></td>
                   <td><?php echo $data['band'];?></td>
                   <td><?php echo $data['aTitle'];?></td>
                   <td><?php echo $data['aYear'];?></td>
                   <td><?php echo $data['label'];?></td>
                 </tr>
                 <?php
                    }
                  ?>
              </tbody>
            </table>
              <div>
                <a href="index.php?state=list.php&limit=0">0</a>
                <?php
                  for ($j=1; $j<=$pagemax ; $j++) {
                    echo " - "; ?>
                    <a href="index.php?state=list.php&limit=<?php echo $j*10 ?>"><?php echo $j ?></a>
                  <?php }	 ?>
              </div>
          </div>

					</div>
        	</div>
    		</div>
		</div>
	</div>
</div>

<?php
  	if (isset($_GET['limit'])) {
  		$limit=$_GET['limit'];
  		}
  		else{
  			$limit=0;
  		}
  	$liste = $bdd->query('SELECT id_album,id_band,cover,aTitle,aYear,band,label FROM base ORDER BY band ASC LIMIT '.$limit.',10');
	$stat = $bdd->query('SELECT COUNT(id_album) AS topA ,COUNT(DISTINCT band) as topB FROM base');
	$lignestat = $stat->fetch();
 	$i=0;
 	$pagemax =$lignestat['topA'] / 10;
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
        		<div class="tab-pane clearfix fade in active">
					<div>
					    <p>You actually have <?php echo "$lignestat[topA] albums from $lignestat[topB]"; ?> Bands !</p>
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
                  <th>Rate</th>
                </tr>
              </thead>
              <tbody>
                 <?php
                while ($ligne=$liste->fetch()) {
                 $i++;
                 $title=preg_replace('#[^0-9a-z]+#i', '-', "$ligne[aTitle]");
                 ?>
                 <tr>
                   <td><?php echo $i+$limit;  ?></td>
                   <td><a href="index.php?state=card.php&card=<?php echo "$ligne[id_album]"; ?>">
                     <?php
                       $file="img/covers/".$title."_front.jpg";
                       if (file_exists($file)) {
                         echo"<img class='shadow' src='img/covers/".$title."_front.jpg' width='100px'>";
                       }
                       else{
                         echo"<img src='img/covers/cdcover.jpg' width='100px'>";
                       }
                     ?></td>
                   <td><?php echo "$ligne[band]"; ?></td>
                   <td><?php echo "$ligne[aTitle]";  ?></td>
                   <td><?php echo "$ligne[aYear]";  ?></td>
                   <td><?php echo "$ligne[label]";  ?></td>
                   <td></td>
                 </tr>
                 <?php
                    }
                   $liste->closeCursor();
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

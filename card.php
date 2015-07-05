<?php

	require_once('includes/db_connect.php');

	if (isset($_GET['card'])) {
		$card=$_GET['card'];
		$_SESSION['card']=$_GET['card'];
		$fiche = $bdd->query("SELECT brainz_id,cover,aTitle,aYear,nb_tracks,genre,band,label,barcode FROM base WHERE id_album ='$card'");
	}
	else{
		echo "Card unkown";
	}
	$extract1=$fiche->fetch();
	$title=preg_replace('#[^0-9a-z]+#i', '-', "$extract1[aTitle]");
	$_SESSION['album']=$title;
	//echo "$extract1[band]";
 ?>
<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<br>
				<div class="col-md-3">
							<?php
								$file="img/covers/".$title."_front.jpg";
				 				if (file_exists($file)) {
					 				echo"<img class='img-thumbnail' src='img/covers/".$title."_front.jpg' width='100%'>";
					 			}
					 			else{
					 				echo"<img class='img-thumbnail' src='img/covers/cdcover.jpg' width='100%'>";
					 				echo"<br>";
					 				echo"<a href='index.php?state=importcdcover.php&album=$title'><button type='button' class='btn btn-sm btn-warning'>Add Cover</button></a>";
					 			}?>
				</div>
				<div class="col-md-9">
					<div class="row titre"><h1 class="page-header"><?php echo "$extract1[aTitle]"; ?></h1></div>
					<div class="row band"><h2><?php echo "$extract1[band]"; ?></h2></div>
					<div>
						<span><strong>Release date : </strong><?php echo "$extract1[aYear]"; ?></span><br>
            <span><strong>Label : </strong><?php echo "$extract1[label]"; ?></span><br>
            <span><strong>Tracks : </strong><?php echo "$extract1[nb_tracks]"; ?></span><br>
            <span><strong>genre : </strong><?php echo "$extract1[genre]"; ?></span><br>
            <span><strong>barcode : </strong><?php echo "$extract1[barcode]"; ?></span>
          </div>
				</div>
			</div>
		</div>
</div>
<br>
<div class="row">
	<div class="tabs_framed styled">
		<div class="inner">
			<div class="tab-content clearfix">
				<div class="col-md-1"></div>
				<div class="col-md-8"></div>
				<div class="col-md-1"></div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>
</div>

<?php
session_start();
  require_once('includes/functions.php');

	if (isset($_GET['card'])) {
		$card=$_GET['card'];
		$_SESSION['card']=$_GET['card'];
		$datas = LoadCard($_GET['card']);
	}
	else{
		echo "Card unkown";
	}
	$title=preg_replace('#[^0-9a-z]+#i', '-', $datas[0]['aTitle']);
	$_SESSION['album']=$title;
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
					<div><h1 class="page-header"><?php echo $datas[0]['aTitle']; ?></h1></div>
					<div><h2><?php echo $datas[0]['band']; ?></h2></div>
					<div>
						<span><strong>Release date : </strong><?php echo $datas[0]['aYear']; ?></span><br>
            <span><strong>Label : </strong><?php echo $datas[0]['label']; ?></span><br>
            <span><strong>Tracks : </strong><?php echo $datas[0]['nb_tracks']; ?></span><br>
            <span><strong>genre : </strong><?php echo $datas[0]['genre']; ?></span><br>
            <span><strong>barcode : </strong><?php echo $datas[0]['barcode']; ?></span>
          </div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10"></div>
				<div class="col-md-2">
          <?php
          if (isset($_POST['go']) AND $_POST['go']=='Delete') {
            deleteCD($card);
          }?>
          <form method="post">
             <input type="submit" name="go" value="Delete" class='btn btn-sm btn-danger'>
           </form>
				</div>
			</div>
		</div>
</div>

<!DOCTYPE html>
<html lang="En">
    <head>
    	<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <meta name="description" content="CdBase" />
        <meta name="keywords" content="music library" />
        <meta name="author" content="ultrabend" />

        <title>Ultrabend's world</title>
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Theme CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <!-- Your CSS -->
        <link href="style.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="icon" href="img/favicon.ico" />
    </head>

<body>
    <div id="wrapper">
    <?php include('includes/menu.php');?>
      <div id="page-wrapper">
      	<div class="row">
      		<div class="col-md-12">
      			<h1 class="page-header style0">IMPORT WITH ALBUM TITLE</h1>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-md-3 center"><img src="img/musicbrainz_logo.png"></div>
      	    <div class="col-md-5">
      	        <form role='form' method='post' enctype="multipart/form/data">
      	            <div>
      								<br>
      								<br>
      								<div class="form-group input-group">
      	                <input class="form-control" name="artist" placeholder="Artist" id='artist' required="" type="text" />
      	            	</div>
                      <br>
                      <br>
                      <div class="form-group input-group">
                        <input class="form-control" name="album" placeholder="Release" id='album' required="" type="text" />
                        <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
                      </div>
      							</div>
      	        </form>
      	    </div>
      			<div class="col-md-4"></div>
      	</div>
      	<br>
      	<div class="row">
      		<div class="col-md-1"></div>
      		<div class="col-md-11">
      		<br>
      		<?php
      			if (isset($_POST['album'])) {
      				require_once('includes/releaseTitle.php');
      			}
      		 ?>
      		</div>
      	</div>
      </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

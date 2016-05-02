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
        <link href="css/portfolio-item.css" rel="stylesheet">
        <!-- Your CSS -->
        <link href="css/style.css" rel="stylesheet">
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
      			<h1 class="page-header style0">Add CD</h1>
      		</div>
      	</div>

      	<div class="row container-fluid">
      		<form role='form' method='post' enctype="multipart/form/data">
            <div class="row">
      			<div class="col-md-2"></div>
      		  <div class="col-md-4">
      		  	<div class="center">
      					<div class="form-group input-group">
      						<label>Album name</label>
      		        <input class="form-control" name="album" id='album' required="" type="text" />
      		      </div>
      					<div class="form-group input-group">
      						<label>Band name</label>
      						<input class="form-control" name="band" id='band' required="" type="text" />
      					</div>
      					<div class="form-group input-group">
      						<label>Year</label>
      						<input class="form-control" name="year" id='year' required="" type="text" />
      					</div>
      				</div>
      		  </div>
      			<div class="col-md-4">
      				<div class="form-group input-group">
      					<label>Tracks</label>
      					<input class="form-control" name="tracks" id='tracks' required="" type="text" />
      				</div>
      				<div class="form-group input-group">
      					<label>Label</label>
      					<input class="form-control" name="label" id='label' type="text" />
      				</div>
      				<div class="form-group input-group">
      					<label>Barcode</label>
      					<input class="form-control" name="barcode" id='barcode' type="text" />
      				</div>

      			</div>
      			<div class="col-md-2"></div>
            </div>
            <div class="row page-header">
              <button class="btn btn-warning" type="submit">Save</button>
            </div>
      		</form>
      	</div>
      </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

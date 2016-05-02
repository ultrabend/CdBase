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
           <h1 class="page-header style0">Import cover from url</h1>
         </div>
       </div>

       <div class="row">
         <div class="col-md-3"></div>
           <div class="col-md-6">
               <form role='form' method='post' enctype="multipart/form/data">
                     <div class="form-group input-group">
                       <input  class="form-control" name="coverurl" placeholder="Url..." id='coverurl' required="" type="text" />
                       <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
                     </div>
               </form>
           </div>
           <div class="col-md-3"></div>
       </div>

      <div class="row">
       <div class="col-md-1"></div>
       <div class="col-md-11">
       <?php
         if (isset($_POST['coverurl'])) {
           CoverDown($_POST['coverurl'],$_SESSION['album']);
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

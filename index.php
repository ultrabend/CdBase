<?php
    session_start();
    require_once('includes/db_connect.php'); ?>
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

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


        <link rel="icon" href="img/favicon.ico" />
    </head>

<body>
    <div id="wrapper">
    <?php include('menu.php');?>
        <div id="page-wrapper">
    <?php
          if (isset($_GET['state'])) {
            include($_GET['state']);
            }
            else {
                include('list.php'); }
    ?>
        </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

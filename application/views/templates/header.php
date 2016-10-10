<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="En">
    <head>
    	<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <meta name="description" content="CdBase" />
        <meta name="keywords" content="music library" />
        <meta name="author" content="ultrabend" />

        <title>CdBase</title>

        <!-- Bootstrap CSS -->
        <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Theme CSS -->
        <link href="../assets/bootstrap/css/portfolio-item.css" rel="stylesheet">
        <!-- Your CSS -->
        <link href="../assets/bootstrap/css/style.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="icon" href="img/favicon.ico" />
    </head>

        <body>
          <div id="wrapper">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
              <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../" >CdBase</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      <li><a href="index.php/Albums">Collection <span class="sr-only">(current)</span></a></li>
                      <li><a href="#">Albums by Artists<span class="sr-only">(current)</span></a></li>
                      <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add CD <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?page=barcode">By barcode</a></li>
                                <li><a href="index.php?page=bytitle">By album title</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="index.php?page=addcd">By yourself</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
              </div>
            </nav>

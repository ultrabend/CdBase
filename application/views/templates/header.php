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
        <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!-- Theme CSS -->
        <link href="<?= base_url('assets/bootstrap/css/portfolio-item.css'); ?>" rel="stylesheet">
        <!-- Your CSS -->
        <link href="<?= base_url('assets/bootstrap/css/style.css'); ?>" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?= base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

        <link rel="icon" href="img/favicon.ico" />
    </head>

        <body>
          <div id="wrapper">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
              <div class="container-fluid">
                <div class="navbar-header">
                    <a href="<?= base_url(); ?>" ><img src="<?= base_url('assets/img/logo_small.png'); ?>"></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      <li><a href="<?= site_url('Albums/index/0') ?>" >Collection <span class="sr-only">(current)</span></a></li>
                      <li><!--<a href="<?= site_url('Albums/by_artist') ?>">Albums by Artists<span class="sr-only">(current)</span></a>--></li>
                      <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add CD <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= site_url('AddCd/barcode') ?>">By barcode</a></li>
                                <li><a href="<?= site_url('AddCd/release') ?>">By album title</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?= site_url('AddCd/manual'); ?>">By yourself</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
              </div>
            </nav>

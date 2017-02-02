<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
<head>
	<style type="text/css">
	
	body {
		
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}
	</style>
</head>
<body class="container">
	<div>
		<h1>Welcome to CdBase !</h1>
		<div id="body">
			<p>New CdBase made with Code Igniter</p>
			<span><img src="<?= base_url('assets/img/logo.png'); ?>" height="300px"><strong>For Discogs and MusicBrainz</strong></span>
			<code>
				<div class="row">
					<div class="col-md-2">Version 0.3</div>
					<div class="col-md-9"></div>
					<div class="col-md-1">
						<a href="<?= site_url('Login');?>"><span class="glyphicon glyphicon-log-in"></span></a> 
					</div>
				</div>
			</code>
		</div>
	</div>
</body>
</html>

<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">IMPORT WITH ALBUM TITLE</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
	    <div class="col-md-5">
	        <form role='form' method='post' enctype="multipart/form/data">
	            <div>
								<img src="img/musicbrainz_logo.png">
								<br>
								<br>
								<div class="form-group input-group">
	                <input class="form-control" name="album" placeholder="Search..." id='album' required="" type="text" />
									<span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
	            	</div>
							</div>
	        </form>
	    </div>
			<div class="col-md-5"></div>
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

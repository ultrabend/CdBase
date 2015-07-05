<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">IMPORT WITH BARCODE</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3"></div>
	    <div class="col-md-6">
	        <form role='form' method='post' enctype="multipart/form/data">
	            <div>
								<img src="img/musicbrainz_logo.png"	>
								<br>
								<br>
								<div class="form-group input-group">
									<input  class="form-control" name="barcode" placeholder="Barcode..." id='barcode' required="" type="text" />
									<span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
								</div>
	            </div>
	        </form>
	    </div>
			<div class="col-md-3"></div>
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-11">
		<?php
			if (isset($_POST['barcode'])) {
				require_once('includes/releaseBarcode.php');
			}
		 ?>
		</div>
	</div>
</div>

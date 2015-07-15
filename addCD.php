<?php require_once ('includes/functions.php');?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Add CD</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-1"></div>
	    <div class="col-md-6">
	        <form role='form' method='post' enctype="multipart/form/data">
	            <div>
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
								<div class="form-group input-group">
									<label>Tracks</label>
									<input class="form-control" name="tracks" id='tracks' required="" type="text" />
								</div>
								<div class="form-group input-group">
									<label>Label</label>
									<input class="form-control" name="label" id='label' required="" type="text" />
								</div>
								<div class="form-group input-group">
									<label>Barcode</label>
									<input class="form-control" name="barcode" id='barcode' type="text" />
								</div>
								<button class="btn btn-default" type="submit">Save</button>
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
				add_album();
			}
		 ?>
		</div>
	</div>
</div>

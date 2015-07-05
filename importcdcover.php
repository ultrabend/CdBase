<?php include('includes/functions.php');
 ?>
 <div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Import cover from url</h1>
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

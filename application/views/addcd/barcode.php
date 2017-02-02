<div id="page-wrapper" class="container">
      	<div class="row">
      		<div class="col-md-12">
      			<h1 class="page-header style0">IMPORT WITH BARCODE</h1>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-md-3 center"><?php echo "<img src=".base_url()."assets/img/musicbrainz_logo.png>" ?></div>
      	    <div class="col-md-5">
      	        <?php echo form_open('AddCd/add_barcode', 'role="form"');?>
      	            <div>
                      <br>
                      <br>
                      <div class="form-group input-group">
                        <input class="form-control" name="barcode" placeholder="Barcode" id='barcode' required="" type="text" />
                        <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
                      </div>
      							</div>
      	        <?php echo "</form>"; ?> 
      	    </div>
      			<div class="col-md-4"></div>
      	</div>
      	<br>
      	<div class="row">
      		<div class="col-md-1"></div>
      		<div class="col-md-11">
      		<br>
      		</div>
      	</div>
      </div>
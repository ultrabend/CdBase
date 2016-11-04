<div id="page-wrapper">
      	<div class="row">
      		<div class="col-md-12">
      			<h1 class="page-header style0">IMPORT COVER FROM URL</h1>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-md-3 center"></div>
      	    <div class="col-md-5">
      	        <?php echo form_open('AddCd/download_cover', 'role="form"');?>
      	        <div>
	                <div class="form-group input-group">
	                    <input class="form-control" name="url" placeholder="Url" id='url' required="" type="text" />
	                    <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
	                </div>
      			</div>
      	        <?php echo '</form>'; ?> 
      	    </div>
      		<div class="col-md-4"></div>
      	</div>
</div>
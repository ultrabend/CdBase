<div id="page-wrapper" class="container">
      <div class="row"><div class="col-md-12">
		<h1 class="page-header style0">IMPORT WITH ALBUM TITLE</h1></div>
     	</div>
      <div class="row">
      	<div class="col-md-3 center"><?php echo "<img src=".base_url()."assets/img/discogs_logo.png width=100%>" ?></div>
            <div class="col-md-5">
                  <?php echo form_open('AddCd/discogs_release_list', 'role="form"');?>
      	      <div><br>
      			<div class="form-group input-group">
                              <input class="form-control" name="artist" placeholder="Artist" id='artist' required="" type="text" /></div>
                        <div class="form-group input-group">
                              <input class="form-control" name="album" placeholder="Release" id='album' required="" type="text" /><span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
                        </div>
      		</div>
      	      <?php echo '</form>'; ?> 
            </div>
            <div class="col-md-4"></div>
      </div><br>
      <div><span>(no cover art will be donwloaded)</span></div>
</div>
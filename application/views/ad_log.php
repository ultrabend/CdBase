<div id="page-wrapper">
      	<div class="row">
      		<div class="col-md-12">
      			<h1 class="page-header style0">Log In</h1>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-md-4 center"></div>
      	    <div class="col-md-4">
                  <?php echo form_open('Cdking/logged', 'role="form"');?>
                  <div class="form-group input-group">
                        <input class="form-control" name="name" placeholder="Admin" id='name' required="" type="text" />
                        <br>
                        <br>
                        <input class="form-control" name="xword" placeholder="Password" id='xword' required="" type="text" />
                        <br>                        
                        <br>                        
                        <button class="btn btn-warning" type="submit">OK</button></span>
                  </div>
      	     <?php echo "</form>"; ?> 
      	     </div>
      	     <div class="col-md-4"></div>
      	</div>
</div>
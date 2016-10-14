<div id="page-wrapper">
      <div class="row">
            <div class="col-md-12">
      	     <h1 class="page-header style0">Add CD</h1>
      	</div>
      </div>
      	
      <div class="row container-fluid">
            <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-4">
                        <?php 
                        //$attribute = array('role' => form, );
                        echo form_open('AddCd/addman', 'role="form"');?>
                        <div class='form-group input-group'><?php
                        echo form_label('Album Title');
                        echo form_input(array('id'=>'album','name'=>'album' ,'class'=>'form-control','required'=>'ok')); echo "<br/>";
                        echo "</div>";
                        echo "<div class='form-group input-group'>";
                        echo form_label('Band name');
                        echo form_input(array('id'=>'name','name'=>'name','class'=>'form-control','required'=>''));echo "<br/>";
                        echo "</div>";
                        echo "<div class='form-group input-group'>";
                        echo form_label('Year');
                        echo form_input(array('id'=>'year','name'=>'year','class'=>'form-control','required'=>''));
                        echo "</div>";
                        ?>  
                  </div>
                  <div class="col-md-4">
                        <?php 
                        echo "<div class='form-group input-group'>";
                        echo form_label('Number of tracks');
                        echo form_input(array('id'=>'tracks','name'=>'tracks','class'=>'form-control','required'=>''));echo "<br/>";
                        echo "</div>";
                        echo "<div class='form-group input-group'>";
                        echo form_label('Label name');
                        echo form_input(array('id'=>'label','name'=>'label','class'=>'form-control','required'=>''));echo "<br/>";
                        echo "</div>";
                        echo "<div class='form-group input-group'>";
                        echo form_label('Barcode');
                        echo form_input(array('id'=>'barcode','name'=>'barcode','class'=>'form-control','required'=>''));echo "<br/>";
                        echo "</div>";
                        echo form_submit(array('id'=>'submit','value'=>'SAVE','class'=>'btn btn-warning'));
                        echo form_close();
                        ?>  
                  </div>
                  <div class="col-md-2"></div>
            </div>
            
      </div>
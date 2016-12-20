<div class="container">
     <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-6">
               <h1>Settings access</h1>
          </div>
          <div class="col-md-6 col-lg-6 col-sm-6"></div>
     </div>
</div>
<hr/>

<div class="container">
     <div class="row">
          <div class="col-md-4 col-lg-4 col-sm-4"></div>
          <div class="col-md-4 col-lg-4 col-sm-4 well">
               <?php $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                    echo form_open("login/index", $attributes);
               ?>
               <fieldset>
                    <legend>Login</legend>
                    <div class="form-group">
                         <div class="row">
                              <div class="col-md-1 col-lg-1 col-sm-1"></div>
                              <div class="col-md-3 col-lg-3 col-sm-3">
                                   <label for="input-username" class="control-label">Username</label>
                              </div>
                              <div class="col-md-8 col-lg-8 col-sm-8">
                                   <input class="form-control" id="input-username" name="input-username" placeholder="Username" type="text" value="<?php echo set_value('input-username'); ?>" />
                                   <span class="text-danger"><?php echo form_error('input-username'); ?></span>
                              </div>
                         </div>
                    </div>
                    
                    <div class="form-group">
                         <div class="row">
                              <div class="col-md-1 col-lg-1 col-sm-1"></div>
                              <div class="col-md-3 col-lg-3 col-sm-3">
                                   <label for="input-password" class="form-control-label">Password</label>
                              </div>
                              <div class="col-md-8 col-lg-8 col-sm-8">
                                   <input class="form-control" id="input-password" name="input-password" placeholder="Password" type="password" value="<?php echo set_value('input-password'); ?>" />
                                   <span class="text-danger"><?php echo form_error('input-password'); ?></span>
                              </div>
                         </div>
                    </div>
                                   
                    <div class="form-group">
                         <div class="col-md-12 col-lg-12 col-sm-12 text-right">
                              <input id="btn_login" name="btn_login" type="submit" class="btn btn-primary" value="Login"  />
                         </div>
                    </div>
               </fieldset>
               <?php echo form_close(); ?>
               <?php echo $this->session->flashdata('msg'); ?>
          </div>
     </div>
</div>
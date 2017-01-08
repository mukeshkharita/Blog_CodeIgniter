<?php include('public_header.php');?>

<div class="container">

	<?php echo form_open('login/admin_login',['class'=>'form-horizontal']); ?>
  <fieldset>
    <legend>Admin Login</legend>
    <?php $error = $this->session->flashdata('login_failed') ?>
    <?php if($error): ?>
    <div class="row">
      <div class="col-lg-6">
        <div class="alert alert-dismissible alert-danger">
          <?= $error ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-6">
      	<?php echo form_input(['name'=>'username','class'=>'form-control','placeholder'=>'Username','value'=>set_value('username')]); ?>
        <?php echo form_error('username'); ?>
       <!-- <input class="form-control" id="inputEmail" placeholder="Email" type="text"> -->
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-6">
      	<?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password']); ?>
        <?php echo form_error('password'); ?>
        <!--<input class="form-control" id="inputEmail" placeholder="Password" type="text"> -->
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-lg-6 col-lg-offset-2">
      	<?php 
      	echo form_reset(['name'=>'submit','value'=>'reset','class'=>'btn btn-frfault']);
      	echo form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-primary']); ?>
       <!-- <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button> -->
      </div>
    </div>
  </fieldset>
</form>
</div>


<?php include('public_footer.php');?>

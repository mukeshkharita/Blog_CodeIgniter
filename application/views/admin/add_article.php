<?php include_once('admin_header.php');?>

<div class="container">

	<?php echo form_open_multipart('admin/store_article',['class'=>'form-horizontal']); ?>
    <fieldset>
    <legend>Add Article</legend>
   
    <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">Title</label>
      <div class="col-lg-8">
      	<?php echo form_input(['name'=>'title','class'=>'form-control','placeholder'=>'Title','value'=>set_value('title')]); ?>
        <?php echo form_error('title'); ?>
       <!-- <input class="form-control" id="inputEmail" placeholder="Email" type="text"> -->
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">Article Body</label>
      <div class="col-lg-8">
      	<?php echo form_textarea(['name'=>'body','class'=>'form-control','placeholder'=>'Article Body','value'=>set_value('body')]); ?>
        <?php echo form_error('body'); ?>
        <!--<input class="form-control" id="inputEmail" placeholder="Password" type="text"> -->
      </div>
    </div>

    <?php echo form_hidden('user_id',$this->session->userdata('user_id'));?>
    <?php echo form_hidden('created_at',date('Y-m-d H:i:s')) ?>

    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="inputEmail" class="col-lg-4 control-label">Select Image</label>
          <div class="col-lg-8">

          <?php echo form_upload(['name'=>'image','class'=>'form-control']); ?>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <?php if(isset($upload_error)) echo $upload_error ?>
      </div>
  </div>

    <div class="form-group">
      <div class="col-lg-6 col-lg-offset-6">
      	<?php 
      	echo form_reset(['name'=>'submit','value'=>'reset','class'=>'btn btn-default']);
      	echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-primary']); ?>
       <!-- <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button> -->
      </div>
    </div>
  </fieldset>
</form>
</div>

<?php include_once('admin_footer.php');?>

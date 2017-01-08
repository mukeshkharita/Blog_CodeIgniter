<?php include_once('admin_header.php');?>

<div class="container">

	<?php echo form_open("admin/update_article/{$article->id}",['class'=>'form-horizontal']); ?>
    <fieldset>
    <legend>Edit Article</legend>
   
    <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">Title</label>
      <div class="col-lg-8">
      	<?php echo form_input(['name'=>'title','class'=>'form-control','placeholder'=>'Title','value'=>set_value('title',$article->title)]); ?>
        <?php echo form_error('title'); ?>
       <!-- <input class="form-control" id="inputEmail" placeholder="Email" type="text"> -->
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">Article Body</label>
      <div class="col-lg-8">
      	<?php echo form_textarea(['name'=>'body','class'=>'form-control','placeholder'=>'Article Body','value'=>set_value('body',$article->body)]); ?>
        <?php echo form_error('body'); ?>
        <!--<input class="form-control" id="inputEmail" placeholder="Password" type="text"> -->
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

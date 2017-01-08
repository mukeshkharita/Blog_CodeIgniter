<?php include_once('admin_header.php'); ?>


<div class="container">
	<div class="row">
		<div class="col-lg-1 col-lg-offset-11">
			<!-- <a href="" class="btn btn-lg btn-primary pull right">Add Article</a> -->
			<?= anchor('admin/add_article','Add Article',['class'=>'btn btn-lg btn-primary pull right']) ?>
		</div>
	</div>
	 <?php $feedback = $this->session->flashdata('feedback');
	 $feedback_class = $this->session->flashdata('feedback_class'); ?>
    <?php if($feedback): ?>
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <div class="alert alert-dismissible <?= $feedback_class ?>">
          <?= $feedback ?>
        </div>
      </div>
    </div>
    <?php endif; ?>
	<table class="table">
		<thead>
			<th>Sr. No.</th>
			<th>Title</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php if(count($articles)):
			$count = $this->uri->segment(3, 0); ?>
				<?php foreach ($articles as $article): ?>
				<tr>
					<td><?= ++$count ?></td>
					<td><?= $article->title?></td>
					<td>
						<?= anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-primary']); ?>
						<!--<button class="btn btn-primary">Edit</button>-->
					</td>
					<td>

						<?=
							form_open('admin/delete_article'),
							form_hidden('article_id',$article->id),
							form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']);
							form_close();
						?>
						<!-- <button class="btn btn-danger">Delete</button> -->
					</td>
				</tr>
				<?php endforeach; ?>
			<?php else:?>
				<tr>
					<td colspan="3">
						No Records Found.
					</td>
				</tr>
		<?php endif;?>
		</tbody>
		
	</table>
	<?= $this->pagination->create_links() ?>
</div>


<?php include_once('admin_footer.php'); ?>
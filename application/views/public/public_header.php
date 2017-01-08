<!DOCTYPE html>
<html>
<head>
	<title>Articles</title>
	<?= link_tag('assets/css/bootstrap.min.css') ?>
</head>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Articles</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <?= form_open('user/search',['class'=>'navbar-form navbar-left','role'=>'search']); ?>
        <div class="form-group">
          <input type="text" name="query" class="form-control" placeholder="Search" type="text">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      <?= form_close() ?>
      <?= form_error('query',"<p class='navbar-text text-danger'>",'</p>'); ?>
      <ul class="nav navbar-nav navbar-right">
        <?= anchor('login','Login',['class'=>'btn btn-primary']) ?>
      </ul>
    </div>
  </div>
</nav>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
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
      <a class="navbar-brand" href="#">Admin Panel</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      
      <ul class="nav navbar-nav navbar-right">
        <!--<li><a href="<?php base_url('login/logout'); ?>">Logout</a></li>  -->
       <li><?= anchor('login/logout','Logout',['class'=>'btn']) ?> </li>
      </ul>
    </div>
  </div>
</nav>
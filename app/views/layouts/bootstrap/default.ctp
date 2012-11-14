<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<title><?php echo $title_for_layout; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

	<link href="/css/app.css" rel="stylesheet">

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="/bootstrap/ico/favicon.ico">
  </head>

  <body>

	<div class="navbar navbar-fixed-top" id="topBar">
	  <div class="navbar-inner">
		<div class="container-fluid">
		  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <a class="brand" href="/">Mango</a>
		  <div class="btn-group pull-right">
			<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			  <i class="icon-user"></i> Username
			  <span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
			  <li><a href="#">Profile</a></li>
			  <li class="divider"></li>
			  <li><a href="#">Sign Out</a></li>
			</ul>
		  </div>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li class="active"><a href="/items">Товари</a></li>
			  <li><a href="/categories">Категорії</a></li>
			</ul>
		  </div>
		</div>
	  </div>
	</div>

	<div class="container-fluid">
	  <div class="row-fluid">
		
		<!--<div class="span2" id="sidebar">
		  <div class="well sidebar-nav">
			<ul class="nav nav-list">
			  <li class="nav-header">Content</li>
			  <li><a href="#"><i class="icon-home"></i> Home</a></li>
			  <li class="active"><a href="#"><i class="icon-th"></i> Pages</a></li>
			  <li><a href="/posts"><i class="icon-file"></i> Posts</a></li>
			  <li><a href="/photos"><i class="icon-camera"></i> Photos</a></li>
			  <li class="nav-header">System</li>
			  <li><a href="#"><i class="icon-list"></i> Categories</a></li>
			  <li><a href="#"><i class="icon-user"></i> Users</a></li>
			  <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
			</ul>
		  </div>
		</div>-->

		<div class="span12" id="viewPlace">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div><!--/span-->
	  </div><!--/row-->

	  <hr>

	  <footer>
		<p>&copy; Estrolix 2012</p>
	  </footer>

	</div><!--/.fluid-container-->

	<?php //echo $this->element('sql_dump'); ?>

	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="/js/jquery.js"></script>
	
	<script src="/bootstrap/js/bootstrap-alert.js"></script>
	<script src="/bootstrap/js/bootstrap-dropdown.js"></script>
	<script src="/bootstrap/js/bootstrap-button.js"></script>
	<script src="/bootstrap/js/bootstrap-typeahead.js"></script>

	<!--
	<script src="/bootstrap/js/bootstrap-transition.js"></script>
	<script src="/bootstrap/js/bootstrap-modal.js"></script>
	<script src="/bootstrap/js/bootstrap-scrollspy.js"></script>
	<script src="/bootstrap/js/bootstrap-tab.js"></script>
	<script src="/bootstrap/js/bootstrap-tooltip.js"></script>
	<script src="/bootstrap/js/bootstrap-popover.js"></script>
	<script src="/bootstrap/js/bootstrap-collapse.js"></script>
	<script src="/bootstrap/js/bootstrap-carousel.js"></script>
	-->

  </body>
</html>
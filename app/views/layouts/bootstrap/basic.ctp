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

			<style type="text/css">
			body {
				padding-top: 20px;
				padding-bottom: 40px;
			}

			/* Custom container */
			.container-narrow {
				margin: 0 auto;
				max-width: 700px;
			}
			.container-narrow > hr {
				margin: 30px 0;
			}

			.jumbotron {
				margin: 60px 0;
				text-align: center;
			}
			.jumbotron h1 {
				font-size: 72px;
				line-height: 1;
			}
			.jumbotron .btn {
				font-size: 21px;
				padding: 14px 24px;
			}
		</style>


	
	</head>

	<body>

	<div class="container-narrow">

		<div class="masthead">
		<ul class="nav nav-pills pull-right">
			<li class="active"><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
		<h3 class="muted">Миколай про тебе не забуде</h3>
		</div>

		<hr>

		<?php echo $content_for_layout; ?>

		<hr>

		<div class="footer">
		<p>&copy; Estrolix 2012</p>
		</div>

	</div> <!-- /container -->

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
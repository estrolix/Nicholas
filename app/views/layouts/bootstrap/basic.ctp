<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title_for_layout; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

		<link href="/css/app.css" rel="stylesheet">
		<?php echo $this->Html->css('bootstrap/app'); ?>

		<?php echo $this->Html->script('jquery'); ?>
		<?php echo $this->Html->script('bootstrap/app'); ?>

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="/bootstrap/ico/favicon.ico">

	</head>

	<body>

	<div class="container-narrow">

		<?php echo $content_for_layout; ?>

	</div>

	<?php //echo $this->element('sql_dump'); ?>

	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	
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

	<?php echo $this->Html->script('jquery.validate.min'); ?>

	</body>
</html>
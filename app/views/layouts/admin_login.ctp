<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="robots" content="noindex,nofollow" />
	<?php
		echo $this->Html->meta('icon');
		//echo $this->Html->css('cake.generic');
        echo $this->Html->css(array('admin/reset.css', 'admin/main.css'));
    ?>
        
        
        <!--[if lte IE 6]><?php echo $this->Html->css('admin/main-ie6.css') ?><![endif]--> 
    <?php
        echo $this->Html->css(array('admin/style.css', 'admin/mystyle.css'));
        echo $this->Javascript->link(array('jquery-1.5.2.min.js', 'admin/jquery.tablesorter.js', 'admin/jquery.switcher.js', 'admin/toggle.js', 'admin/ui.core.js', 'admin/ui.tabs.js', 'admin/main.js'));
		echo $scripts_for_layout;
	?>
	<title>
		<?php echo $title_for_layout; ?>
        <?php __(' - Medical Telephone'); ?>
	</title>
</head>

<body id="login">

<div id="main-02">

	<div id="login-top"></div>

	<div id="login-box">

		<!-- Logo -->
		<p class="nom t-center"><a href="<?php echo $this->Html->url('/') ?>"><?php echo $this->Html->image('admin/logo_login.png', array('alt' => 'Our logo', 'title' => 'Visit Site')) ?></a></p>

        <?php echo $content_for_layout; ?>

	</div> <!-- /login-box -->

	<div id="login-bottom"></div>

</div> <!-- /main -->
<?php echo $this->element('sql_dump'); ?>
</body>
</html>

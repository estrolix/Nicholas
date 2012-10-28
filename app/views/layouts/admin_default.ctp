<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'Миколай :)'; ?>
	</title>
		<?php echo $this->Html->css(array('admin/reset.css', 'admin/main.css')); ?>
        <?php echo $this->Html->css('admin/2col.css', 'alternate stylesheet', array('title' => '2col')) ?>
        <?php echo $this->Html->css('admin/1col.css', 'alternate stylesheet', array('media' => 'screen,projection', 'title' => '1col')) ?>
        <!--[if lte IE 6]><?php echo $this->Html->css('admin/main-ie6.css') ?><![endif]--> 
    <?php
        echo $this->Html->css(array('admin/style.css', 'admin/mystyle.css', 'admin/general'));
        echo $this->Html->css(array('tokeninput/token-input-facebook'));
        echo $this->Javascript->link(array('jquery-1.5.2.min.js', 'jquery.tmpl.min.js', 'tiny_mce/tiny_mce.js', 'common_functions.js', 'admin/jquery.tablesorter.js', 'admin/jquery.switcher.js', 'admin/toggle.js', 'admin/ui.core.js', 'admin/ui.tabs.js', 'admin/main.js', 'general', 'maps', 'jquery.tokeninput', 'jquery.dualListBox-1.3.min'));
		echo $scripts_for_layout;
	?>

    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
    
</head>
<body>
<div id="main">

	<!-- Tray -->
	<div id="tray" class="box">

		<p class="f-left box">

			<!-- Switcher -->
			<span class="f-left" id="switcher">
				<a href="#" rel="1col" class="styleswitch ico-col1" title="Приховати меню"><?php echo $this->Html->image('admin/switcher-1col.gif', array('alt' => '1 Column', 'title' => 'Приховати меню')) ?></a>
				<a href="#" rel="2col" class="styleswitch ico-col2" title="Показати меню"><?php echo $this->Html->image('admin/switcher-2col.gif', array('alt' => '2 Column', 'title' => 'Показати меню')) ?></a>
			</span>

			Миколай про тебе не забуде <strong>:)</strong>

		</p>
        <?php if (!empty($loged_user)): ?>
		<p class="f-right">User: <strong><a href="#"><?php echo $loged_user['User']['username'] ?></a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><?php echo $this->Html->link(__('Log out', true), array('controller' => 'users', 'action' => 'logout', 'admin' => false), array('id' => 'logout')); ?></strong></p>
        <?php endif; ?>

	</div> <!--  /tray -->

	<hr class="noscreen" />

	<!-- Menu -->
	<div id="menu" class="box">
        
        <?php /* ?>
		<ul class="box f-right">
			<li><a href="#"><span><strong>Visit Site &raquo;</strong></span></a></li>
		</ul>
        <?php */ ?>

		<ul class="box">
			<li><a href="<?php echo $this->Html->url('/') ?>"><span><?php __('Головна') ?></span></a></li> <!-- Active -->

			<li onmouseover="this.className = 'dropdown-on'" onmouseout="this.className = 'dropdown-off'">
				<div><a href="<?php echo $this->Html->url(array('controller' => 'children', 'action' => 'index')) ?>"><span><?php __('Список дітей') ?></span></a>
					<!-- Dropdown menu -->
					<div class="drop">
						<ul class="box">
							<li><a href="<?php echo $this->Html->url(array('controller' => 'children', 'action' => 'index')) ?>"><?php __('Переглянути список') ?></a></li>
							<li><a href="<?php echo $this->Html->url(array('controller' => 'children', 'action' => 'add')) ?>"><?php __('Додати') ?></a></li>
							<li><a href="<?php echo $this->Html->url(array('controller' => 'children', 'action' => 'deleted')) ?>"><?php __('Видалені') ?></a></li>
						</ul>
					</div> <!-- /drop -->
				</div>
			</li>

			<li onmouseover="this.className = 'dropdown-on'" onmouseout="this.className = 'dropdown-off'">
				<div><a href="<?php echo $this->Html->url(array('controller' => 'volunteers', 'action' => 'index')) ?>"><span><?php __('Список волонтерів') ?></span></a>
					<!-- Dropdown menu -->
					<div class="drop">
						<ul class="box">
							<li><a href="<?php echo $this->Html->url(array('controller' => 'volunteers', 'action' => 'index')) ?>"><?php __('Переглянути список') ?></a></li>
							<li><a href="<?php echo $this->Html->url(array('controller' => 'volunteers', 'action' => 'add')) ?>"><?php __('Додати') ?></a></li>
						</ul>
					</div> <!-- /drop -->
				</div>
			</li>

			<li onmouseover="this.className = 'dropdown-on'" onmouseout="this.className = 'dropdown-off'">
				<div><a href="<?php echo $this->Html->url(array('controller' => 'teams', 'action' => 'index')) ?>"><span><?php __('Групи волонтерів') ?></span></a>
					<!-- Dropdown menu -->
					<div class="drop">
						<ul class="box">
							<li><a href="<?php echo $this->Html->url(array('controller' => 'teams', 'action' => 'index')) ?>"><?php __('Переглянути список') ?></a></li>
							<li><a href="<?php echo $this->Html->url(array('controller' => 'teams', 'action' => 'add')) ?>"><?php __('Додати') ?></a></li>
						</ul>
					</div> <!-- /drop -->
				</div>
			</li>			

			<li onmouseover="this.className = 'dropdown-on'" onmouseout="this.className = 'dropdown-off'">
				<div><a href="<?php echo $this->Html->url(array('controller' => 'actions', 'action' => 'index')) ?>"><span><?php __('Акції') ?></span></a>
					<!-- Dropdown menu -->
					<div class="drop">
						<ul class="box">
							<li><a href="<?php echo $this->Html->url(array('controller' => 'actions', 'action' => 'index')) ?>"><?php __('Переглянути список') ?></a></li>
							<li><a href="<?php echo $this->Html->url(array('controller' => 'actions', 'action' => 'add')) ?>"><?php __('Додати') ?></a></li>
						</ul>
					</div> <!-- /drop -->
				</div>
			</li>
            
            <li onmouseover="this.className = 'dropdown-on'" onmouseout="this.className = 'dropdown-off'"><div><a href="<?php echo $this->Html->url('#') ?>"><span><?php __('Додатково') ?></span></a>
				<!-- Dropdown menu -->
				<div class="drop">
					<ul class="box">                        
                        <li><?php echo $this->Html->link('Вулиці', array('controller' => 'streets', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('Категорії', array('controller' => 'categories', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('Джерела внесення в список', array('controller' => 'sources', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('Причини видалення зі списку', array('controller' => 'delete_reasons', 'action' => 'index')); ?></li>
					</ul>
				</div> <!-- /drop -->
			</div></li>

		</ul>
		
	</div> <!-- /header -->

	<hr class="noscreen" />

	<!-- Columns -->
	<div id="cols" class="box">

		<!-- Aside (Left Column) -->
		<div id="aside" class="box">

			<div class="padding box">

				<!-- Logo (Max. width = 200px) -->
				<p id="logo"><a href="<?php echo $this->Html->url('/') ?>"><?php echo $this->Html->image('logo.png', array('alt' => 'Лого')) ?></a></p>

			</div> <!-- /padding -->
            
			<?php /* <div class="menu-title">Загальне</div> */ ?>
            
            <div class="menu-title">Списки дітей</div>
            
            <ul class="box">
                <li>
                    <?php echo $this->Html->link('Переглянути список', array('controller' => 'children', 'action' => 'index')); ?>
                    <?php echo $this->Html->link('Додати в список', array('controller' => 'children', 'action' => 'add')); ?>
                    <?php echo $this->Html->link('Видалені', array('controller' => 'children', 'action' => 'deleted')); ?>
                </li>
            </ul>
            
            <?php /*
            <div class="menu-title">Волонтери</div>
            
            <ul class="box">
                <li>
                    <a href="">Переглянути список</a>
                    <a href="">Додати в список</a>
                    <a href="">Видалені</a>
                </li>
            </ul>
            
            */ ?>
            
            <div class="menu-title">Додатково</div>
            <ul class="box">
                <li>
                    <?php echo $this->Html->link('Вулиці', array('controller' => 'streets', 'action' => 'index')); ?>
                    <?php echo $this->Html->link('Категорії', array('controller' => 'categories', 'action' => 'index')); ?>
                    <?php echo $this->Html->link('Джерела внесення в список', array('controller' => 'sources', 'action' => 'index')); ?>
                    <?php echo $this->Html->link('Причини видалення зі списку', array('controller' => 'delete_reasons', 'action' => 'index')); ?>
                </li>
            </ul>

		</div> <!-- /aside -->

		<hr class="noscreen" />

		<!-- Content (Right Column) -->
		<div id="content" class="box">
            <?php echo $content_for_layout; ?>
		</div> <!-- /content -->
	</div> <!-- /cols -->

	<hr class="noscreen" />

	<!-- Footer -->
	<div id="footer" class="box">

		<p class="f-left"><a href="<?php echo $this->Html->url('/') ?>">Estrolix</a> &copy; 2011 All Rights Reserved.</p>

		<p class="f-right">Templates by <a href="http://www.adminizio.com/">Adminizio</a></p>

	</div> <!-- /footer -->

</div> <!-- /main -->
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
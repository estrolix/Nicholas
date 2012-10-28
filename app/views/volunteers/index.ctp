<div class="page_volunteers index">
	<h1><?php __('Список волонтерів');?></h1>
   
	<?php echo $this->Session->flash(); ?>

	<p>
		<a href="<?php echo $this->Html->url(array('controller' => 'volunteers', 'action' => 'add')); ?>" class="btn-create"><span>Додати</span></a>
	</p>
	<br /><br /><br />
    
    <?php echo $this->element('volunteers/list'); ?>
    
</div>
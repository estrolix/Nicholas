<div class="page_children index">
	<h1><?php __('Список дітей');?></h1>
   
	<?php echo $this->Session->flash(); ?>

	<p>
		<a href="<?php echo $this->Html->url(array('controller' => 'children', 'action' => 'add')); ?>" class="btn-create"><span>Додати</span></a>
		<a href="<?php echo $this->Html->url(array('controller' => 'children', 'action' => 'deleted')); ?>" class="btn-delete"><span>Видалені</span></a>
	</p>
	<br /><br />
    
    <?php echo $this->element('childrenSearch'); ?>
    
    <?php echo $this->element('children/list'); ?>
    
</div>
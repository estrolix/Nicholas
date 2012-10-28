<div class="page_reasons form">
<h1><?php __('Edit Reason'); ?></h1>

<?php echo $this->Session->flash(); ?>
<br />
<?php echo $this->Form->create('Reason');?>
        <table class="nostyle">
        
            <?php
            $input_options = array(
                'div' => false,
                'before' => '<tr><td>',
                'after' => '</td></tr>',
                'between' => '</td><td>',
                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                'class' => 'input-text'
            );
            ?>
                
	<?php
		echo $this->Form->input('id', $input_options);
		echo $this->Form->input('title', $input_options);
        //<!-- HABTM -->
        		echo $this->Form->input('Delete', $input_options);
	?>
<tr><td colspan="2" class="t-right"><?php echo $this->Form->submit(__(' Edit ', true), array('class' => 'input-submit')); ?></td></tr>	</table>
<?php echo $this->Form->end();?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Reason.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Reason.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Reasons', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Children', true), array('controller' => 'children', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Child', true), array('controller' => 'children', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deletes', true), array('controller' => 'deletes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delete', true), array('controller' => 'deletes', 'action' => 'add')); ?> </li>
	</ul>
</div>
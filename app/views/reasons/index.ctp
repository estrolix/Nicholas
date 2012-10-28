<div class="page_reasons index">
	<h1><?php __('Reasons');?></h1>
    
    <?php echo $this->Session->flash(); ?>
        
    <br />
	<table cellpadding="0" cellspacing="0" class="tablesorter">
    <?php 
        $sortKey = $this->Paginator->sortKey(); 
        $sortDir = $this->Paginator->sortDir(); 
    ?>
    	<tr>
			<th class="header <?php if($sortKey == 'Reason.id' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Reason.id' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('id');?></th>
			<th class="header <?php if($sortKey == 'Reason.title' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Reason.title' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('title');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($reasons as $reason):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="even"';
		} else {
            $class = ' class="odd"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $reason['Reason']['id']; ?>&nbsp;</td>
		<td><?php echo $reason['Reason']['title']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link($this->Html->image('admin/ico-delete.gif', array('alt' => __('Delete', true), 'title' => __('Delete', true), 'class' => 'ico')), array('action' => 'delete', $reason['Reason']['id']), array('escape' => false), sprintf(__('Are you sure you want to delete # %s?', true), $reason['Reason']['id'])); ?>
			<?php echo $this->Html->link($this->Html->image('admin/ico-edit.gif', array('alt' => __('Edit', true), 'title' => __('Edit', true), 'class' => 'ico')), array('action' => 'edit', $reason['Reason']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('admin/ico-show.gif', array('alt' => __('Show', true), 'title' => __('Show', true), 'class' => 'ico')), array('action' => 'view', $reason['Reason']['id']), array('escape' => false)); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
    
	<?php echo $this->element('paginator_bottom'); ?>
    </div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Reason', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Children', true), array('controller' => 'children', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Child', true), array('controller' => 'children', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deletes', true), array('controller' => 'deletes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delete', true), array('controller' => 'deletes', 'action' => 'add')); ?> </li>
	</ul>
</div>
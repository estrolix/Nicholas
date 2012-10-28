<div class="page_delete_reasons index">
	<h1><?php __('Причини видалення дітей зі списку');?></h1>
    
    <?php echo $this->Session->flash(); ?>
    
    <p>
        <a href="<?php echo $this->Html->url(array('controller' => 'delete_reasons', 'action' => 'add')); ?>" class="btn-create"><span>Додати</span></a>
    </p>
        
    <br /><br /><br />
    
	<table cellpadding="0" cellspacing="0" class="tablesorter">
    <?php 
        $sortKey = $this->Paginator->sortKey(); 
        $sortDir = $this->Paginator->sortDir(); 
    ?>
    	<tr>
			<th class="header <?php if($sortKey == 'DeleteReason.id' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'DeleteReason.id' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th class="header <?php if($sortKey == 'DeleteReason.title' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'DeleteReason.title' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Назва', 'title');?></th>
			<th class="actions"><?php __('Дії');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($deleteReasons as $deleteReason):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="even"';
		} else {
            $class = ' class="odd"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $deleteReason['DeleteReason']['id']; ?>&nbsp;</td>
		<td><?php echo $deleteReason['DeleteReason']['title']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link($this->Html->image('admin/ico-delete.gif', array('alt' => __('Видалити', true), 'title' => __('Видалити', true), 'class' => 'ico')), array('action' => 'delete', $deleteReason['DeleteReason']['id']), array('escape' => false), 'Ви дійсно хочете видалити цю причину?'); ?>
			<?php echo $this->Html->link($this->Html->image('admin/ico-edit.gif', array('alt' => __('Редагувати', true), 'title' => __('Редагувати', true), 'class' => 'ico')), array('action' => 'edit', $deleteReason['DeleteReason']['id']), array('escape' => false)); ?>
			<?php //echo $this->Html->link($this->Html->image('admin/ico-show.gif', array('alt' => __('Переглянути', true), 'title' => __('Переглянути', true), 'class' => 'ico')), array('action' => 'view', $deleteReason['DeleteReason']['id']), array('escape' => false)); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
    
	<?php echo $this->element('paginator_bottom'); ?>
</div>
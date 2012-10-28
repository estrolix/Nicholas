<div class="page_sources index">
	<h1><?php __('Джерела внесення дітей в список');?></h1>
    
    <?php echo $this->Session->flash(); ?>
    
    <p>
        <a href="<?php echo $this->Html->url(array('controller' => 'sources', 'action' => 'add')); ?>" class="btn-create"><span>Додати</span></a>
    </p>
        
    <br /><br /><br />
    
	<table cellpadding="0" cellspacing="0" class="tablesorter">
    <?php 
        $sortKey = $this->Paginator->sortKey(); 
        $sortDir = $this->Paginator->sortDir(); 
    ?>
    	<tr>
			<th class="header <?php if($sortKey == 'Source.id' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Source.id' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th class="header <?php if($sortKey == 'Source.title' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Source.title' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Назва', 'title');?></th>
			<th class="actions"><?php __('Дії');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($sources as $source):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="even"';
		} else {
            $class = ' class="odd"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $source['Source']['id']; ?>&nbsp;</td>
		<td><?php echo $source['Source']['title']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link($this->Html->image('admin/ico-delete.gif', array('alt' => __('Видалити', true), 'title' => __('Видалити', true), 'class' => 'ico')), array('action' => 'delete', $source['Source']['id']), array('escape' => false), 'Ви дійсно хочете видалити це джерело?'); ?>
			<?php echo $this->Html->link($this->Html->image('admin/ico-edit.gif', array('alt' => __('Редагувати', true), 'title' => __('Редагувати', true), 'class' => 'ico')), array('action' => 'edit', $source['Source']['id']), array('escape' => false)); ?>
			<?php //echo $this->Html->link($this->Html->image('admin/ico-show.gif', array('alt' => __('Переглянути', true), 'title' => __('Переглянути', true), 'class' => 'ico')), array('action' => 'view', $source['Source']['id']), array('escape' => false)); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
    
	<?php echo $this->element('paginator_bottom'); ?>
</div>
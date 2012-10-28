<div class="page_children index">
	<h1><?php __('Діти, видалені зі списку');?></h1>
   
	<?php echo $this->Session->flash(); ?>

	<p>
		<a href="<?php echo $this->Html->url(array('controller' => 'children', 'action' => 'add')); ?>" class="btn-create"><span>Додати</span></a>
		<a href="<?php echo $this->Html->url(array('controller' => 'children', 'action' => 'index')); ?>" class="btn-list"><span>Список</span></a>
	</p>
	<br /><br /><br />
    
    <?php if(!empty($children)): ?>
		
	<table cellpadding="0" cellspacing="0" class="tablesorter">
	<?php 
		$sortKey = $this->Paginator->sortKey(); 
		$sortDir = $this->Paginator->sortDir(); 
	?>
		<tr>
			<th class="header <?php if($sortKey == 'Child.id' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Child.id' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th class="header <?php if($sortKey == 'Child.first_name' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Child.first_name' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Ім\'я', 'first_name');?></th>
			<th class="header <?php if($sortKey == 'Child.birthday' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Child.birthday' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Вік', 'birthday');?></th>
			<th class="header <?php if($sortKey == 'Child.street_id' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Child.street_id' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Вулиця', 'street_id');?></th>
			<th class="header <?php if($sortKey == 'Child.house' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Child.house' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Будинок', 'house');?></th>
			<th class="header <?php if($sortKey == 'Child.flat' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Child.flat' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Квартира', 'flat');?></th>
            <th>Телефон</th>
			<th class="header <?php if($sortKey == 'Child.reason_id' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Child.reason_id' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Категорія', 'reason_id');?></th>
			<th class="header <?php if($sortKey == 'Child.source_id' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Child.source_id' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Джерело внесення', 'source_id');?></th>
            <th class="header <?php if($sortKey == 'Child.delete_reason_id' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Child.delete_reason_id' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Причина видалення', 'delete_reason_id');?></th>
            <th class="header <?php if($sortKey == 'Child.deletion_date' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Child.deletion_date' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Дата видалення', 'deletion_date');?></th>
			<th class="actions">Дії</th>
	</tr>
	<?php
	$i = 0;
	foreach ($children as $child):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="even"';
		} else {
			$class = ' class="odd"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $child['Child']['id']; ?>&nbsp;</td>
		<td><?php echo  $this->Html->link($child['Child']['first_name'] . ' ' . $child['Child']['last_name'] . ' ' . $child['Child']['third_name'], array('controller' => 'children', 'action' => 'view', $child['Child']['id'])); ?>&nbsp;</td>
		<td><?php echo $child['Child']['age']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($child['Street']['title'], array('controller' => 'streets', 'action' => 'view', $child['Street']['id'])); ?>
		</td>
		<td><?php echo $child['Child']['house']; ?>&nbsp;</td>
		<td><?php echo $child['Child']['private_house'] ? 'п.б.' : $child['Child']['flat']; ?>&nbsp;</td>
		<td><?php echo $child['Child']['phone']; ?>&nbsp;</td>
        <td><?php echo $child['Category']['title']; ?></td>
		<td><?php echo $child['Source']['title']; ?></td>
        <td><?php echo $child['DeleteReason']['title']; ?></td>
        <td><?php echo $child['Child']['deletion_date']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link($this->Html->image('admin/ico-delete.gif', array('alt' => __('Видалити зі списку', true), 'title' => __('Видалити зі списку', true), 'class' => 'ico')), array('action' => 'delete', $child['Child']['id']), array('escape' => false), 'Ви дійсно хочете видалити цю дитину зі списку?'); ?>
			<?php echo $this->Html->link($this->Html->image('admin/ico-edit.gif', array('alt' => __('Редагувати дані', true), 'title' => __('Редагувати дані', true), 'class' => 'ico')), array('action' => 'edit', $child['Child']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('admin/ico-show.gif', array('alt' => __('Переглянути дані', true), 'title' => __('Переглянути дані', true), 'class' => 'ico')), array('action' => 'view', $child['Child']['id']), array('escape' => false)); ?>
            <?php echo $this->Html->link($this->Html->image('admin/ico-done.gif', array('alt' => __('Повернути у список', true), 'title' => __('Повернути у список', true), 'class' => 'ico')), array('action' => 'renew', $child['Child']['id']), array('escape' => false), 'Ви дійсно хочете повернути цю дитину в список?'); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php echo $this->element('paginator_bottom'); ?>
    
    <?php else: ?>
        <p class="noitems">Жодної дитини не знайдено.</p>
    <?php endif; ?>
    
	</div>
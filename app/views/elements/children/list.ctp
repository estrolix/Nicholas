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
			<th class="header <?php if($sortKey == 'Child.category_id' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Child.category_id' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Категорія', 'category_id');?></th>
			<!--<th class="header <?php if($sortKey == 'Child.source_id' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Child.source_id' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Джерело внесення', 'source_id');?></th>-->
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
		<td><?php echo  $this->Html->link($child['Child']['first_name'] . ' ' . $child['Child']['last_name']/* . ' ' . $child['Child']['third_name']*/, array('controller' => 'children', 'action' => 'view', $child['Child']['id'])); ?>&nbsp;</td>
		<td><?php echo $child['Child']['age']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($child['Street']['title'], array('controller' => 'streets', 'action' => 'view', $child['Street']['id'])); ?>
		</td>
		<td><?php echo $child['Child']['house']; ?>&nbsp;</td>
		<td><?php echo $child['Child']['private_house'] ? 'п.б.' : $child['Child']['flat']; ?>&nbsp;</td>
        <td><?php echo $child['Child']['phone']; ?>&nbsp;</td>
		<td><?php echo $child['Category']['title']; ?></td>
		<!--<td><?php echo $child['Source']['title']; ?></td>-->
		<td class="actions">
			<?php echo $this->Html->link($this->Html->image('admin/ico-delete.gif', array('alt' => __('Видалити зі списку', true), 'title' => __('Видалити зі списку', true), 'class' => 'ico')), array('controller' => 'children', 'action' => 'moveToDeleted', $child['Child']['id']), array('escape' => false, 'class' => 'childDeleteLink')); ?>
			<?php echo $this->Html->link($this->Html->image('admin/ico-edit.gif', array('alt' => __('Редагувати дані', true), 'title' => __('Редагувати дані', true), 'class' => 'ico')), array('controller' => 'children', 'action' => 'edit', $child['Child']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('admin/ico-show.gif', array('alt' => __('Переглянути дані', true), 'title' => __('Переглянути дані', true), 'class' => 'ico')), array('controller' => 'children', 'action' => 'view', $child['Child']['id']), array('escape' => false)); ?>
		</td>
	</tr>
<?php endforeach; ?>

        <tr id="childDeleteSelectReasonBox">
            <td colspan="10">
                <?php echo $this->Form->input('delete_reason_id', array('label' => 'Причина видалення:', 'options' => $deleteReasons, 'between' => '&nbsp;&nbsp;', 'div' => false)); ?>
                <?php echo $this->Form->button('Видалити', array('onclick' => 'deleteChild(this)')); ?>
                <?php echo $this->Form->button('Відмінити', array('onclick' => 'cancelChildDeleting()')); ?>
            </td>
        </tr>
	</table>
	
	<?php echo $this->element('paginator_bottom'); ?>
    
    <?php else: ?>
        <p class="noitems">Жодної дитини не знайдено.</p>
    <?php endif; ?>
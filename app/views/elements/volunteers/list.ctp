<?php if(!empty($volunteers)): ?>
		
	<table cellpadding="0" cellspacing="0" class="tablesorter">
	<?php 
		$sortKey = $this->Paginator->sortKey(); 
		$sortDir = $this->Paginator->sortDir(); 
	?>
		<tr>
			<th class="header <?php if($sortKey == 'Volunteer.id' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Volunteer.id' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th class="header <?php if($sortKey == 'Volunteer.first_name' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Volunteer.first_name' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Ім\'я', 'first_name');?></th>
			
			<th class="header <?php if($sortKey == 'Volunteer.birthday' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Volunteer.birthday' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Вік', 'birthday');?></th>

			<th class="header <?php if($sortKey == 'Volunteer.street_id' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Volunteer.street_id' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Вулиця', 'street_id');?></th>
			<th class="header <?php if($sortKey == 'Volunteer.house' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Volunteer.house' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Будинок', 'house');?></th>
			<th class="header <?php if($sortKey == 'Volunteer.flat' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Volunteer.flat' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Квартира', 'flat');?></th>

            <th>Телефон</th>
            <th>E-mail</th>
			<th class="actions">Дії</th>
	</tr>
	<?php
	$i = 0;
	foreach ($volunteers as $volunteer):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="even"';
		} else {
			$class = ' class="odd"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $volunteer['Volunteer']['id']; ?>&nbsp;</td>
		<td><?php echo  $this->Html->link($volunteer['Volunteer']['first_name'] . ' ' . $volunteer['Volunteer']['last_name'], array('controller' => 'volunteers', 'action' => 'view', $volunteer['Volunteer']['id'])); ?>&nbsp;</td>
		<td><?php echo $volunteer['Volunteer']['age']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($volunteer['Street']['title'], array('controller' => 'streets', 'action' => 'view', $volunteer['Street']['id'])); ?>
		</td>
		<td><?php echo $volunteer['Volunteer']['house']; ?>&nbsp;</td>
		<td><?php echo $volunteer['Volunteer']['flat']; ?>&nbsp;</td>

        <td><?php echo $volunteer['Volunteer']['phone']; ?>&nbsp;</td>
        <td><?php echo $this->Html->link($volunteer['Volunteer']['email'], 'mailto:' . $volunteer['Volunteer']['email']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link($this->Html->image('admin/ico-delete.gif', array('alt' => __('Видалити зі списку', true), 'title' => __('Видалити зі списку', true), 'class' => 'ico')), array('controller' => 'volunteers', 'action' => 'delete', $volunteer['Volunteer']['id']), array('escape' => false), 'Ви дійсно хочете видалити цього волонтера зі списку?'); ?>
			<?php echo $this->Html->link($this->Html->image('admin/ico-edit.gif', array('alt' => __('Редагувати дані', true), 'title' => __('Редагувати дані', true), 'class' => 'ico')), array('controller' => 'volunteers', 'action' => 'edit', $volunteer['Volunteer']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('admin/ico-show.gif', array('alt' => __('Переглянути дані', true), 'title' => __('Переглянути дані', true), 'class' => 'ico')), array('controller' => 'volunteers', 'action' => 'view', $volunteer['Volunteer']['id']), array('escape' => false)); ?>
		</td>
	</tr>
<?php endforeach; ?>

	</table>
	
	<?php echo $this->element('paginator_bottom'); ?>
    
    <?php else: ?>
        <p class="noitems">Жодного волонтера не знайдено.</p>
    <?php endif; ?>
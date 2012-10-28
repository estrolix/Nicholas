<p class="repeat_search">
    <a href="javascript:void(0);" onclick="findSimilarChildrenFunc()">повторити пошук</a>
</p>

<p class="supertitle">Подібні записи</p>

<?php foreach($childrenGroups as $groupName => $group): if(!empty($group['children'])): ?>

<p class="title"><?php echo $group['title']; ?></p>

<table cellpadding="0" cellspacing="0">

	<tr>
		<th class="header">ID</th>
        <th class="header">Ім'я</th>
        <th class="header">Вік</th>
        <th class="header">Дата народження</th>
        <th class="header">Вулиця</th>
        <th class="header">Будинок</th>
        <th class="header">Квартира</th>
        <th class="header">Категорія</th>
        <th class="header">Джерело</th>
        <th class="header">Дії</th>
	</tr>
    
	<?php
	$i = 0;
	foreach ($group['children'] as $child):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="even"';
		} else {
			$class = ' class="odd"';
		}
	?>
	<tr<?php echo $child['Child']['is_deleted'] ? ' class="deleted_first"' : $class; ?>>
		<td><?php echo $child['Child']['id']; ?>&nbsp;</td>
		<td><?php echo $this->Html->link($child['Child']['first_name'] . ' ' . $child['Child']['last_name'] . ' ' . $child['Child']['third_name'], array('controller' => 'children', 'action' => 'view', $child['Child']['id']), array('target' => '_blank')); ?>&nbsp;</td>
		<td><?php echo $child['Child']['age']; ?>&nbsp;</td>
        <td><?php echo $child['Child']['birthday']; ?>&nbsp;</td>
		<td><?php echo $child['Street']['title']; ?></td>
		<td><?php echo $child['Child']['house']; ?>&nbsp;</td>
		<td><?php echo $child['Child']['private_house'] ? 'п.б.' : $child['Child']['flat']; ?>&nbsp;</td>
		<td><?php echo $child['Category']['title']; ?></td>
        <td><?php echo $child['Source']['title']; ?></td>
        <td class="actions">
			<?php //echo $this->Html->link($this->Html->image('admin/ico-delete.gif', array('alt' => __('Delete', true), 'title' => __('Delete', true), 'class' => 'ico')), array('action' => 'delete', $child['Child']['id']), array('escape' => false), sprintf(__('Are you sure you want to delete # %s?', true), $child['Child']['id'])); ?>
			<?php echo $this->Html->link($this->Html->image('admin/ico-edit.gif', array('alt' => __('Edit', true), 'title' => __('Edit', true), 'class' => 'ico')), array('action' => 'edit', $child['Child']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('admin/ico-show.gif', array('alt' => __('Show', true), 'title' => __('Show', true), 'class' => 'ico')), array('action' => 'view', $child['Child']['id']), array('escape' => false)); ?>
		</td>
	</tr>
    <?php if($child['Child']['is_deleted']): ?>
        <tr class="deleted_second">
            <td colspan="10">
                Видалено зі списку <b><?php echo $child['Child']['deletion_date']; ?></b> | Причина: <b><?php echo $child['DeleteReason']['title']; ?></b>
            </td>
        </tr>
    <?php endif; ?>
 
<?php endforeach; ?>

</table>

<?php endif; endforeach; ?>
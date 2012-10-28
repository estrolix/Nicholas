<div class="page_reasons view">
<h1><?php  __('Reason');?></h1>

<?php echo $this->Session->flash(); ?>
<!-- list view 
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reason['Reason']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reason['Reason']['title']; ?>
			&nbsp;
		</dd>
	</dl>
-->
<br />
    
<table>
<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
</tr>
<tr>
		<td>
			<?php echo $reason['Reason']['id']; ?>
			&nbsp;
		</td>
		<td>
			<?php echo $reason['Reason']['title']; ?>
			&nbsp;
		</td>
</tr>
</table>
    
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reason', true), array('action' => 'edit', $reason['Reason']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Reason', true), array('action' => 'delete', $reason['Reason']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $reason['Reason']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reasons', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reason', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Children', true), array('controller' => 'children', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Child', true), array('controller' => 'children', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deletes', true), array('controller' => 'deletes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delete', true), array('controller' => 'deletes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Children');?></h3>
	<?php if (!empty($reason['Child'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('First Name'); ?></th>
		<th><?php __('Last Name'); ?></th>
		<th><?php __('Third Name'); ?></th>
		<th><?php __('Birthday'); ?></th>
		<th><?php __('Street Id'); ?></th>
		<th><?php __('House'); ?></th>
		<th><?php __('Flat'); ?></th>
		<th><?php __('Private House'); ?></th>
		<th><?php __('Reason Id'); ?></th>
		<th><?php __('Source Id'); ?></th>
		<th><?php __('Notes'); ?></th>
		<th><?php __('Is Deleted'); ?></th>
		<th><?php __('Deleted Date'); ?></th>
		<th><?php __('Delete Reason Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($reason['Child'] as $child):
			$class = null;
    		if ($i++ % 2 == 0) {
    			$class = ' class="even"';
    		} else {
                $class = ' class="odd"';
    		}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $child['id'];?></td>
			<td><?php echo $child['first_name'];?></td>
			<td><?php echo $child['last_name'];?></td>
			<td><?php echo $child['third_name'];?></td>
			<td><?php echo $child['birthday'];?></td>
			<td><?php echo $child['street_id'];?></td>
			<td><?php echo $child['house'];?></td>
			<td><?php echo $child['flat'];?></td>
			<td><?php echo $child['private_house'];?></td>
			<td><?php echo $child['reason_id'];?></td>
			<td><?php echo $child['source_id'];?></td>
			<td><?php echo $child['notes'];?></td>
			<td><?php echo $child['is_deleted'];?></td>
			<td><?php echo $child['deleted_date'];?></td>
			<td><?php echo $child['delete_reason_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link($this->Html->image('admin/ico-show.gif', array('alt' => __('Show', true), 'title' => __('Show', true), 'class' => 'ico')), array('controller' => 'children', 'action' => 'view', $child['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link($this->Html->image('admin/ico-edit.gif', array('alt' => __('Edit', true), 'title' => __('Edit', true), 'class' => 'ico')), array('controller' => 'children', 'action' => 'edit', $child['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link($this->Html->image('admin/ico-delete.gif', array('alt' => __('Delete', true), 'title' => __('Delete', true), 'class' => 'ico')), array('controller' => 'children', 'action' => 'delete', $child['id']), array('escape' => false), sprintf(__('Are you sure you want to delete # %s?', true), $child['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child', true), array('controller' => 'children', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Deletes');?></h3>
	<?php if (!empty($reason['Delete'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($reason['Delete'] as $delete):
			$class = null;
    		if ($i++ % 2 == 0) {
    			$class = ' class="even"';
    		} else {
                $class = ' class="odd"';
    		}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $delete['id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link($this->Html->image('admin/ico-show.gif', array('alt' => __('Show', true), 'title' => __('Show', true), 'class' => 'ico')), array('controller' => 'deletes', 'action' => 'view', $delete['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link($this->Html->image('admin/ico-edit.gif', array('alt' => __('Edit', true), 'title' => __('Edit', true), 'class' => 'ico')), array('controller' => 'deletes', 'action' => 'edit', $delete['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link($this->Html->image('admin/ico-delete.gif', array('alt' => __('Delete', true), 'title' => __('Delete', true), 'class' => 'ico')), array('controller' => 'deletes', 'action' => 'delete', $delete['id']), array('escape' => false), sprintf(__('Are you sure you want to delete # %s?', true), $delete['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Delete', true), array('controller' => 'deletes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>

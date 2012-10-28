<div class="page_teams index">
	<h1><?php __('Групи волонтерів');?></h1>
    
    <?php echo $this->Session->flash(); ?>
    
    <p>
        <a href="<?php echo $this->Html->url(array('controller' => 'teams', 'action' => 'add')); ?>" class="btn-create"><span>Додати</span></a>
    </p>
        
    <br /><br /><br />
    
	<?php if(!empty($teams)): ?>

		<table cellpadding="0" cellspacing="0" class="tablesorter width100">
	    <?php 
	        $sortKey = $this->Paginator->sortKey(); 
	        $sortDir = $this->Paginator->sortDir(); 
	    ?>
	    	<tr>
				<th class="header <?php if($sortKey == 'Team.id' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Team.id' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('ID', 'id');?></th>
				<th class="header">Учасники</th>
				<th class="header <?php if($sortKey == 'Team.members_number' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Team.members_number' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Кількість учасників', 'members_number');?></th>
				<th class="teams"><?php __('Дії');?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($teams as $team):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="even"';
			} else {
	            $class = ' class="odd"';
			}
		?>
		<tr<?php //echo $class;?>>
			<td class="t-center"><?php echo $team['Team']['id']; ?></td>
			<td>
				<table cellpadding="0" cellspacing="0" class="width100 nostyle">
					<tr>
						<th>ID</th>
						<th>Ім'я</th>
						<th>Телефон</th>
						<th>Email</th>
					</tr>
					<?php foreach($team['Volunteers'] as $volunteer): ?>
						<tr>
							<td><?php echo $volunteer['id']; ?></td>
							<td class="high-bg"><?php echo $volunteer['first_name'] . ' ' . $volunteer['last_name']; ?></td>
							<td><?php echo $volunteer['phone']; ?></td>
							<td><?php echo $volunteer['email'] ? $this->Html->link($volunteer['email'], 'mailto:' . $volunteer['email']) : '&nbsp;'; ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</td>
			<td class="t-center"><?php echo $team['Team']['members_number']; ?></td>
			<td class="teams">
				<?php echo $this->Html->link($this->Html->image('admin/ico-delete.gif', array('alt' => __('Видалити', true), 'title' => __('Видалити', true), 'class' => 'ico')), array('action' => 'delete', $team['Team']['id']), array('escape' => false), 'Ви дійсно хочете видалити цю групу?'); ?>
				<?php echo $this->Html->link($this->Html->image('admin/ico-edit.gif', array('alt' => __('Редагувати', true), 'title' => __('Редагувати', true), 'class' => 'ico')), array('action' => 'edit', $team['Team']['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link($this->Html->image('admin/ico-show.gif', array('alt' => __('Переглянути', true), 'title' => __('Переглянути', true), 'class' => 'ico')), array('action' => 'view', $team['Team']['id']), array('escape' => false)); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>
	    
		<?php echo $this->element('paginator_bottom'); ?>

		<?php else: ?>
	        <p class="noitems">Жодної групи не знайдено.</p>
	    <?php endif; ?>

</div>
<div class="page_actions index">
	<h1><?php __('Акції');?></h1>
    
    <?php echo $this->Session->flash(); ?>

    <?php if(!empty($actions)): ?>

	    <?php echo $this->Form->create('Setting', array('url' => array('controller' => 'actions', 'action' => 'change_current_action'), 'class' => 'box-02 bottom box currentActionSelector')); ?>
	    	Актуальна акція: <span class="actionName"><?php echo $actionsList[$current_action_id]; ?></span> <?php echo $this->Form->input('action_id', array('label' => false, 'options' => $actionsList, 'div' => false, 'value' => $current_action_id)); ?>
	    	<div class="buttons">
	    		<span class="change">змінити</span>
	    		<span class="saveSet">
	    			<span class="save">зберегти</span> або <span class="cancel">відмінити</span>
	    		</span>
	    	</div>
		<?php echo $this->Form->end(); ?>
	
	<?php endif; ?>
    
    <p>
        <a href="<?php echo $this->Html->url(array('controller' => 'actions', 'action' => 'add')); ?>" class="btn-create"><span>Додати</span></a>
    </p>
        
    <br /><br /><br />
    
	<?php if(!empty($actions)): ?>

		<table cellpadding="0" cellspacing="0" class="tablesorter">
	    <?php 
	        $sortKey = $this->Paginator->sortKey(); 
	        $sortDir = $this->Paginator->sortDir(); 
	    ?>
	    	<tr>
				<th class="header <?php if($sortKey == 'Action.id' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Action.id' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('ID', 'id');?></th>
				<th class="header <?php if($sortKey == 'Action.title' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Action.title' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Назва', 'title');?></th>
				<th class="header <?php if($sortKey == 'Action.date' && $sortDir == 'asc'): ?>headerSortUp<?php elseif($sortKey == 'Action.date' && $sortDir == 'desc'): ?>headerSortDown<?php endif; ?>"><?php echo $this->Paginator->sort('Дата проведення', 'date');?></th>
				<th class="actions"><?php __('Дії');?></th>
		</tr>
		<?php
		foreach ($actions as $action):
			$class = '';
			if($action['Action']['id'] == $current_action_id) {
	            $class = ' class="odd"';
			}
		?>
		<tr<?php echo $class;?>>
			<td class="t-center"><?php echo $action['Action']['id']; ?></td>
			<td><b><?php echo $action['Action']['title']; ?></b></td>
			<td class="t-center"><?php echo date('d.m.Y', strtotime($action['Action']['date'])); ?></td>
			<td class="actions">
				<?php echo $this->Html->link($this->Html->image('admin/ico-delete.gif', array('alt' => __('Видалити', true), 'title' => __('Видалити', true), 'class' => 'ico')), array('action' => 'delete', $action['Action']['id']), array('escape' => false), 'Ви дійсно хочете видалити цю акцію?'); ?>
				<?php echo $this->Html->link($this->Html->image('admin/ico-edit.gif', array('alt' => __('Редагувати', true), 'title' => __('Редагувати', true), 'class' => 'ico')), array('action' => 'edit', $action['Action']['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link($this->Html->image('admin/ico-show.gif', array('alt' => __('Переглянути', true), 'title' => __('Переглянути', true), 'class' => 'ico')), array('action' => 'view', $action['Action']['id']), array('escape' => false)); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>
	    
		<?php echo $this->element('paginator_bottom'); ?>

		<?php else: ?>
	        <p class="noitems">Жодної акції не знайдено.</p>
	    <?php endif; ?>

</div>
<h1>Перегляд даних дитини</h1>

    <?php echo $this->Session->flash(); ?>
    
    <!--<br />
    <div class="actions_box box-01">
		<?php echo $this->Html->link('Редагувати дані цієї дитини', array('action' => 'edit', $child['Child']['id']), array('class' => 'ico-edit')); ?><br />
		<?php echo $this->Html->link('Видалити зі списку', array('action' => 'delete', $child['Child']['id']), array('class' => 'ico-delete'), 'Ви точно дійсно хочете видалити цю дитину зі списку '); ?>
    </div>-->

<div class="page_children view" id="childViewMainDiv">
    
    <p class="child_name"><?php echo $child['Child']['first_name'] . ' ' . $child['Child']['last_name'] . ' ' . $child['Child']['third_name'];  ?></p>
    
    <?php if($child['Child']['is_deleted']): ?>
        <div class="child_deleted_box">
            Видалено зі списку: <b><?php echo $child['Child']['deletion_date']; ?></b><br />
            Причина: <b><?php echo $child['DeleteReason']['title']; ?></b>
        </div>
    <?php endif; ?>
 
	<dl>
		<dt>ID</dt>
		<dd><?php echo $child['Child']['id']; ?></dd>
        
        <dt>Стать</dt>
		<dd><?php echo $child['Child']['gender'] == 'm' ? 'хлопчик' : 'дівчинка'; ?></dd>
        
        <dt>Дата народження</dt>
		<dd><?php echo $child['Child']['birthday']; ?> (<?php echo $child['Child']['age']; ?>  років)</dd>
        
		<dt>Адреса</dt>
		<dd><?php echo $child['Street']['title'] . ', ' . $child['Child']['house'] . ($child['Child']['private_house'] ? ' (приватний будинок)' : '/' . $child['Child']['flat']);  ?></dd>
        
		<dt>Телефон</dt>
		<dd<?php if(empty($child['Child']['phone'])) echo ' class="empty_answer"'; ?>><?php echo empty($child['Child']['phone']) ? 'не вказано' : $child['Child']['phone']; ?></dd>
        
        <dt>Навчальний заклад</dt>
		<dd<?php if(empty($child['Child']['edu_place'])) echo ' class="empty_answer"'; ?>><?php echo empty($child['Child']['edu_place']) ? 'не вказано' : $child['Child']['edu_place']; ?></dd>
        
        <dt>Категорія</dt>
		<dd><?php echo $child['Category']['title']; ?></dd>
        
        <dt>Джерело внесення в список</dt>
		<dd><?php echo $child['Source']['title']; ?></dd>
        
        <dt>Нотатки</dt>
		<dd<?php if(empty($child['Child']['notes'])) echo ' class="empty_answer"'; ?>><?php echo empty($child['Child']['notes']) ? 'відсутні' : $child['Child']['notes']; ?></dd>        
    
</div>

<div id="map_canvas" class="childViewMap"></div>

<div class="fix"></div>

<div class="actions_box box-01">
		<?php echo $this->Html->link('Редагувати дані цієї дитини', array('action' => 'edit', $child['Child']['id']), array('class' => 'ico-edit')); ?><br />
		<?php echo $this->Html->link('Видалити зі списку', array('action' => 'delete', $child['Child']['id']), array('class' => 'ico-delete childDeleteLinkInDiv' . ($child['Child']['is_deleted'] ? ' delete_totally' : ''))); ?>
        
        <div id="childDeleteSelectReasonBox">
            <?php echo $this->Form->input('delete_reason_id', array('label' => 'Причина видалення:', 'options' => $deleteReasons, 'between' => '&nbsp;&nbsp;', 'div' => false)); ?>
            <?php echo $this->Form->button('Видалити', array('onclick' => 'deleteChildFromDiv(this)')); ?>
            <?php echo $this->Form->button('Відмінити', array('onclick' => 'cancelChildDeleting()')); ?>
        </div>
        
</div>

<script type="text/javascript">
    initializeSingleAddressMap('Україна, м. Тернопіль, <?php echo $child['Street']['title'] . ', ' . $child['Child']['house']; ?>', 17);
</script>
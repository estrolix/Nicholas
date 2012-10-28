<h1>Перегляд даних волонтера</h1>

<?php echo $this->Session->flash(); ?>

<?php //debug($volunteer); ?>
    
<div class="page_volunteers view">
    
    <p class="name"><?php echo $volunteer['Volunteer']['first_name'] . ' ' . $volunteer['Volunteer']['last_name']; ?></p>

	<dl>
		<dt>ID</dt>
		<dd><?php echo $volunteer['Volunteer']['id']; ?></dd>
        
        <dt>Дата народження</dt>
		<dd><?php echo $volunteer['Volunteer']['birthday']; ?> (<?php echo $volunteer['Volunteer']['age']; ?>  років)</dd>
        
		<dt>Адреса</dt>
		<dd>
            <?php if(!($volunteer['Volunteer']['street_id'] || $volunteer['Volunteer']['house'] || $volunteer['Volunteer']['flat'])): ?>
                <span class="empty_answer">не вказано</span>
            <?php else: ?>
                <?php echo $volunteer['Volunteer']['street_id'] ? $volunteer['Street']['title'] : '<span class="empty_answer">вулицю не вказано</span>'; ?>,
                <?php echo $volunteer['Volunteer']['house'] ? $volunteer['Volunteer']['house'] : '<span class="empty_answer">будинок не вказано</span>'; ?>
                <?php echo $volunteer['Volunteer']['flat'] ? ('/' . $volunteer['Volunteer']['flat']) : ''; ?>
            <?php endif; ?>
        </dd>
        
		<dt>Телефон</dt>
		<dd<?php if(empty($volunteer['Volunteer']['phone'])) echo ' class="empty_answer"'; ?>><?php echo empty($volunteer['Volunteer']['phone']) ? 'не вказано' : $volunteer['Volunteer']['phone']; ?></dd>

        <dt>E-mail</dt>
        <dd>
            <?php echo empty($volunteer['Volunteer']['email']) ? '<span class="empty_answer">не вказано</span>' : $this->Html->link($volunteer['Volunteer']['email'], 'mailto:' . $volunteer['Volunteer']['email']); ?>
        </dd>
        
        <dt>Навчальний заклад</dt>
		<dd<?php if(empty($volunteer['Volunteer']['edu_place'])) echo ' class="empty_answer"'; ?>><?php echo empty($volunteer['Volunteer']['edu_place']) ? 'не вказано' : $volunteer['Volunteer']['edu_place']; ?></dd>

        <dt>Факультет</dt>
        <dd<?php if(empty($volunteer['Volunteer']['edu_department'])) echo ' class="empty_answer"'; ?>><?php echo empty($volunteer['Volunteer']['edu_department']) ? 'не вказано' : $volunteer['Volunteer']['edu_department']; ?></dd>

        <dt>Група (клас)</dt>
        <dd<?php if(empty($volunteer['Volunteer']['edu_group'])) echo ' class="empty_answer"'; ?>><?php echo empty($volunteer['Volunteer']['edu_group']) ? 'не вказано' : $volunteer['Volunteer']['edu_group']; ?></dd>
        
        <dt>Як дізналися про акцію?</dt>
		<dd<?php if(empty($volunteer['Volunteer']['how_found'])) echo ' class="empty_answer"'; ?>><?php echo empty($volunteer['Volunteer']['how_found']) ? 'не вказано' : $volunteer['Volunteer']['how_found']; ?></dd>        
    
</div>

<div class="fix"></div>

<div class="actions_box box-01">
	<?php echo $this->Html->link('Редагувати дані волонтера', array('action' => 'edit', $volunteer['Volunteer']['id']), array('class' => 'ico-edit')); ?><br />
	<?php echo $this->Html->link('Видалити зі списку', array('action' => 'delete', $volunteer['Volunteer']['id']), array('class' => 'ico-delete'), 'Ви дійсно хочете видалити цього волонтера зі списку?'); ?>      
</div>
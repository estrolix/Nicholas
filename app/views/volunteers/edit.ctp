<div class="page_volunteers form">
<h1><?php __('Редагувати дані волонтера'); ?></h1>

<?php echo $this->Session->flash(); ?>
<br />

<?php echo $this->Form->create('Volunteer');?>

	<?php
		$input_options = array(
								'before' => '<p class="nomt">',
								'after' => '</p>',
								'between' => '<br />',
								'class' => 'input-text-02',
								'size' => 50
								);

		$small_input_options = array(
								'before' => '<p class="nomt">',
								'after' => '</p>',
								'between' => '<br />',
								'class' => 'input-text-02',
								'size' => 4
								);
                                
        $smaller_input_options = array(
								'before' => '<p class="nomt">',
								'after' => '</p>',
								'between' => '<br />',
								'class' => 'input-text-02',
								'size' => 35
								);

		$checkbox_options = array(
								'before' => '<p class="nomt">',
								'after' => '</p>',
								'between' => '&nbsp;',
								'class' => 'input-text-02',
								//'size' => 60
								);
		$dropdown_options = array(
								'before' => '<p class="nomt">',
								'after' => '</p>',
								'between' => '<br />',
								'class' => 'input-text-02',
								//'size' => 50
								);
        
        $date_options = array(
								'before' => '<p class="nomt">',
								'after' => '</p>',
								'between' => '<br />',
								'class' => 'input-text-02',
                                'dateFormat' => 'DMY',
                                'minYear' => date('Y') - 25,
                                'maxYear' => date('Y'),
                                'monthNames' => $monthes
								);
        
	?>
         
 	<fieldset>
		<legend>Головні дані</legend>       
		
		<?php
			echo $this->Form->input('first_name', $input_options + array('label' => 'Прізвище'));
			echo $this->Form->input('last_name', $input_options + array('label' => 'Ім\'я'));
			echo $this->Form->input('birthday', $date_options + array('label' => 'Дата народження'));
		?>
	
	</fieldset>

	<fieldset>
		<legend>Контактна інформація</legend>

		<?php
			echo $this->Form->input('phone', $smaller_input_options + array('label' => 'Телефон'));
			echo $this->Form->input('email', $smaller_input_options + array('label' => 'E-mail'));
			echo $this->Form->input('street_id', $dropdown_options + array('label' => 'Вулиця'));
			echo $this->Form->input('house', $small_input_options + array('label' => 'Будинок'));
			echo $this->Form->input('flat', $small_input_options + array('label' => 'Квартира'));
		?>

	</fieldset>

	<fieldset>
		<legend>Місце навчання</legend>
	
		<?php
			echo $this->Form->input('edu_place', $input_options + array('label' => 'Навчальний заклад'));
			echo $this->Form->input('edu_department', $input_options + array('label' => 'Факультет'));
			echo $this->Form->input('edu_group', $input_options + array('label' => 'Група (клас)'));    
    	?>

	</fieldset>

	<fieldset>
		<legend>Додатково</legend>
	
		<?php
			echo $this->Form->input('how_found', $input_options + array('label' => 'Як дізналися про акцію?'));
    	?>

	</fieldset>

<div class="submit" id="submit_div">
    <?php echo $form->submit('Зберегти', array('class' => 'input-submit', 'div' => false)); ?> або 
    <?php echo $form->button('Відмінити', array('class' => '', 'div' => false, 'onclick' => 'backToVolunteersList();', 'type' => 'button')); ?>
</div>

<?php echo $this->Form->end(); ?>

</div>
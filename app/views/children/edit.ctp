<div class="page_children form">
<h1><?php __('Редагувати дані про дитину'); ?></h1>

<?php echo $this->Session->flash(); ?>
<br />

<?php echo $this->Form->create('Child');?>

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
			echo $this->Form->input('third_name', $input_options + array('label' => 'По-батькові'));
			echo $this->Form->input('birthday', $date_options + array('label' => 'Дата народження'));
            echo $this->Form->input('gender', $dropdown_options + array('label' => 'Стать', 'options' => $genders));
		?>
	
	</fieldset>

	<fieldset>
		<legend>Адреса і телефон</legend>

		<?php
			echo $this->Form->input('street_id', $dropdown_options + array('label' => 'Вулиця'));
			echo $this->Form->input('house', $small_input_options + array('label' => 'Будинок'));
			echo $this->Form->input('flat', $small_input_options + array('label' => 'Квартира'));
			echo $this->Form->input('private_house', $checkbox_options + array('label' => 'Приватний будинок'));
            echo $this->Form->input('phone', $smaller_input_options + array('label' => 'Телефон'));
		?>

	</fieldset>

	<fieldset>
		<legend>Додатково</legend>
	
		<?php
			echo $this->Form->input('edu_place', $input_options + array('label' => 'Навчальний заклад'));
            echo $this->Form->input('category_id', $dropdown_options + array('label' => 'Категорія'));
			echo $this->Form->input('source_id', $dropdown_options + array('label' => 'Джерело попадання в список'));
			echo $this->Form->input('notes', $input_options + array('label' => 'Нотатки', 'cols' => 50, 'rows' => 4));
			//echo $this->Form->input('is_deleted', $checkbox_options);
			//echo $this->Form->input('deleted_date', $input_options);
			//echo $this->Form->input('delete_reason_id', $input_options);    
    	?>

	</fieldset>

<?php echo $form->end(array('label' => 'Зберегти', 'class' => 'input-submit')); ?>

</div>
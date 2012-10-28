<div class="page_actions form">
<h1><?php __('Додати акцію'); ?></h1>

<?php echo $this->Session->flash(); ?>

<?php echo $this->Form->create('Action');?>

	<?php
		$input_options = array(
								'before' => '<p class="nomt">',
								'after' => '</p>',
								'between' => '<br />',
								'class' => 'input-text-02',
								'size' => 50
								);
        
        $date_options = array(
								'before' => '<p class="nomt">',
								'after' => '</p>',
								'between' => '<br />',
								'class' => 'input-text-02',
                                'dateFormat' => 'DMY',
                                'minYear' => date('Y'),
                                'maxYear' => date('Y') + 5,
                                'monthNames' => $monthes
								);
        
	?>
         
 	<fieldset>
		<legend>Головні дані</legend>       
		
		<?php
			echo $this->Form->input('title', $input_options + array('label' => 'Назва акції'));
			echo $this->Form->input('date', $date_options + array('label' => 'Дата проведення'));
		?>
	
	</fieldset>

	<fieldset>
		<legend>Додатково</legend>
	
		<?php
			echo $this->Form->input('notes', $input_options + array('label' => 'Нотатки', 'cols' => 50, 'rows' => 4));
    	?>

	</fieldset>

<div class="submit" id="submit_div">
    <?php echo $form->submit('Зберегти', array('class' => 'input-submit', 'div' => false)); ?> або 
    <?php echo $form->button('Відмінити', array('class' => '', 'div' => false, 'onclick' => "backToWithConfirm('/actions');", 'type' => 'button')); ?>
</div>

<?php echo $this->Form->end(); ?>

</div>
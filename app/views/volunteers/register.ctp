<div class="jumbotron">
	<h1>Миколай про тебе не забуде</h1>
	<p class="lead">
		Хочеш стати волонтером даного проекту? Зареєструйся і в найближчий час наші координатори зв'яжуться з тобою.
	</p>
	<a class="btn btn-large btn-success" href="#">Зареєструватись!</a>
</div>

<hr>

<div class="row-fluid">
	<?php
		$inputDefaults = array(
			'after' => '<hr />',
			//'class' => 'input-xlarge'
		);
		$textInputOptions = array('class' => 'input-xlarge') + $inputDefaults;

	?>
	<?php echo $this->Form->create('Volunteer', array('inputDefaults' => $inputDefaults)); ?>

	<?php echo $this->Form->input('first_name', $textInputOptions + array('label' => 'Ім\'я')); ?>
	<?php echo $this->Form->input('last_name', $textInputOptions +  array('label' => 'Прізвище')); ?>
	<?php echo $this->Form->input('third_name', $textInputOptions +  array('label' => 'По-батькові')); ?>

	<?php echo $this->Form->label('gender', 'Стать'); ?>
	<?php echo $this->Form->input('gender', array('type' => 'radio', 'options' => $genders, 'legend' => false)); ?>
	<?php echo $this->Form->input('birthday', array(
		'label' => 'Дата народження',
		'dateFormat' => 'DMY',
		'minYear' => date('Y') - 100,
		'maxYear' => date('Y') - 7,
		'monthNames' => $monthes,
		'class' => 'input-medium'
	)); ?>

	<?php echo $this->Form->input('email', $textInputOptions +  array('label' => 'E-mail')); ?>
	<?php echo $this->Form->input('phone', $textInputOptions +  array('label' => 'Номер телефону')); ?>

	<?php echo $this->Form->input('social_links', array(
		'class' => 'input-xxlarge',
		'label' => 'Посилання на сторінки в соціальних мережах (Вконтакті, Facebook, Twitter і т.д.)'
	) + $textInputOptions); ?>
	<?php echo $this->Form->input('job', array(
		'label' => 'Місце роботи чи навчання',
		'class' => 'input-xxlarge'
	) + $textInputOptions); ?>

	<?php echo $this->Form->input('jobdirections', array(
			'multiple' => 'checkbox',
			'options' => $jobdirections,
			'label' => 'Волонтерські напрямки роботи, які Вам до вподоби'
		));
	?>

	<?php echo $this->Form->label('howfound_id', 'Як Ви дізнались про акцію?'); ?>
	<?php echo $this->Form->input('howfound_id', array('type' => 'radio', 'legend' => false, 'class' => 'VolunteerHowfoundId', 'after' => false)); ?>
	<?php echo $this->Form->input('howfound_own_variant', array('label' => false, 'disabled' => true, 'after' => false)); ?>

	<div class="form-actions">
		<button type="submit" class="btn btn-primary submit">Надіслати</button>
	</div>

	<?php echo $this->Form->end(); ?>
</div>

<script>
	$(function(){
		$('.VolunteerHowfoundId').change(function(){
			var ownVarintField = $('#VolunteerHowfoundOwnVariant');
			if($(this).val() == 9) {
				ownVarintField.removeAttr('disabled');
				ownVarintField.focus();
			}
			else {
				ownVarintField.val('');
				ownVarintField.attr('disabled', 'disabled');
			}
		});
	});
</script>
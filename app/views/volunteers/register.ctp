<div class="jumbotron">
	<h1>Миколай про тебе не забуде 2012</h1>
	<p class="lead">
		Хочеш стати волонтером даного проекту? Зареєструйся і в найближчий час наші координатори зв'яжуться з тобою.
	</p>
	<a class="btn btn-large btn-success" href="#">Зареєструватись!</a>
</div>

<hr>

<div class="row-fluid">
	<?php echo $this->Form->create(); ?>

	<?php echo $this->Form->input('first_name', array('label' => 'Ім\'я')); ?>
	<?php echo $this->Form->input('last_name', array('label' => 'Прізвище')); ?>
	<?php echo $this->Form->input('third_name', array('label' => 'По-батькові')); ?>

	<?php echo $this->Form->label('gender', 'Стать'); ?>
	<?php echo $this->Form->input('gender', array('type' => 'radio', 'options' => $genders, 'legend' => false)); ?>
	<?php echo $this->Form->input('birthday', array('label' => 'Дата народження')); ?>

	<?php echo $this->Form->input('email', array('label' => 'E-mail')); ?>
	<?php echo $this->Form->input('phone', array('label' => 'Номер телефону')); ?>

	<?php echo $this->Form->input('social_links', array(
		'label' => 'Посилання на сторінки в соціальних мережах (Вконтакті, Facebook, Twitter і т.д.)'
	)); ?>


	<?php echo $this->Form->end(); ?>
</div>
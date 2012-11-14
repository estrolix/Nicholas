<div class="jumbotron">
	<h1>Миколай про тебе не забуде 2012</h1>
	<p class="lead">
		Якщо Ви маєте мету стати волонтером даного проекту - заповніть цю анкету.
		В найближчий час наші координатори зв'яжуться з Вами.
	</p>
	<a class="btn btn-large btn-success" href="#">Зареєструватись!</a>
</div>

<hr>

<div class="row-fluid">
	<?php echo $this->Form->create(); ?>

	<?php echo $this->Form->input('first_name', array('label' => 'Ім\'я')); ?>
	<?php echo $this->Form->input('last_name', array('label' => 'Прізвище')); ?>
	<?php echo $this->Form->input('third_name', array('label' => 'По-батькові')); ?>

	<?php echo $this->Form->input('sex', array('label' => 'Стать')); ?>
	<?php echo $this->Form->input('birthday', array('label' => 'Дата народження')); ?>

	<?php echo $this->Form->input('email', array('label' => 'E-mail')); ?>
	<?php echo $this->Form->input('phone', array('label' => 'Номер телефону')); ?>

	<?php echo $this->Form->input('social_links', array(
		'label' => 'Посилання на сторінки в соц. мережах (Вконтакті, Facebook, Twitter',
		'rows' => 5,
		'after' => '<span class="help-block">Якщо у вас така сторінка відсутня, друкуєте слово "немає" Якщо ви маєте не одну сторінку, прохання розмістити усі посилання.</span>'
		)); ?>


	<?php echo $this->Form->end(); ?>
</div>
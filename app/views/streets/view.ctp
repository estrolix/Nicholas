<h1>Перегляд вулиці</h1>

<?php echo $this->Session->flash(); ?>

<div class="page_streets view">
    
    <p class="street_title">м.Тернопіль, вул. <?php echo $street['Street']['title']; ?></p>

</div>

<div id="map_canvas" class="streetViewMap"></div>

<div class="fix"></div>

<p class="street_view_childrenlist_title">Діти, які проживають на цій вулиці</p>
<?php echo $this->element('children/list'); ?>

<div class="actions_box box-01">
	<?php echo $this->Html->link('Редагувати вулицю', array('action' => 'edit', $street['Street']['id']), array('class' => 'ico-edit')); ?>
</div>

<script type="text/javascript">
    initializeSingleAddressMap('Україна, м. Тернопіль, вул. <?php echo $street['Street']['title']; ?>', 15);
</script>
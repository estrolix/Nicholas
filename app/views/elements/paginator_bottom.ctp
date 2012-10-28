<?php //if($this->Paginator->params['paging']['Child']['pageCount'] > 1): ?>

<!-- Pagination (Bottom) -->
<div class="pagination box bottom">

	<p class="f-right">
		<a href="#"></a>
        <?php if($this->Paginator->hasPrev() || $this->Paginator->hasNext()): ?>
            <?php echo $this->Paginator->prev('&laquo;', array('escape' => false), null, array('class'=>'disabled', 'escape' => false));?>&nbsp;<?php echo $this->Paginator->numbers(array('separator' => '&nbsp;', 'tag' => 'span'));?>&nbsp;<?php echo $this->Paginator->next('&raquo;', array('escape' => false), null, array('class' => 'disabled', 'escape' => false));?>
        <?php endif; ?>
	</p>

	<p class="f-left">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Показано <strong>%start%&ndash;%end%</strong> з <strong>%count%</strong> записів', true)
	));
    //'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	?>    
    
    </p>

</div> <!-- /pagination -->

<?php //endif; ?>
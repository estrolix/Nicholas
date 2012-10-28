<div class="page_delete_reasons form">

    <h1><?php __('Додати причину видалення'); ?></h1>
    
    <?php echo $this->Session->flash(); ?>
    <br />
    <?php
        echo $this->Form->create('DeleteReason');
        $input_options = array(
        					'before' => '<p class="nomt">',
        					'after' => '</p>',
        					'between' => '<br />',
        					'class' => 'input-text-02',
        					'size' => 50
        					);
                
    	echo $this->Form->input('title', $input_options + array('label' => 'Назва'));
        
        echo $this->Form->end(array('label' => 'Зберегти', 'class' => 'input-submit'));
    ?>

</div>
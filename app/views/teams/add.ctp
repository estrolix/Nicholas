<div class="page_teams form">
    <h1><?php __('Додати групу волонтерів'); ?></h1>

    <?php echo $this->Session->flash(); ?>

    <?php echo $this->Form->create('Team');?>

    	<?php
    		$input_options = array(
    								'before' => '<p class="nomt">',
    								'after' => '</p>',
    								'between' => '<br />',
    								'class' => 'input-text-02',
    								'size' => 50
    								);        
    	?>

        <fieldset>
            <legend>Акція</legend>
            
            <?php echo $this->Form->input('action_id', array('class' => 'input-text-02', 'label' => false, 'value' => $current_action_id, 'options' => $actionsList)); ?>

        </fieldset>
             
     	<fieldset>
    		<legend>Учасники</legend>       
    		
    		<table class="dualSelect nostyle">
                <tr>
                    <td>
                            Фільтр: <input type="text" id="box1Filter" /><button type="button" id="box1Clear" class="filterClearButton">X</button><br />
                            
                            <?php echo $this->Form->input('free', array('options' => $freeVolunteers, 'id' => 'box1View', 'type' => 'select', 'multiple' => 'multiple', 'div' => false, 'label' => false)); ?>
                            <br/>
                             <span id="box1Counter" class="countLabel"></span>
                           		<select id="box1Storage"></select>
                    </td>
                    <td>
                        <button id="to2" type="button">&nbsp;&rarr;&nbsp;</button>
                        <button id="allTo2" type="button">&nbsp;&rsaquo;&rsaquo;&nbsp;</button>
                        <button id="allTo1" type="button">&nbsp;&lsaquo;&lsaquo;&nbsp;</button>
                        <button id="to1" type="button">&nbsp;&larr;&nbsp;</button>
                    </td>
                    <td>
                        <div style="display:none">
                        Фільтр: <input type="text" id="box2Filter" /><button type="button" id="box2Clear">X</button>
                        </div>
                        <br />
                        <?php echo $this->Form->input('members_ids', array('id' => 'box2View', 'type' => 'select', 'multiple' => 'multiple', 'div' => false, 'label' => false)); ?>
                        <br/>
                        <span id="box2Counter" class="countLabel"></span>
                        <select id="box2Storage"></select>
                    </td>
                </tr>
            </table>
    	
    	</fieldset>

        <fieldset>
            <legend>Керівник групи</legend>
            <?php //echo $this->Form->select('leader_id', $freeVolunteers, null, array('class' => 'input-text-02')); ?>
            <?php echo $this->Form->input('leader_id', array('options' => array('- виберіть -'), 'class' => 'input-text-02', 'label' => false)); ?>
        </fieldset>

    	<fieldset>
    		<legend>Додатково</legend>
    	
    		<?php
    			echo $this->Form->input('notes', $input_options + array('label' => 'Нотатки', 'cols' => 50, 'rows' => 4));
        	?>

    	</fieldset>

        <div id="emptyTeamError">
            <?php echo $this->element('flash_warning', array('message' => 'Спочатку виберіть учасників групи.')); ?>
        </div>
        <div id="teamLeaderError">
            <?php echo $this->element('flash_warning', array('message' => 'Спочатку виберіть керівника групи.')); ?>
        </div>

    <div class="submit" id="submit_div">
        <?php echo $form->submit('Зберегти', array('class' => 'input-submit', 'div' => false)); ?> або 
        <?php echo $form->button('Відмінити', array('class' => '', 'div' => false, 'onclick' => "backToWithConfirm('/teams');", 'type' => 'button')); ?>
    </div>

    <?php echo $this->Form->end(); ?>

</div>
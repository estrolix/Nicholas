<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="page_<?php echo $pluralVar;?> form">
<h1><?php printf("<?php __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></h1>
<?php echo '
<?php echo $this->Session->flash(); ?>
' 
?>
<br />
<?php echo "<?php echo \$this->Form->create('{$modelClass}');?>\n";?>
        <table class="nostyle">
        <?php echo '
            <?php
            $input_options = array(
                \'div\' => false,
                \'before\' => \'<tr><td>\',
                \'after\' => \'</td></tr>\',
                \'between\' => \'</td><td>\',
                \'format\' => array(\'before\', \'label\', \'between\', \'input\', \'error\', \'after\'),
                \'class\' => \'input-text\'
            );
            ?>
        ' ?>
        
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                echo "\t\techo \$this->Form->input('{$field}', \$input_options);\n";
			}
		}
        ?>
        //<!-- HABTM -->
        <?php
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}', \$input_options);\n";
			}
		}
		echo "\t?>\n";
        echo '<tr><td colspan="2" class="t-right"><?php echo $this->Form->submit(__(\' ' . Inflector::humanize($action) . ' \', true), array(\'class\' => \'input-submit\')); ?></td></tr>';
?>
	</table>
<?php
	echo "<?php echo \$this->Form->end();?>\n";
?>
</div>
<div class="actions">
	<h3><?php echo "<?php __('Actions'); ?>"; ?></h3>
	<ul>

<?php if (strpos($action, 'add') === false): ?>
		<li><?php echo "<?php echo \$this->Html->link(__('Delete', true), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), null, sprintf(__('Are you sure you want to delete # %s?', true), \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>";?></li>
<?php endif;?>
		<li><?php echo "<?php echo \$this->Html->link(__('List " . $pluralHumanName . "', true), array('action' => 'index'));?>";?></li>
<?php
		$done = array();
		foreach ($associations as $type => $data) {
			foreach ($data as $alias => $details) {
				if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
					echo "\t\t<li><?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "', true), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
					echo "\t\t<li><?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "', true), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
					$done[] = $details['controller'];
				}
			}
		}
?>
	</ul>
</div>
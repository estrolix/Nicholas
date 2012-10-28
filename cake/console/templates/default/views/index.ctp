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
<div class="page_<?php echo $pluralVar;?> index">
	<h1><?php echo "<?php __('{$pluralHumanName}');?>";?></h1>
    <?php echo '
    <?php echo $this->Session->flash(); ?>
    ' 
    ?>
    
    <br />
	<table cellpadding="0" cellspacing="0" class="tablesorter">
    <?php
    echo '<?php 
        $sortKey = $this->Paginator->sortKey(); 
        $sortDir = $this->Paginator->sortDir(); 
    ?>
    '
    ?>
	<tr>
	<?php  foreach ($fields as $field):?>
		<th class="header <?php echo "<?php if(\$sortKey == '{$modelClass}.{$field}' && \$sortDir == 'asc'): ?>headerSortUp<?php elseif(\$sortKey == '{$modelClass}.{$field}' && \$sortDir == 'desc'): ?>headerSortDown<?php endif; ?>" ?>"><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>";?></th>
	<?php endforeach;?>
		<th class="actions"><?php echo "<?php __('Actions');?>";?></th>
	</tr>
	<?php
	echo "<?php
	\$i = 0;
	foreach (\${$pluralVar} as \${$singularVar}):
		\$class = null;
		if (\$i++ % 2 == 0) {
			\$class = ' class=\"even\"';
		} else {
            \$class = ' class=\"odd\"';
		}
	?>\n";
	echo "\t<tr<?php echo \$class;?>>\n";
		foreach ($fields as $field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
						break;
					}
				}
			}
			if ($isKey !== true) {
				echo "\t\t<td><?php echo \${$singularVar}['{$modelClass}']['{$field}']; ?>&nbsp;</td>\n";
			}
		}

		echo "\t\t<td class=\"actions\">\n";
        echo "\t\t\t<?php echo \$this->Html->link(\$this->Html->image('admin/ico-delete.gif', array('alt' => __('Delete', true), 'title' => __('Delete', true), 'class' => 'ico')), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false), sprintf(__('Are you sure you want to delete # %s?', true), \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
        echo "\t\t\t<?php echo \$this->Html->link(\$this->Html->image('admin/ico-edit.gif', array('alt' => __('Edit', true), 'title' => __('Edit', true), 'class' => 'ico')), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false)); ?>\n";
		echo "\t\t\t<?php echo \$this->Html->link(\$this->Html->image('admin/ico-show.gif', array('alt' => __('Show', true), 'title' => __('Show', true), 'class' => 'ico')), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false)); ?>\n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";

	echo "<?php endforeach; ?>\n";
	?>
	</table>
    <?php echo '
	<?php echo $this->element(\'paginator_bottom\'); ?>
    ' 
    ?>
</div>
<div class="actions">
	<h3><?php echo "<?php __('Actions'); ?>"; ?></h3>
	<ul>
		<li><?php echo "<?php echo \$this->Html->link(__('New " . $singularHumanName . "', true), array('action' => 'add')); ?>";?></li>
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
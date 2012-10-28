<?php
class Action extends AppModel {
	var $name = 'Action';

	var $hasMany = array(
		'Teams' => array(
			'className' => 'Team',
			'foreignKey' => 'action_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'Team.id desc'
		)
	);

	var $validate = array(
		'title' => array(
            'rule' => 'notempty',
            'required' => true,
            'message' => 'Введіть назву акції.'                
		),
        'date' => array(
			'rule' => 'date',
            'allowEmpty' => true,
            'message' => 'Введіть коректну дату'
        )
	);

}
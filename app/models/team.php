<?php

class Team extends AppModel {

	public $name = 'Team';

	public $belongsTo = array(
		'Leader' => array(
			'className' => 'Volunteer',
			'foreignKey' => 'leader_id'
		),
        'Action' => array(
            'className' => 'Action',
            'foreignKey' => 'action_id'
        )
	);

    public $hasAndBelongsToMany = array(
        'Volunteers'
    );

	public $validate = array(
		'action_id' => array(
            'rule' => 'notempty',
            'required' => true,
            'message' => 'Виберіть акцію.'                
		),
        'leader_id' => array(
            'rule' => 'notempty',
            'allowEmpty' => true,
            'message' => 'Виберіть керівника групи.'                
		),
        'members_number' => array(
			'rule' => 'numeric',
            'required' => true, 
            'message' => 'Некоректна кількість учасників.'
        )
	);

    public function beforeValidate()
    {
        $this->data['Team']['members_number'] = count($this->data['Team']['members_ids']);
        return true;
    }

}
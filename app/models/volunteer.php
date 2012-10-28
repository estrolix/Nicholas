<?php
class Volunteer extends AppModel {
	var $name = 'Volunteer';

	var $belongsTo = array(
		'Street' => array(
			'className' => 'Street',
			'foreignKey' => 'street_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $validate = array(
		'first_name' => array(
            'rule' => 'notempty',
            'required' => true,
            'message' => 'Введіть прізвище.'                
		),
        'last_name' => array(
            'rule' => 'notempty',
            'allowEmpty' => true,
            'message' => 'Введіть ім\'я.'                
		),
        'birthday' => array(
			'rule' => 'date',
            'allowEmpty' => true, 
            'message' => 'Введіть коректну дату'
        ),
        'email' => array(
			'rule' => 'email',
            'allowEmpty' => true, 
            'message' => 'Введіть коректний e-mail'
        )
	);
    
    var $virtualFields = array(
                            'age' => "DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(birthday, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(birthday, '00-%m-%d'))",
                            'full_name' => 'CONCAT(first_name, " ", last_name)'
                            );

    var $displayField = 'full_name';

}
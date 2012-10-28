<?php
class Child extends AppModel {
	var $name = 'Child';

	var $belongsTo = array(
		'Street' => array(
			'className' => 'Street',
			'foreignKey' => 'street_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Source' => array(
			'className' => 'Source',
			'foreignKey' => 'source_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DeleteReason' => array(
			'className' => 'DeleteReason',
			'foreignKey' => 'delete_reason_id',
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
		'third_name' => array(
            'rule' => 'notempty',
            'allowEmpty' => true,
            'message' => 'Введіть по-батькові.'                
		),
        'birthday' => array(
			'rule' => 'date',
            'allowEmpty' => true, 
            'message' => 'Введіть коректну дату'
        ),
        'street_id' => array(
			'rule' => 'numeric',
			'required' => true,
            'message' => 'Виберіть вулицю'
        ),
        'house' => array(
			'rule' => 'numeric',
            'required' => true, 
            'message' => 'Введіть номер будинку'
        ),
        'private_house' => array(
            'rule' => 'boolean',
            'allowEmpty' => true, 
            'message' => 'Некоректне значення'
        )
	);
    
    var $virtualFields = array(
                            'age' => "DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(birthday, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(birthday, '00-%m-%d'))"
                            );

}
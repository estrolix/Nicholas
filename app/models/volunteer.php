<?php
class Volunteer extends AppModel
{
	public $belongsTo = array(
		'Street' => array(
			'className' => 'Street',
			'foreignKey' => 'street_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasOne = array('Howfound', 'Jobdirection');

	/*public $hasAndBelongsToMany = array(
		'Jobdirection' =>
			array(
				//'className'              => 'Jobdirection',
				'joinTable'              => 'volunteers_jobdirections'
			)
	);*/

	public $validate = array(
		'first_name' => array(
			'rule' => 'notempty',
			'required' => true,
			'message' => 'Введіть ім\'я.'                
		),
		'last_name' => array(
			'rule' => 'notempty',
			'required' => true,
			'message' => 'Введіть прізвище'                
		),
		'birthday' => array(
			'rule' => 'date',
			'allowEmpty' => false, 
			'message' => 'Введіть коректну дату'
		),
		'email' => array(
			'rule' => 'email',
			'allowEmpty' => true, 
			'message' => 'Введіть коректний e-mail'
		),
		'phone' => array(
			'rule' => 'notempty',
			'allowEmpty' => true,
			'message' => 'Введіть телефон.'                
		),
		'gender' => array(
			'rule' => array('inList', array('m', 'f'))
		)
	);
	
	public $virtualFields = array(
							'age' => "DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(birthday, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(birthday, '00-%m-%d'))",
							'full_name' => 'CONCAT(first_name, " ", last_name)'
							);

	public $displayField = 'full_name';

}
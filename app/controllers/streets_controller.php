<?php

class StreetsController extends AppController {

	var $name = 'Streets';

	function index() {
		$this->set('streets', $this->paginate());
	}

	function view($id = null)
	{
		if (!$id) {
			$this->Session->setFlash(__('Неправильний ID вулиці', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}

		$this->loadModel('Child');
		$this->loadModel('DeleteReason');

		//$this->Child->contain(array('Category', 'Street', 'Source'));
		//$children = $this->Child->find('all', array('conditions' => array('Child.street_id' => $id, 'Child.is_deleted' => 0), 'order' => 'Child.first_name ASC'));

		$this->paginate['Child'] = array(
	        'order' => 'Child.first_name ASC',
	        'limit' => 100,
	        'contain' => array('Category', 'Street', 'Source'),
	        'conditions' => array('is_deleted' => 0, 'street_id' => $id)
	    );

	    $children = $this->paginate('Child');
		$childrenJSON = json_encode($this->Child->find('all', array('conditions' => array('Child.street_id' => $id, 'Child.is_deleted' => 0))));
		$street = $this->Street->read(null, $id);
		$deleteReasons = $this->DeleteReason->find('list');

		$this->set(compact('children', 'childrenJSON', 'street', 'deleteReasons'));
	}

	function add()
	{
		if (!empty($this->data)) {
			$this->Street->create();
			if ($this->Street->save($this->data)) {
				$this->Session->setFlash(__('Вулиця успішно додана.', true), 'flash_done');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Помилка збереження. Перевірте правильність введених даних.', true), 'flash_warning');
			}
		}
	}

	function edit($id = null)
	{
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Неправильний ID вулиці', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Street->save($this->data)) {
				$this->Session->setFlash(__('Вулиця успішно збережена', true), 'flash_done');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Помилка збереження. Перевірте правильність введених даних.', true), 'flash_warning');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Street->read(null, $id);
		}
	}

	function delete($id = null)
	{
		if (!$id) {
			$this->Session->setFlash(__('Неправильний ID вулиці', true), 'flash_error');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Street->delete($id)) {
			$this->Session->setFlash(__('Вулиця видалена.', true), 'flash_done');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Помилка видалення вулиці. Спробуйте ще раз.', true), 'flash_warning');
		$this->redirect(array('action' => 'index'));
	}
    
    function autosuggest()
    {       
        $response = array();
        
        $streets = $this->Street->find('list', array('conditions' => array('title LIKE' => "%{$this->data['search']}%")));
        
        if(!$streets)
            exit(json_encode($response));
        
        foreach($streets as $id => $title) {
            $response[] = array('id' => $id, 'name' => $title); 
        }
        
        exit(json_encode($response));    
    }
}
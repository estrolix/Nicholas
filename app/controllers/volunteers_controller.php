<?php
class VolunteersController extends AppController {

	var $name = 'Volunteers';
    
    var $paginate = array(
        'order' => 'Volunteer.id DESC',
        'limit' => 10,
        'contain' => array('Street')
    );

	function index()
    {
        $volunteers = $this->paginate();
        $streets = $this->Volunteer->Street->find('list');
        
		$this->set(compact('volunteers', 'streets'));
	}

	function view($id = null)
    {
        $this->Volunteer->id = $id;
        
		if (!$id || !$this->Volunteer->exists()) {
			$this->Session->setFlash(__('Неправильний ID волонтера', true), 'flash_error');
			$this->redirect($this->referer(array('action' => 'index')));
		}
        
        $this->Volunteer->contain(array('Street'));
		$this->set('volunteer', $this->Volunteer->read());
	}

	function add()
    {
		if (!empty($this->data)) {
			$this->Volunteer->create();
			if ($this->Volunteer->save($this->data)) {
				$this->Session->setFlash(__('Дані успішно збережено.', true), 'flash_done');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Помилка збереження. Перевірте правильність введених даних.', true), 'flash_warning');
			}
		}
		
        $streets = $this->Volunteer->Street->find('list');
        
		$this->set(compact('streets'));
	}

	function edit($id = null)
    {
		$this->Volunteer->id = $id;
        
		if (!$id || !$this->Volunteer->exists()) {
			$this->Session->setFlash(__('Неправильний ID волонтера', true), 'flash_error');
			$this->redirect($this->referer(array('action' => 'index')));
		}
        
		if (!empty($this->data)) {
			if ($this->Volunteer->save($this->data)) {
				$this->Session->setFlash(__('Дані успішно змінено', true), 'flash_done');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Помилка збереження. Перевірте правильність введених даних.', true), 'flash_warning');
			}
		}
        
		if (empty($this->data)) {
			$this->data = $this->Volunteer->read(null, $id);
		}
        
		$streets = $this->Volunteer->Street->find('list');
        
		$this->set(compact('streets'));
	}

	function delete($id = null)
    {       
		$this->Volunteer->id = $id;
        
		if (!$id || !$this->Volunteer->exists()) {
			$this->Session->setFlash(__('Неправильний ID волонтера', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
        
		if ($this->Volunteer->delete($id)) {
			$this->Session->setFlash(__('Волонтер був видалений зі списку.', true), 'flash_done');
		} else {
            $this->Session->setFlash(__('Помилка видалення', true), 'flash_warning');  
		}
        
        $this->redirect(array('action'=>'index'));
	}

}
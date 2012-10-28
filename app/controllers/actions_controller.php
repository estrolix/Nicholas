<?php

class ActionsController extends AppController {

	var $name = 'Actions';

	function index()
	{
		$this->set('actions', $this->paginate());
		$this->set('actionsList', $this->Action->find('list'));
		$this->set('current_action_id', $this->settings('current_action_id'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Неправильний ID акції', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		
		$action = $this->Action->read(null, $id);

		if(!$action) {
			$this->Session->setFlash(__('Неправильний ID акції', true), 'flash_error');
			$this->redirect(array('action' => 'index'));	
		}

		$this->set('action', $action);
	}

	function add() {
		if (!empty($this->data)) {
			$this->Action->create();
			if ($this->Action->save($this->data)) {
				$this->Session->setFlash(__('Акція успішно збережена', true), 'flash_done');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Помилка збереження. Перевірте правильність введених даних.', true), 'flash_warning');
			}
		}
	}

	function edit($id = null)
	{
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Неправильний ID акції', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Action->save($this->data)) {
				$this->Session->setFlash(__('Акція успішно збережена', true), 'flash_done');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Помилка збереження. Перевірте правильність введених даних.', true), 'flash_warning');
			}
		}
		if (empty($this->data)) {
			$action = $this->Action->read(null, $id);

			if(!$action) {
				$this->Session->setFlash(__('Неправильний ID акції', true), 'flash_error');
				$this->redirect(array('action' => 'index'));	
			}

			$this->data = $action;
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Неправильний ID акції', true), 'flash_error');
			$this->redirect(array('action'=>'index'));
		}

		if($id == $this->settings('current_action_id')) {
			$this->Session->setFlash(__('Акція не може бути видалена, поки вона є актуальною.', true), 'flash_warning');
			$this->redirect(array('action'=>'index'));	
		}

		if ($this->Action->delete($id)) {
			$this->Session->setFlash(__('Акція видалена', true), 'flash_done');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Помилка видалення акції', true), 'flash_warning');
		$this->redirect(array('action' => 'index'));
	}

	function change_current_action()
	{
		if(empty($this->data['Setting']['action_id'])) {
			$this->Session->setFlash(__('Неправильний ID акції', true), 'flash_error');
			$this->redirect($this->referer(array('action' => 'index')));
		}

		$this->Action->id = $this->data['Setting']['action_id'];

		if(!$this->Action->exists()) {
			$this->Session->setFlash(__('Неправильний ID акції', true), 'flash_error');
		} else {
			$this->saveSettings('current_action_id', $this->data['Setting']['action_id']);
			$this->Session->setFlash(__('Зміни збережено', true), 'flash_done');
		}

		$this->redirect($this->referer(array('action' => 'index')));
	}
}
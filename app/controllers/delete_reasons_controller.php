<?php
class DeleteReasonsController extends AppController {

	var $name = 'DeleteReasons';

	function index() {
		$this->set('deleteReasons', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Неправильний ID причини видалення', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('deleteReason', $this->DeleteReason->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->DeleteReason->create();
			if ($this->DeleteReason->save($this->data)) {
				$this->Session->setFlash(__('Причина успішно збережена', true), 'flash_done');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Помилка збереження. Перевірте правильність введених даних.', true), 'flash_warning');
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Неправильний ID причини видалення', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->DeleteReason->save($this->data)) {
				$this->Session->setFlash(__('Причина успішно збережена', true), 'flash_done');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Помилка збереження. Перевірте правильність введених даних.', true), 'flash_warning');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->DeleteReason->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Неправильний ID причини видалення', true), 'flash_error');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->DeleteReason->delete($id)) {
			$this->Session->setFlash(__('Причина успішно видалена', true), 'flash_done');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Помилка видалення', true), 'flash_warning');
		$this->redirect(array('action' => 'index'));
	}
}
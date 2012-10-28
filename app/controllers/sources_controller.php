<?php
class SourcesController extends AppController {

	var $name = 'Sources';

	function index() {
		$this->Source->recursive = 0;
		$this->set('sources', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Неправильний ID джерела', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('source', $this->Source->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Source->create();
			if ($this->Source->save($this->data)) {
				$this->Session->setFlash(__('Джерело успішно збережене', true), 'flash_done');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Помилка збереження. Перевірте правильність введених даних.', true), 'flash_warning');
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Неправильний ID джерела', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Source->save($this->data)) {
				$this->Session->setFlash(__('Джерело успішно збережене', true), 'flash_done');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Помилка збереження. Перевірте правильність введених даних.', true), 'flash_warning');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Source->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Неправильний ID джерела', true), 'flash_error');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Source->delete($id)) {
			$this->Session->setFlash(__('Джерело видалено', true), 'flash_done');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Помилка видалення джерела', true), 'flash_warning');
		$this->redirect(array('action' => 'index'));
	}
}
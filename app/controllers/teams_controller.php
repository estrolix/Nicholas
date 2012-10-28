<?php

class TeamsController extends AppController {

	var $name = 'Teams';

	function index()
	{

		$this->paginate['contain'] = array('Volunteers' => 
											array('fields' => 'id', 'first_name', 'last_name', 'birthday', 'phone', 'email')
										  );
		$this->set('teams', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Неправильний ID групи', true), 'flash_error');
			$this->redirect(array('team' => 'index'));
		}
		
		$team = $this->Team->read(null, $id);

		if(!$team) {
			$this->Session->setFlash(__('Неправильний ID групи', true), 'flash_error');
			$this->redirect(array('team' => 'index'));	
		}

		$this->set('team', $team);
	}

	function add() {
		if (!empty($this->data)) {
			$this->Team->create();
			if ($this->Team->save($this->data)) {
				$teams_volunteers = array();
				foreach($this->data['Team']['members_ids'] as $member_id) {
					$teams_volunteers[] = array('team_id' => $this->Team->id, 'volunteer_id' => $member_id);
				}
				$this->Team->TeamsVolunteer->saveAll($teams_volunteers);
				$this->Session->setFlash(__('Група успішно збережена', true), 'flash_done');
				$this->redirect(array('action' => 'index'));
			} else {
				debug($this->data);
				debug($this->Team->validationErrors);
				$this->Session->setFlash(__('Помилка збереження. Перевірте правильність введених даних.', true), 'flash_warning');
			}
		}

		$freeVolunteers = ClassRegistry::init('Volunteer')->find('list', array('order' => 'full_name asc'));
		$actionsList = ClassRegistry::init('Action')->find('list');
		$current_action_id = $this->settings('current_action_id');

		$this->set(compact('freeVolunteers', 'actionsList', 'current_action_id'));
	}

	function edit($id = null)
	{
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Неправильний ID групи', true), 'flash_error');
			$this->redirect(array('team' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Team->save($this->data)) {
				$this->Session->setFlash(__('Група успішно збережена', true), 'flash_done');
				$this->redirect(array('team' => 'index'));
			} else {
				$this->Session->setFlash(__('Помилка збереження. Перевірте правильність введених даних.', true), 'flash_warning');
			}
		}
		if (empty($this->data)) {
			$team = $this->Team->read(null, $id);

			if(!$team) {
				$this->Session->setFlash(__('Неправильний ID групи', true), 'flash_error');
				$this->redirect(array('team' => 'index'));	
			}

			$this->data = $team;
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Неправильний ID групи', true), 'flash_error');
			$this->redirect(array('team'=>'index'));
		}
		if ($this->Team->delete($id)) {
			$this->Session->setFlash(__('Група видалена', true), 'flash_done');
			$this->redirect(array('team'=>'index'));
		}
		$this->Session->setFlash(__('Помилка видалення групи', true), 'flash_warning');
		$this->redirect(array('team' => 'index'));
	}
}
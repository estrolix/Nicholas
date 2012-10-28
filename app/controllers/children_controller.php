<?php
class ChildrenController extends AppController {

	var $name = 'Children';
    
    var $paginate = array(
        'order' => 'Child.id DESC',
        'limit' => 10,
        'contain' => array('Category', 'Street', 'Source'),
        'conditions' => array('is_deleted' => 0)
    );
    
    var $genders = array('m' => 'хлопчик', 'f' => 'дівчинка');

	function index()
    {
        $searchParams = $this->params['named'];
        if(!empty($this->data['Search'])) {
            $searchParams += $this->data['Search'];
        }

        $wasSearch = !empty($searchParams['search']);

        if ($wasSearch) {
            
            foreach(array('first_name', 'last_name', 'third_name') as $field) {
                if(!empty($searchParams[$field]))
                    $this->paginate['conditions'][] = array("Child.$field LIKE" => "%" . $searchParams[$field] . "%");    
            }

            $searchParams['street_id'] = empty($searchParams['streets']) ? null : explode(',', $searchParams['streets']);

            if(empty($searchParams['streets'])) {
                $searchParams['streetsJSON'] = null;    
            } else {
                $searchedStreetsList = $this->Child->Street->find('list', array('conditions' => array('Street.id' => $searchParams['street_id'])));
                $formedStreetsArray = array();
                //slightly strange way is needed to keep streets order as in the search
                foreach($searchParams['street_id'] as $id){
                    $formedStreetsArray[] = array('id' => $id, 'name' => $searchedStreetsList[$id]);
                }
                $searchParams['streetsJSON'] = json_encode($formedStreetsArray);
            }

            foreach(array('street_id', 'house', 'flat', 'private_house', 'category_id', 'source_id', 'gender') as $field) {
                if(!empty($searchParams[$field]))
                    $this->paginate['conditions'][] = array("Child.$field" => $searchParams[$field]);    
            }

            if(!empty($searchParams['age_from']))  
                $this->paginate['conditions'][] = array('Child.age >=' => $searchParams['age_from']);

            if(!empty($searchParams['age_to']))  
                $this->paginate['conditions'][] = array('Child.age <=' => $searchParams['age_to']);

        }

        $this->set('wasSearch', $wasSearch);
        $this->set('searchParams', $wasSearch ? $searchParams : false);

        $this->set('children', $this->paginate());
        
        $streets = $this->Child->Street->find('list');
		$categories = $this->Child->Category->find('list');
		$sources = $this->Child->Source->find('list');
		$deleteReasons = $this->Child->DeleteReason->find('list');
        $genders = $this->genders;
        
		$this->set(compact('streets', 'categories', 'sources', 'deleteReasons', 'genders', 'children', 'wasSearch'));
	}
    
    function deleted()
    {
        $this->paginate['conditions']['is_deleted'] = 1;
        $this->paginate['contain'][] = 'DeleteReason';
        
        $this->set('children', $this->paginate());
    }

	function view($id = null)
    {
        $this->Child->id = $id;
        
		if (!$id || !$this->Child->exists()) {
			$this->Session->setFlash(__('Неправильний ID дитини', true), 'flash_error');
			$this->redirect($this->referer(array('action' => 'index')));
		}
        
        $this->Child->contain(array('Category', 'Street', 'Source', 'DeleteReason'));
		$this->set('child', $this->Child->read());
        $this->set('deleteReasons', $this->Child->DeleteReason->find('list'));
	}

	function add()
    {
		if (!empty($this->data)) {
			$this->Child->create();
			if ($this->Child->save($this->data)) {
				$this->Session->setFlash(__('Дані успішно збережено.', true), 'flash_done');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Помилка збереження. Перевірте правильність введених даних.', true), 'flash_warning');
			}
		}
		
        $streets = $this->Child->Street->find('list');
		$categories = $this->Child->Category->find('list');
		$sources = $this->Child->Source->find('list');
		$deleteReasons = $this->Child->DeleteReason->find('list');
        $genders = $this->genders;
        
		$this->set(compact('streets', 'categories', 'sources', 'deleteReasons', 'genders'));
	}

	function edit($id = null)
    {
		$this->Child->id = $id;
        
		if (!$id || !$this->Child->exists()) {
			$this->Session->setFlash(__('Неправильний ID дитини', true), 'flash_error');
			$this->redirect($this->referer(array('action' => 'index')));
		}
        
		if (!empty($this->data)) {
			if ($this->Child->save($this->data)) {
				$this->Session->setFlash(__('Дані успішно змінено', true), 'flash_done');
				$this->redirect(array('action' => $this->Child->field('is_deleted') ? 'deleted' : 'index'));
			} else {
				$this->Session->setFlash(__('Помилка збереження даних. Зміни не внесено', true), 'flash_warning');
			}
		}
        
		if (empty($this->data)) {
			$this->data = $this->Child->read(null, $id);
		}
        
		$streets = $this->Child->Street->find('list');
		$categories = $this->Child->Category->find('list');
		$sources = $this->Child->Source->find('list');
		$deleteReasons = $this->Child->DeleteReason->find('list');
        $genders = $this->genders;
        
		$this->set(compact('streets', 'categories', 'sources', 'deleteReasons', 'genders'));
	}

	function delete($id = null, $delete_reason_id = null)
    {
        if(!empty($delete_reason_id)){
            $this->autoRender = false;
            $this->moveToDeleted($id, $delete_reason_id);
            return;
        }
        
		$this->Child->id = $id;
        
		if (!$id || !$this->Child->exists()) {
			$this->Session->setFlash(__('Неправильний ID дитини', true), 'flash_error');
			$this->redirect(array('action' => 'deleted'));
		}
        
		if ($this->Child->delete($id)) {
			$this->Session->setFlash(__('Дитина була видалена зі списку.', true), 'flash_done');
		} else {
            $this->Session->setFlash(__('Помилка видалення', true), 'flash_warning');  
		}
        
        $this->redirect(array('action'=>'deleted'));
	}
    
    function moveToDeleted($id, $delete_reason_id)
    {
        $this->Child->id = $id;
        $this->Child->DeleteReason->id = $delete_reason_id;
        
		if (!$id || !$this->Child->exists()) {
            if($this->RequestHandler->isAjax())
                exit('Неправильний ID дитини');
            else {
                $this->Session->setFlash('Неправильний ID дитини', 'flash_error');
                $this->redirect(array('action'=>'index'));
            }
		}

		if (!$delete_reason_id || !$this->Child->DeleteReason->exists()) {
            if($this->RequestHandler->isAjax())
                exit('Неправильний ID причини видалення');
            else {
                $this->Session->setFlash('Неправильний ID причини видалення', 'flash_error');
                $this->redirect(array('action'=>'index'));
            }
		}
        
        $child = array(
                        'is_deleted' => 1,
                        'delete_reason_id' => $delete_reason_id,
                        'deletion_date' => $this->getCurrentDatetime() 
                        );
        
        if ($this->Child->save(array('Child' => $child), false)) {
            if($this->RequestHandler->isAjax())
                exit('success');
            else {
                $this->Session->setFlash('Дитина була видалена зі списку', 'flash_done');
                $this->redirect(array('action'=>'index'));
            }
		} else {
		  if($this->RequestHandler->isAjax())
                exit('Помилка видалення');
            else {
                $this->Session->setFlash('Помилка видалення', 'flash_error');
                $this->redirect(array('action'=>'index'));
            }
		}
    }
    
    function renew($id = null)
    {
		$this->Child->id = $id;
        
		if (!$id || !$this->Child->exists()) {
			$this->Session->setFlash(__('Неправильний ID дитини', true), 'flash_error');
			$this->redirect(array('action' => 'deleted'));
		}
        
		$child = array(
                        'is_deleted' => 0,
                        'delete_reason_id' => null,
                        'deletion_date' => null 
                        );
        
		if ($this->Child->save(array('Child' => $child), false)) {
			$this->Session->setFlash('Дитина відновлена в списку', 'flash_done');		
		} else {
			$this->Session->setFlash('Помилка відновлення в список', 'flash_warning');
		}
        
        $this->redirect(array('action' => 'deleted'));
	}
    
    function findSimilar()
    {
        $this->autoLayout = false;
        
        //debug($this->data);
        
        $childrenGroups = array(
                                'name' => array('title' => 'За ім\'ям', 'children' => null),
                                'address' => array('title' => 'За адресою', 'children' => null),
                                'birthday' => array('title' => 'За датою народження', 'children' => null)
                                );
                                
        
        if(!empty($this->data['Child']['first_name'])) {
            $this->Child->contain(array('Category', 'Street', 'Source', 'DeleteReason'));
            $childrenGroups['name']['children'] = $this->Child->find('all', array('conditions' => array('Child.first_name LIKE' => "%{$this->data['Child']['first_name']}%"), 'order' => array('Child.first_name', 'Child.last_name', 'Child.third_name')));    
        }    
        
        $this->Child->contain(array('Category', 'Street', 'Source', 'DeleteReason'));
        $childrenGroups['address']['children'] = $this->Child->find('all', array('conditions' => array('Child.street_id' => $this->data['Child']['street_id'],
                                                                                                'Child.house' => $this->data['Child']['house'],
                                                                                                'OR' => array(
                                                                                                    'Child.private_house' => 1,
                                                                                                    'Child.flat' => $this->data['Child']['flat']
                                                                                                    )
                                                                                                ),
                                                                                'order' => array('Child.first_name', 'Child.last_name', 'Child.third_name')
                                                                    ));
                                                                                                
        $this->Child->contain(array('Category', 'Street', 'Source', 'DeleteReason'));
        $childrenGroups['birthday']['children'] = $this->Child->find('all', array('conditions' => array('Child.birthday' => $this->data['Child']['birthday']['year'] . '-' . $this->data['Child']['birthday']['month'] . '-' . $this->data['Child']['birthday']['day']),
            'order' => array('Child.first_name', 'Child.last_name', 'Child.third_name')));
        
        if(!$childrenGroups['name']['children'] && !$childrenGroups['address']['children'] && !$childrenGroups['birthday']['children']) {
            exit('success');
        }
        
        $this->set('childrenGroups', $childrenGroups);
        
        $this->render('../elements/similarChildren');   
    }
}
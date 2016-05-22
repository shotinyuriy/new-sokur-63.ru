<?php
class CategoriesController extends AppController {
	public $components = array('Session', 'Cookie');
	public function index() {
		$current_category_id = null;
		if(isset($this->request->query['id'])) {
			$current_category_id = $this->request->query['id'];
		}
		if($current_category_id == null && isset($this->Session) && $this->Session->read('current_category_id')) {
			$current_category_id = $this->Session->read('current_category_id');
		}
		$categories = $this->Category->find('all', array(
			'conditions' => array('Category.category_id' => null, 'Category.menu_visible' => 1),
		));
		$this->set(compact('current_category_id','categories'));
		
		if($current_category_id != null && isset($this->Session)) {
			$this->Session->write('current_category_id', $current_category_id);
		}
	}
	
	public function menu() {
		$categories = $this->Category->find('all', array(
			'conditions' => array('Category.category_id' => null, 'Category.menu_visible' => 1),
			'recursive' => -1
		));
		$this->set(compact('categories'));
	}
	
	public function menushort() {
		if($this->request->is('ajax')) {
			$this->layout = 'ajax';
		}
		$categories = $this->Category->find('all', array(
			'conditions' => array('Category.category_id' => null, 'Category.menu_visible' => 1),
			'recursive' => -1
		));
		$this->set(compact('categories'));
	}
	
	public function add() {
		
	}
}
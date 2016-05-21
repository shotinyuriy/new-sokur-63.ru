<?php
class CategoriesController extends AppController {
	public $components = array('Session', 'Cookie');
	public function index() {
		$categories = $this->Category->find('all', array(
			'conditions' => array('Category.category_id' => null, 'Category.menu_visible' => 1),
		));
		$this->set(compact('categories'));
	}
	
	public function menu() {
		$categories = $this->Category->find('all', array(
			'conditions' => array('Category.category_id' => null, 'Category.menu_visible' => 1),
			'recursive' => -1
		));
		$this->set(compact('categories'));
	}
}
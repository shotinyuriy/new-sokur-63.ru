<?php
require 'util.php';
require_once '../Model/TranslitComponent.php';

class CategoriesController extends AppController {
	public $uses = array('Category', 'Good');
	public $components = array('Session', 'Cookie');
	
	public function index() {
		$current_category_id = null;
		$currentCategory = array('id' => null, 'category_id' => null);
		if(isset($this->request->query['id'])) {
			$current_category_id = $this->request->query['id'];
		}
		if($current_category_id == null && isset($this->Session) && $this->Session->read('current_category_id')) {
			$current_category_id = $this->Session->read('current_category_id');
		}
		$cms = $this->request->query('cms');
		$visible = $cms ? array(0,1) : 1;
		$categories = $this->Category->find('all', array(
			'conditions' => array('Category.category_id' => null, 'Category.menu_visible' => $visible)
		));
		
		if($current_category_id != null && isset($this->Session)) {
			$this->Session->write('current_category_id', $current_category_id);
		}
		if($current_category_id != null) {
			$categoryItem = $this->Category->find('first', array(
				'conditions' => array('Category.id' => $current_category_id, 'Category.menu_visible' => $visible),
				'recursive' => 1
			));
			if($categoryItem != null) {
				$currentCategory = $categoryItem['Category'];
			}
		}
		$this->set(compact('current_category_id', 'currentCategory','categories'));
	}
	
	public function menu() {
		$categories = $this->Category->find('all', array(
			'conditions' => array('Category.category_id' => null, 'Category.menu_visible' => 1),
			'recursive' => -1
		));
		$showNews = true;
		$this->set(compact('categories', 'showNews'));
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
		if($this->request->is('post')) {
			if(FileUtils::isUploadedFile($_FILES)) {
				$translit = new TranslitComponent();				
				$id = $translit->str2id($this->request->data['Category']['name']);
				$image_url = FileUtils::saveFile($id, 'app/webroot/menu-img');
				$this->request->data['Category']['image_url'] = $image_url;
			}
			if($this->Category->save($this->request->data)) {
				$this->layout = 'ajax';
				$this->redirect('/categories?cms=true&ajax=true');
			}
		} else {
			$categoryId = $this->Session->read('current_category_id');
			$this->set(compact('categoryId'));
		}
	}
	
	public function edit($id) {
		if($this->request->is('post')) {
			if(FileUtils::isUploadedFile($_FILES)) {
				$translit = new TranslitComponent();				
				$id = $translit->str2id($this->request->data['Category']['name']);
				$image_url = FileUtils::saveFile($id, 'app/webroot/menu-img');
				$this->request->data['Category']['image_url'] = $image_url;
			}
			if($this->Category->save($this->request->data)) {
				$this->layout = 'ajax';
				$this->redirect('/categories?cms=true&ajax=true');
			}
		} else {
			$categoryItem = $this->Category->findById($id);
			$category = $categoryItem['Category'];
			$this->set(compact('category'));
		}
	}
	
	public function delete($id) {
		if($this->request->is('post')) {
			if($id != null) {
				$this->Good->deleteAll(array('Good.category_id' => $id));
				$this->Category->delete($id, true);
				$this->layout = 'ajax';
				$this->redirect('/categories?cms=true&ajax=true');
			}
		} else {
			$categoryItem = $this->Category->findById($id);
			$category = $categoryItem['Category'];
			$this->set(compact('category'));
		}
	}
}
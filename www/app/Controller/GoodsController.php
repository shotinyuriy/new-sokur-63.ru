<?php
require_once '../Model/TranslitComponent.php';
require_once 'util.php';

class GoodsController extends AppController {
	
	public $uses = array('Good');
	
	public function index() {
		
	}
	
	public function viewByCategory() {
		$categoryId = null;
		if(isset($this->request->params['categoryId'])) {
			$categoryId = $this->request->params['categoryId'];
		}
		if($categoryId == null) {
			$categoryId = $this->Session->read('current_category_id');
		}
		$goods = $this->Good->find('all', array(
			'conditions' => array('Good.category_id' => $categoryId),
			'recursive' => 1
		));
		$this->Session->write('current_category_id', $categoryId);
		if($this->request->query('cms')) {
			$good_item_classes = "col-lg-3 col-md-4 col-sm-6 col-xs-12";
		} else {
			$good_item_classes = "col-lg-4 col-md-6 col-sm-12 col-xs-12";
		}
		$this->set(compact('goods', 'good_item_classes'));
	}
	
		
	public function popular() {
		if($this->request->is('ajax')) {
			$this->layout = 'ajax';
		}
		$query =
"SELECT
g.`id`
FROM (
	SELECT SUM(od.`amount`) as sum_amount, od.`good_id` as good_id
    FROM `order_details` od
    GROUP BY od.`good_id`
    ORDER BY SUM(od.`amount`) DESC
) AS pop
JOIN `goods` g ON g.id = pop.`good_id`
JOIN `categories` c ON c.`id` = g.`category_id`
WHERE g.`menu_visible` IN(1) AND c.`menu_visible` IN(1)
ORDER BY g.`sort_index`
LIMIT 0, 12";
		$goods = $this->Good->query($query);
		if($goods != null) {
			$goodIds = array();
			foreach($goods as $good) {
				$goodIds[] = $good['g']['id'];	
			}
			$goods = $this->Good->find('all', array(
				'conditions' => array('Good.id IN' => $goodIds)
			));
		} else {
			$goods = $this->Good->find('all', array(
				'conditions' => array(
					'Good.menu_visible' => 1,
					'Category.menu_visible' => 1),
				'limit' => 4
			));
		}
		$good_item_classes = "col-lg-3 col-md-4 col-sm-6 col-xs-12";
		$this->set(compact('goods', 'good_item_classes'));
		$this->render('view_by_category');
	}

	public function add() {
		$categoryId = $this->Session->read('current_category_id');
		if($this->request->is('post')) {
			//debug($this->request->data);
			//debug($_FILES);
			if(FileUtils::isUploadedFile($_FILES)) {
				$translit = new TranslitComponent();
				$id = $translit->str2id($this->request->data['Good']['name']);
				$image_url = FileUtils::saveFile($id, 'app/webroot/menu-img');
				$this->request->data['Good']['image_url'] = $image_url;
			}
			if($this->Good->save($this->request->data)) {
				$this->layout='ajax';
				$this->redirect("/categories/$categoryId/goods?cms=true&ajax=true");
			}
		} else {
			$this->set(compact('categoryId'));
		}
	}

	public function edit($id) {
		if($this->request->is('post')) {
			$categoryId = $this->Session->read('current_category_id');
			//debug($this->request->data);
			//debug($_FILES);
			if(FileUtils::isUploadedFile($_FILES)) {
				$translit = new TranslitComponent();				
				$id = $translit->str2id($this->request->data['Good']['name']);
				$image_url = FileUtils::saveFile($id, 'app/webroot/menu-img');
				$this->request->data['Good']['image_url'] = $image_url;
			}
			if($this->Good->save($this->request->data)) {
				$this->layout='ajax';
				$this->redirect("/categories/$categoryId/goods?cms=true&ajax=true");
			}
		} else {
			$goodItem = $this->Good->findById($id);
			$good = $goodItem['Good'];
			$category = $goodItem['Category'];
			$this->set(compact('good', 'category'));
		}
	}
	
	public function delete($id) {
		$categoryId = $this->Session->read('current_category_id');
		if($this->request->is('post')) {
			if($id != null) {
				$this->Good->delete($id);
				$this->layout='ajax';
				$this->redirect("/categories/$categoryId/goods?cms=true&ajax=true");
			}
		} else {
			$goodItem = $this->Good->findById($id);
			$good = $goodItem['Good'];
			$this->set(compact('good'));
		}
	}
	
	public function view($id) {
		$goodItem = $this->Good->findById($id);
		$good = $goodItem['Good'];
		$this->set(compact('good'));
	}
}

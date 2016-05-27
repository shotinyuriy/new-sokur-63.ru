<?php
require_once '../Model/TranslitComponent.php';
require_once 'util.php';

class GoodsController extends AppController {
	
	public $uses = array('Good');
	
	public function calculateHours($data) {
		$hoursPack = $data['Good']['shelf_life_pack_days'] * 24;
		$hoursPack += $data['Good']['shelf_life_pack_hours'] * 1;
		$hoursUnpack = $data['Good']['shelf_life_unpack_days'] * 24;
		$hoursUnpack += $data['Good']['shelf_life_unpack_hours'] * 1;
		$data['Good']['shelf_life_pack'] = $hoursPack;
		$data['Good']['shelf_life_unpack'] = $hoursUnpack;
		
		$data['Good']['shelf_life_pack_days'] = null;
		$data['Good']['shelf_life_pack_hours'] = null;
		$data['Good']['shelf_life_unpack_days'] = null;
		$data['Good']['shelf_life_unpack_hours'] = null;
		
		return $data;
	}
	
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
		$this->Paginator->settings = array(
			'conditions' => array('Good.category_id' => $categoryId),
			'limit'=> 2,
			'order' => 'Good.sort_index',
			'recursive' => 1
		);
		$goods = $this->Paginator->paginate('Good');
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
			$data = $this->request->data;
			if(FileUtils::isUploadedFile($_FILES)) {
				$translit = new TranslitComponent();
				$id = $translit->str2id($data['Good']['name']);
				$image_url = FileUtils::saveFile($id, 'app/webroot/menu-img');
				$data['Good']['image_url'] = $image_url;
			}
			$data = $this->calculateHours($data);
			if($this->Good->save($data)) {
				$this->layout='ajax';
				$this->redirect("/categories/$categoryId/goods?cms=true&ajax=true");
			}
		} else {
			$this->set(compact('categoryId'));
		}
	}

	public function edit($id) {
		$categoryId = $this->Session->read('current_category_id');
		if($this->request->is('post')) {
			$data = $this->request->data;
			if(FileUtils::isUploadedFile($_FILES)) {
				$translit = new TranslitComponent();				
				$id = $translit->str2id($data['Good']['name']);
				$image_url = FileUtils::saveFile($id, 'app/webroot/menu-img');
				$data['Good']['image_url'] = $image_url;
			}
			$data = $this->calculateHours($data);
			if($this->Good->save($data)) {
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

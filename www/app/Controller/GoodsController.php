<?php
class GoodsController extends AppController {
	
	public function index() {
		
	}
	
	public function viewByCategory() {
		if($this->request->is('ajax')) {
			$this->layout = 'ajax';
		}
		$categoryId = $this->request->params['categoryId'];
		$goods = $this->Good->find('all', array(
			'conditions' => array('Good.category_id' => $categoryId),
			'recursive' => 1
		));
		$this->set(compact('goods'));
	}
}

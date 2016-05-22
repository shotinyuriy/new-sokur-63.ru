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
	
		
	public function popular() {
		if($this->request->is('ajax')) {
			$this->layout = 'ajax';
		}
		$query =
"SELECT
g.`id`
FROM (
	SELECT SUM(od.`amount`) as sum_amount, p.`good_id` as good_id
    FROM `portions` p
    JOIN `order_details` od ON od.`portion_id` = p.`id`
    GROUP BY p.`good_id`
    ORDER BY SUM(od.`amount`) DESC
) AS pop
JOIN `goods` g ON g.id = pop.`good_id`
JOIN `categories` c ON c.`id` = g.`category_id`
WHERE g.`menu_visible` IN(1) AND c.`menu_visible` IN(1)
ORDER BY g.`sort_index`
LIMIT 0, 12";
		$goods = $this->Good->query($query);
		$goodIds = array();
		foreach($goods as $good) {
			$goodIds[] = $good['g']['id'];	
		}
		$goods = $this->Good->find('all', array(
			'conditions' => array('Good.id IN' => $goodIds)
		));
		$this->set(compact('goods'));
	}

	public function add() {
		if($this->request->is('post')) {
			$categoryId = $this->Session->read('current_category_id');
					
			if($this->Good->save($this->request->data)) {
				$this->Session->setFlash('Товар добавлен');
			}
		}
		
	}
}

<?php
	
function calculateCartTotal($cart) {
	$total = 0;
	foreach($cart['OrderDetail'] as $orderDetail) {
		if(isset($orderDetail['cost'])) {
			$total += $orderDetail['cost'];
		}
	}
	return $total;
}
class CartController extends AppController {
	
	public $uses='Portion';
	
	public function total() {
		if(isset($this->Session)) {
			if($this->request->is('ajax')) {
				$this->layout = 'ajax';
			}
			
			if($this->Session->read('cart') != null) {
				$cart = $this->Session->read('cart');
				$total = calculateCartTotal($cart);
			} else {
				$total = 0;
			}
			$this->set(compact('total'));
		}
	}
	
	public function buy() {
		if(isset($this->Session)) {
			if($this->request->is('post')) {
				if($this->request->is('ajax')) {
					$this->layout = 'ajax';
				}
				
				if($this->Session->read('cart') != null) {
					$cart = $this->Session->read('cart');
				} else {
					$cart = array();
					$cart['OrderDetail'] = array();
				}
				$newOrderDetails = $this->request->data;
				$portionId = $newOrderDetails['portion_id'];
				$amount = $newOrderDetails['amount'];
	
				$portion = $this->Portion->find('first', array(
					'conditions' => array('Portion.id' => $portionId)
				));
	
				debug($portion);
				if($portion != null) {
					if(isset($cart['OrderDetail'][$portionId])) {			
						$orderDetails = $cart['OrderDetail'][$portionId];
						$orderDetails['amount'] += $newOrderDetails['amount'];
					} else {
						$orderDetails = $newOrderDetails;
					}
					$orderDetails['price'] = $portion['Portion']['price'];
					$orderDetails['cost'] = $orderDetails['price'] * $orderDetails['amount'];
				}
				
				$cart['OrderDetail'][$portionId] = $orderDetails;
				
				$this->Session->write('cart', $cart);
				
				$total = calculateCartTotal($cart);
				$this->set(compact('total'));
			}
		}
	}
}
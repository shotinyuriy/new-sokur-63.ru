<?php

function freeShippingTreshold() {
	return 500;
}

function defaultShippingCost() {
	return 400;
}

function calculateCartTotal($cart) {
	$total = 0;
	foreach ($cart['OrderDetail'] as $orderDetail) {
		if (isset($orderDetail['cost'])) {
			$total += $orderDetail['cost'];
		}
	}
	$cart['merchandise_cost'] = $total;
	if($total < freeShippingTreshold()) {
		$cart['shipping_cost'] = defaultShippingCost();
		$total += $cart['shipping_cost']; 		
	} else {
		$cart['shipping_cost'] = 0;
	}
	$cart['total'] = $total;
	
	return $cart;
}

class CartController extends AppController {

	public $uses = array('Good', 'Order');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('delete', 'cancel');
	}

	public function initializeCart() {
		if ($this -> Session -> read('cart') != null) {
			$cart = $this -> Session -> read('cart');
		} else {
			$cart = array();
			$cart['OrderDetail'] = array();
		}
		return $cart;
	}

	public function total() {
		if (isset($this -> Session)) {
			$cart = $this -> initializeCart();
			$cart = calculateCartTotal($cart);
			$this -> set(compact('cart'));
		}
	}

	public function buy() {
		$this->layout = 'ajax';
		if (isset($this -> Session)) {
			if ($this -> request -> is('post')) {
				$cart = $this -> initializeCart();
				$newOrderDetails = $this -> request -> data;
				$portionId = $newOrderDetails['good_id'];
				$amount = $newOrderDetails['amount'];

				$portion = $this -> Good -> find('first', array('conditions' => array('Good.id' => $portionId)));
				if ($portion != null) {
					if (isset($cart['OrderDetail'][$portionId])) {
						$orderDetails = $cart['OrderDetail'][$portionId];
						$orderDetails['amount'] += $newOrderDetails['amount'];
					} else {
						$orderDetails = $newOrderDetails;
					}
					$orderDetails['price'] = $portion['Good']['price'];
					$orderDetails['cost'] = $orderDetails['price'] * $orderDetails['amount'];
				}
				$orderDetails['Good'] = $portion['Good'];

				$cart['OrderDetail'][$portionId] = $orderDetails;

				$this -> Session -> write('cart', $cart);

				$cart = calculateCartTotal($cart);
				$this -> set(compact('cart'));
				$this -> render('total');
			}
		}
	}

	public function decrease() {
		$this->getCartAndAddAmount(-1);
	}
	
	public function increase() {
		$this->getCartAndAddAmount(+1);
	}
	
	public function delete($id) {
		$cart = $this->initializeCart();
		if(isset($cart['OrderDetail'][$id])) {
			unset($cart['OrderDetail'][$id]);
			$this->Session->write('cart', $cart);
		}
		$this->layout = 'ajax';
		$this->redirect('/cart');
	}
	
	public function cancel() {
		if($this->request->is('post')) {
			$this->Session->delete('cart');
			$cart = $this->initializeCart();
			$this->redirect('/cart');
		}
	}
		
	public function getCartAndAddAmount($amount) {
		$this->layout = 'ajax';
		$cart = $this -> initializeCart();
		$portionId = $this -> request -> params['portionId'];
		$cart = $this->addAmount($cart, $portionId, $amount);
		$this->layout = 'ajax';
		$this->redirect('/cart');
	}
	
	public function addAmount($cart, $portionId, $amount) {
		$portion = $this -> Good -> find('first', 
			array('conditions' => array('Good.id' => $portionId)));
		
		if ($portion != null) {
			if (isset($cart['OrderDetail'][$portionId])) {
				
				$orderDetails = $cart['OrderDetail'][$portionId];
				$orderDetails['amount'] += $amount;
				$orderDetails['price'] = $portion['Good']['price'];
				$orderDetails['cost'] = $orderDetails['price'] * $orderDetails['amount'];
				$cart['OrderDetail'][$portionId] = $orderDetails;
				$this -> Session -> write('cart', $cart);
			}
		}
		
		return $cart;
	}

	public function index() {
		$cart = $this -> initializeCart();
		if(count($cart['OrderDetail']) > 0) {
			$cart = calculateCartTotal($cart);
			$freeShippingTreshold = freeShippingTreshold();
			$this -> set(compact('cart', 'freeShippingTreshold'));
		} else {
			$this->render('empty');
		}
	}

}

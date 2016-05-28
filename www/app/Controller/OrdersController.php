<?php

class OrdersController extends AppController {
	public $status_names = array( "Принят", "Отменен", "Готов", "Выполнен" );

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
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

	function calculateCartTotal($order) {
		$total = 0;
		foreach($order['OrderDetail'] as $orderDetail) {
			if(isset($orderDetail['cost'])) {
				$total += $orderDetail['cost'];
			}
		}
		return $total;
	}
	
	function status_name($status) {
		return $this->status_names[ $status ];
	}
	
	function available_statuses($status) {
		$statuses = array();
		if( $status != 1 && $status != 3 ) {
			for( $i = 1; $i < count( $this->status_names ); $i++ ) {
				if( $status != $i ) {		
					$statuses[] = array('id'=>$i, 'name' => $this->status_names[$i]);
				}
			}
		}
		return $statuses;
	}

	public function index() {
		
		$orders = $this->Order->find('all');
		$newOrders = array();
		foreach($orders as $order) {
			$total = $this->calculateCartTotal($order);
			$order['Order']['total']=$total;
			$order['Order']['status_name']=$this->status_name($order['Order']['status']);
			$order['Order']['available_statuses']=$this->available_statuses($order['Order']['status']);
			$newOrders[] = $order;
		}
		$orders = $newOrders;
		$this->set(compact('orders'));
	}
	
	public function add() {
		if($this->request->is('post')) {
			$cart = $this->initializeCart();
			$orderItem = array('Order' => $order = $this->request->data);
			$currentTime = date('Y-m-d H:i:s');
			$orderItem['Order']['date_time'] = $currentTime; 
			$orderItem['OrderDetail'] = array();
			foreach($cart['OrderDetail'] as $orderDetail) {
				$orderItem['OrderDetail'][] = $orderDetail;
			}
			if( $this->Order->saveAssociated($orderItem) ) {
				$orderItem = $this->Order->find('first', array(
					'conditions' => array('Order.date_time' => $currentTime),
					'recursive' => 2
				));
				$order = $orderItem['Order'];
				$orderDetails = $orderItem['OrderDetail'];
				$total = $this->calculateCartTotal($orderItem);
				$this->set(compact('order', 'orderDetails','total'));
				$this->Session->delete('cart');
				$this->layout = 'ajax';
				$this->render('saved');
				return;
			} else {
				$errors = $this->Order->validationErrors;
				$this->layout = 'ajax';
				$this->set(compact('errors'));
			}
		}
	}
}
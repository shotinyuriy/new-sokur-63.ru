<?php

class OrdersController extends AppController {
	public $uses = array('Order', 'Good');
	public $status_names = array( 
		array('id' => 0, 'name' => "Принят", 'class' => 'btn-primary'), 
		array('id' => 1,'name' => "Отменен", 'class' => 'btn-danger'),
		array('id' => 2,'name' => "Готов", 'class' => 'btn-primary'),
		array('id' => 3,'name' => "Выполнен(Доставлен)", 'class' => 'btn-success')
	);

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
		return $this->status_names[ $status ]['name'];
	}
	
	function available_statuses($status) {
		$statuses = array();
		if( $status != 1 && $status != 3 ) {
			for( $i = 1; $i < count( $this->status_names ); $i++ ) {
				if( $status != $i ) {		
					$statuses[] = $this->status_names[$i];
				}
			}
		}
		return $statuses;
	}

	public function index() {
		$this->Paginator->settings = array(
			'limit'=> 12,
			'order' => 'Order.date_time',
			'recursive' => 2
		);
		$orders = $this->Paginator->paginate('Order');
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
	
	public function view($id) {
		$orderItem = $this->Order->find('first', array(
			'conditions' => array('Order.id' =>$id),
			'recursive'  => 2
		));
		$defaultGoodItem = $this->Good->find('first');
		$defaultGood = $defaultGoodItem['Good'];
		foreach($defaultGood as $key => $value)  {
			$defaultGood[$key] = 'none';
		}
		$order = $orderItem['Order'];
		$orderDetails = $orderItem['OrderDetail'];
		$total = $this->calculateCartTotal($orderItem);
		$order['status_name']=$this->status_name($order['status']);
		$order['available_statuses']=$this->available_statuses($order['status']);
		$this->set(compact('order', 'orderDetails', 'defaultGood', 'total'));
	}
	
	public function move() {
		$orderId = $this -> request -> params['orderId'];
		$statusId = $this -> request -> params['statusId'];
		$orderItem = $this->Order->findById($orderId);
		$orderItem['Order']['status'] = $statusId;
		$this->Order->save($orderItem);
		$this->layout = 'ajax';
		$this->redirect("/orders/view/$orderId?cms=true");
	}
}
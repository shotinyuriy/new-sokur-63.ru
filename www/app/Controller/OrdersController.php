<?php

class OrdersController extends AppController {
	public $status_names = array( "Принят", "Отменен", "Готов", "Выполнен" );

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
}
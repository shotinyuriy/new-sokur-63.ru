<?php
class Order extends AppModel {
	public $hasMany = 'OrderDetail';
}

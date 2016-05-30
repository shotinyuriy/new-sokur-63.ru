<?php
class Order extends AppModel {
	public $hasMany = 'OrderDetail';
	
	 public $validate = array(
        'phone_number' => array(
		 	'rule' => array('phone', null, 'all'),
		 	'message' => 'Указите телефон в формате 10 цифр!'
        ),
        'customer_name' => array(
            'rule' => 'notBlank',
            'message' => 'Имя заказчика не может быть пустым!'
        ),
        'self_take' =>  array(
	        'rule' => array('boolean'),
	        'message' => 'Некорректное значаения для поля "Нужна доставка"'
	    )
    );
	
	public function beforeValidate() {
		if(isset($this->data[$this->alias]['self_take']) && $this->data[$this->alias]['self_take'] == '0') {
			$this->validator()->add('address', array(
			'addressRule' => array(
		    	'rule' => array('minLength', 6),
		    	'message' => 'Минимальная длина для адреса 6 символов!'
		    )
		));
		}
	}
}
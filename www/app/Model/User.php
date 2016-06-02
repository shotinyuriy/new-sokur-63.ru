<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	const OPERATOR = "operator";
	const ADMINISTRATOR = "admin";
	
	public $validate = array(
		'username' => array(
	        'usernameRule-1' => array(
	            'rule' => 'alphaNumeric',
	            'message' => 'В имени пользователя допустимы только латинские буквы и цифры!',
	        ),
	        'usernameRule-2' => array(
	            'rule' => array('minLength', 3),
	            'message' => 'Минимально 3 символа в имени пользователя!'
	        ),
	        'usernameRule-3' => array(
	        	'rule' => array('isUnique'),
	            'message' => 'Такой пользователь уже существует!'
			)
    	),
		'password' => array(
	        'passwordRule-1' => array(
	            'rule' => array('minLength', 6),
	            'message' => 'Минимально 6 символов в пароле!'
	        )
    	),
		'email' => array(
	        'email-notBlank' => array(
	            'rule' => array('notBlank'),
	            'message' => 'email не может быть пустым!'
	        )
    	),
    	'role' => array(
         'allowedChoice' => array(
             'rule' => array('inList', array(self::OPERATOR, self::ADMINISTRATOR)),
             'message' => 'Допустимые роли: (admin, operator)'
             )
		)
	);
	
	public function notInList($check, $array) {
		foreach ($check as $key => $curValue) {
			$value = $curValue;
			break;
		}
		return !in_array($value, $array);
	}
	
	public function beforeValidate($options = array()) {
		$this->validator()->add('password', array(
			'passwordConfirmRule' => array(
		    	'rule' => array('equalTo', $this->data[$this->alias]['confirm_password']),
		    	'message' => 'Пароли должны совпадать!'
		    )
		));
		$this->validator()->add('password', array(
			'passwordValueRule' => array(
		    	'rule' => array('notInList', array( 'admin', 'administrator', 'user', 'superuser' )),
		    	'message' => 'Недопустимое значение для пароля!'
		    )
		));
		$this->validator()->add('password', array(
			'passwordValueRule' => array(
		    	'rule' => array('notInList', array( $this->data[$this->alias]['username'])),
		    	'message' => 'Пароль не может совпадать с логином!'
		    )
		));
		if(isset($this->data[$this->alias]['old_password_confirm'])) {
			$hasher = $this->passwordHasher();
			$this->data[$this->alias]['old_password'] = $hasher->hash($this->data[$this->alias]['old_password']); 
			$this->validator()->add('old_password', array(
			'passwordConfirmRule' => array(
		    	'rule' => array('equalTo', $this->data[$this->alias]['old_password_confirm']),
		    	'message' => 'Старый пароль указан неправильно!'
		    )
		));
		}
	}
	
	public function beforeSave($options = array()) {
        if (!empty($this->data[$this->alias]['password'])) {
            $passwordHasher = $this->passwordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
	
	public function passwordHasher() {
		return new SimplePasswordHasher(array('hashType' => 'sha256'));
	}
}
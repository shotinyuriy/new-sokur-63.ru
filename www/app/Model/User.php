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
	        )
    	),
		'password' => array(
	        'passwordRule-1' => array(
	            'rule' => array('minLength', 6),
	            'message' => 'Минимально 6 символов в пароле!'
	        )
    	),
    	'role' => array(
         'allowedChoice' => array(
             'rule' => array('inList', array(self::OPERATOR, self::ADMINISTRATOR)),
             'message' => 'Допустимые роли: (admin, operator)'
             )
		)
	);
	
	public function beforeValidate() {
		$this->validator()->add('password', array(
			'passwordConfirmRule' => array(
		    	'rule' => array('equalTo', $this->data[$this->alias]['confirm_password']),
		    	'message' => 'Пароли должны совпадать!'
		    )
		));
		if(isset($this->data[$this->alias]['old_password_confirm'])) {
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
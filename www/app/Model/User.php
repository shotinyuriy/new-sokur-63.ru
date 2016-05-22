<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	const OPERATOR = "operator";
	const ADMINISTRATOR = "admin";
	
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
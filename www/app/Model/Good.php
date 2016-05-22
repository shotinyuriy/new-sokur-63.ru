<?php
App::uses('TranslateComponent', 'Controller/Component/Translate');

class Good extends AppModel {
	public $belongsTo = 'Category';
	public $hasMany = 'Portion';
	
	public function beforeSave($options = array()) {
        if (!empty($this->data[$this->alias]['name'])) {
            $translate = new Translate();
            $this->data[$this->alias]['id'] = $translate->str2id($this->data[$this->alias]['name']);
        }
        return true;
    }
}
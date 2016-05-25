<?php
require_once 'TranslitComponent.php';

class Good extends AppModel {
	public $belongsTo = 'Category';
	
	public function beforeSave($options = array()) {
		//debug($this->data[$this->alias]);
        if (!empty($this->data[$this->alias]['name'])) {
            $translate = new TranslitComponent();
            $this->data[$this->alias]['id'] = $translate->str2id($this->data[$this->alias]['name']);
			if(empty($this->data[$this->alias]['category_id'])) {
				$this->data[$this->alias]['category_id'] = null;
			}
        }
        return true;
    }
}
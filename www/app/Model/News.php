<?php
class News extends AppModel {
		
	public function beforeSave($options = array()) {
        if (!empty($this->data[$this->alias]['new_id'])) {           
				$this->data[$this->alias]['id'] = $this->data[$this->alias]['new_id'];
        }
        return true;
    }
}

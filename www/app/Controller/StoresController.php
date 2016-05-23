<?php
class StoresController extends AppController {
	
	public function index() {
		$count = $this->Store->find('count');
		$stores = $this->Store->find('all');
		$this->set(compact('count', 'stores'));
	}
}

<?php
class StoresController extends AppController {
	
	public function index() {
		$this->Paginator->settings = array(
			'limit'=> 10,
			'order' => 'Store.name'
		);
		$stores = $this->Paginator->paginate('Store');
		$this->set(compact('stores'));
	}
	
	public function add() {
		if($this->request->is('post')) {
			if($this->Store->save($this->request->data)) {
				$this->redirect('/stores?cms=true&ajax=true');
			}	
		}
	}
	
	public function edit($id) {
		if($this->request->is('post')) {
			if($this->Store->save($this->request->data)) {
				$this->redirect('/stores?cms=true&ajax=true');
			}	
		} else {
			$storeItem = $this->Store->findById($id);
			$store=$storeItem['Store'];
			$this->set(compact('store'));
		}
	}
	
	public function delete($id) {
		if($this->request->is('post')) {
			if($this->Store->delete($id)) {
				$this->redirect('/stores?cms=true&ajax=true');
			}
		}
	}
}
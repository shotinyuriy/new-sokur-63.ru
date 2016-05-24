<?php
class StoresController extends AppController {
	
	public function index() {
		$count = $this->Store->find('count');
		$stores = $this->Store->find('all');
		$this->set(compact('count', 'stores'));
	}
	
	public function add() {
		if($this->request->is('post')) {
			if($this->Store->save($this->request->data)) {
				$this->Session->setFlash('Магазин добавлен!');
			}	
		}
	}
	
	public function edit($id) {
		if($this->request->is('post')) {
			if($this->Store->save($this->request->data)) {
				$this->Session->setFlash('Магазин изменен!');
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
				$this->Session->setFlash('Магазин удален!');
			}
		}
	}
}
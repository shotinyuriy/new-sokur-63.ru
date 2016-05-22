<?php
class UsersController extends AppController {
	
	public function login() {
		if($this->request->is('post')) {
			if($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(
				__('Неправильный логин или пароль!')
			);
		}
	}
	
	public function index() {
		$users = $this->User->find('all');
		$this->set(compact('users'));
	}
	
	public function add() {
		if($this->request->is('post')) {		
			if($this->User->save($this->request->data)) {
				$this->Session->setFlash('Пользователь добавлен');
			}
		}
	}
}
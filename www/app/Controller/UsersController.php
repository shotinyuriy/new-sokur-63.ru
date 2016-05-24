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
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
	
	public function index() {
		$users = $this->User->find('all');
		$this->set(compact('users'));
	}
	
	public function cms_index() {
		$users = $this->User->find('all');
		$this->set(compact('users'));
		$this->render('index');
	}
	
	public function add() {
		if($this->request->is('post')) {		
			if($this->User->save($this->request->data)) {
				$this->Session->setFlash('Пользователь добавлен');
			}
		}
	}
	
	public function edit($id) {
		if($this->request->is('post')) {		
			if($this->User->save($this->request->data)) {
				$this->Session->setFlash('Пользователь добавлен');
			}
		} else {
			$role = $this->Auth->user('role');
			$userItem = $this->User->find('first', array(
				'conditions' => array('User.id' => $id)
			));
			$user = $userItem['User'];
			$this->set(compact('role', 'user'));
		}
	}
}
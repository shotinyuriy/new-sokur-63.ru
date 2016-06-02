<?php
class UsersController extends AppController {
	
	public function login() {
		if($this->request->is('post')) {
			if($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			} else {
				$errorMessage = 'Неправильная пара логин/пароль';
				$this->set(compact('errorMessage'));
			}
		}
		$this->layout = 'error';
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
	
	public function index() {
		$this->layout = 'ajax';
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
				$this->layout = 'ajax';
				$this->redirect('/users?cms=true');
			} else {
				$errors = $this->User->validationErrors;
				$this->layout = 'ajax';
				$this->set(compact('errors'));
				$this->response->statusCode(400);
			}
		}
	}
	
	public function edit($id) {
		$userId = $this->Auth->user('id');
		if($this->request->is('post')) {
			if($userId == $id) {
				$oldUser = $this->User->findById($id);
				$this->request->data['old_password_confirm'] = 	$oldUser['User']['password'];
			}
			if($this->User->save($this->request->data)) {
				$this->layout = 'ajax';
				$this->redirect('/users?cms=true');
			} else {
				$errors = $this->User->validationErrors;
				$this->layout = 'ajax';
				$this->set(compact('errors'));
				$this->response->statusCode(400);
			}
		}
		$role = $this->Auth->user('role');
		$userItem = $this->User->find('first', array(
			'conditions' => array('User.id' => $id)
		));
		$user = $userItem['User'];
		$this->set(compact('role', 'user', 'userId'));
	}
	
	public function delete($id) {
		
		if($this->request->is('post')) {		
			if($this->User->delete($id)) {
				$this->layout = 'ajax';
				$this->redirect('/users?cms=true');
			}
		} else {
			$role = $this->Auth->user('role');
			$userItem = $this->User->findById($id);
			$user = $userItem['User'];
			$this->set(compact('role', 'user'));
		}
	}
}
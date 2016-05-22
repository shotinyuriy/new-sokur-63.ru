<?php
class HashesController extends AppController {
	
	public $uses = array('User');
	
	public function index() {
		if( isset($this->request->query['input'])) {
			$input = $this->request->query['input'];
			
			$passwordHasher = $this->User->passwordHasher();
			$hash = $passwordHasher->hash($input);
			
			$this->set(compact('input', 'hash'));
		}
	}
}
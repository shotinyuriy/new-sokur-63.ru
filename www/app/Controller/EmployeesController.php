<?php
class EmployeesController extends AppController {
	
	public function index() {
		$employees = $this->Employee->find('all');
		$this->set(compact('employees'));
	}
}

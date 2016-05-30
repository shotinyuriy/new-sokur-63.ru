<?php
class EmployeesController extends AppController {
	
	public function index() {
		$employees = $this->Employee->find('all');
		$this->set(compact('employees'));
	}
	
	public function add() {
		if($this->request->is('post')) {
			if($this->Employee->save($this->request->data)) {
				$this->redirect('/employees?cms=true&ajax=true');
			}
		}
	}
	
	public function edit($id) {
		if($this->request->is('post')) {
			if($this->Employee->save($this->request->data)) {
				$this->redirect('/employees?cms=true&ajax=true');
			}
		} else {
			$employeeItem = $this->Employee->findById($id);
			$employee = $employeeItem['Employee'];
			$this->set(compact('employee'));
		}
	}
	
	public function delete($id) {
		if($this->request->is('post')) {
			if($this->Employee->delete($id)) {
				$this->redirect('/employees?cms=true&ajax=true');
			}
		} else {
			$employeeItem = $this->Employee->findById($id);
			$employee = $employeeItem['Employee'];
			$this->set(compact('employee'));
		}
	}
}

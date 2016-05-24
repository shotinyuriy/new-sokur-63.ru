<?php
class EmployeesController extends AppController {
	
	public function index() {
		$employees = $this->Employee->find('all');
		$this->set(compact('employees'));
	}
	
	public function add() {
		if($this->request->is('post')) {
			if($this->Employee->save($this->request->data)) {
				$this->Session->setFlash('Сотрудник добавлен');
			}
		}
	}
	
	public function edit($id) {
		if($this->request->is('post')) {
			if($this->Employee->save($this->request->data)) {
				$this->Session->setFlash('Сотрудник добавлен');
			}
		} else {
			$employeeItem = $this->Employee->findById($id);
			$employee = $employeeItem['Employee'];
			$this->set(compact('employee'));
		}
	}
	
	public function delete($id) {
		if($this->request->is('post')) {
			$this->Employee->delete($id);
		}
	}
}

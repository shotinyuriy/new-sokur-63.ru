<?php
require 'util.php';

class NewsController extends AppController {
	
	public function index() {
		$newsList = $this->News->find('all');
		$this->set(compact('newsList'));
	}
	
	public function display() {
		$newsList = $this->News->find('all', array(
			'conditions' => array('News.expires_on >=' => date('Y-m-d')),
			'order' => array('News.expires_on', 'News.id')
		));
		$this->set(compact('newsList'));
	}
	
	public function history() {
		$newsList = $this->News->find('all');
		$this->set(compact('newsList'));
	}
	
	public function add() {
		if($this->request->is('post')) {
			if(FileUtils::isUploadedFile($_FILES)) {
				
				$id = $this->News->query('SELECT MAX(n.id+1) as id FROM `news` n;');
				$id = $id[0][0]['id'];
				$image_url = FileUtils::saveFile($id, 'app/webroot/news-img');
				$this->request->data['News']['image_url'] = $image_url;
				$this->request->data['News']['new_id'] = $id;
				$this->request->data['News']['created_on'] = date('Y-m-d');
			}
			if($this->News->save($this->request->data)) {
				$this->layout = 'ajax';
				$this->redirect('/news?cms=true&ajax=true');
			}
		}
	}
	
	public function edit($id) {
		if($this->request->is('post')) {
			if(FileUtils::isUploadedFile($_FILES)) {
				$image_url = FileUtils::saveFile($id, 'app/webroot/news-img');
				$this->request->data['News']['image_url'] = $image_url;
			}
			$this->News->id = $id;
			foreach($this->request->data['News'] as $key => $value) {
				$this->News->saveField($key, $value);
			}
			$this->layout = 'ajax';
			$this->redirect('/news?cms=true&ajax=true');
		} else {
			$newsItem = $this->News->findById($id);
			$news = $newsItem['News'];
			$this->set(compact('news'));
		}
	}
	
	public function delete($id) {
		if($this->request->is('post')) {
			if($id >= 0) {
				$this->News->delete($id);
				$this->layout = 'ajax';
				$this->redirect('/news?cms=true&ajax=true');
			}
		} else {
			$newsItem = $this->News->findById($id);
			$news = $newsItem['News'];
			$this->set(compact('news'));
		}
	}
	
	
	public function view($id) {
		$newsItem = $this->News->findById($id);
		$news = $newsItem['News'];
		$this->set(compact('news'));
	}
}
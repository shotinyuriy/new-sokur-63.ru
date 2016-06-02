<?php
//session_start();
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
		'Auth' => array(
			'loginAction' => array(
	        	'controller' => 'users',
	        	'action' => 'login'
	    	),
	    	'authError' => 'Did you really think you are allowed to see that?',
	    	'loginRedirect' => array('controller' => 'cms', 'action' => 'index'),
	    	'authenticate' => array(
	        	'Form' => array(
	        		'passwordHasher' => array(
	                    'className' => 'Simple',
	                    'hashType' => 'sha256'
	                )
	        	)
	   		),
	   		'allowedActions' => array(
	   			'login'//,
	   			//'history', 'decrease', 'increase', 'display', 'view', 'index', 
	   			//'buy', 'popular', 'viewByCategory', 'menu', 'menushort', 'total',
	   			//'search'
			)
		), 'Flash', 'Session','Cookie', 'Paginator', 'RequestHandler');
	public $helpers = array('Conversion', 'Html','Form','Session','Js' => 'Jquery', 'Paginator','Time');
	
	public function beforeFilter() {
		if($this->request->is('ajax') || $this->request->query('ajax')) {
			$this->layout = 'ajax';
		}
		$cms = false;
		$userId = 0;
		
		$role = $this->Auth->user('role');
		$username = $this->Auth->user('username');
		$userId = $this->Auth->user('id');
		if($this->request->query('cms')) {			
			if($userId == null) {
				$userId = 1;
			}
			if($role != null) {
				$cms = true;
			}			
		}
		$this->set(compact('cms', 'role', 'username', 'userId'));
	}
}
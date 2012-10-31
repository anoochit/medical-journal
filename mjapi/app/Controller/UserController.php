<?php

//Configure::write('debug', 0);


class UserController extends AppController {
	
	//public $components = array('RequestHandler','Session');
	 
	
	public function index() {
		$this->layout = 'ajax';
		$results = $this->User->find('all');
        $this->set(array(
            'results' => $results,
            '_serialize' => array('results')
        ));
	}

	function viewalluser() {
		$this->layout = 'ajax';
		$users = $this->User->find('all', array('recursive' => -1));
		$this->set('results',$users);
	}

	// simple authentication
	function authen($username=null,$password=null) {
		$this->layout = 'ajax';		
		 
		$c = $this->User->find('count', array('conditions' => array('User.username' => $username,"User.password" => $password)));
		
		if ($c>0) {
			$this->Session->write('Controller.sessKey', uniqid());			
			$this->set('results',array("sid"=>$this->Session->read('Controller.sessKey')));
		} else {
			$this->set('results',array("sid"=>"0"));
		}
		 
		 
	}


}
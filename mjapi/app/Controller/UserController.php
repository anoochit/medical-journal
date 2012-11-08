<?php

//Configure::write('debug', 0);


class UserController extends AppController {

	public $components = array(
			'RequestHandler',
			'Session'
	);
	
	public function index() {
		/*		 
		$user = $this->User->find('all');
        $this->set(array(
            'user' => $user,
            'success' => true,
            '_serialize' => array('user','success')
        ));
        */
		$this->set('success', true);
		$this->set('_serialize', array('success'));
	}
	
	// view user detail
	public function view($id) {
		$user = $this->User->findById($id);
		$this->set(array(
				'user' => $user,
				'_serialize' => array('user')
		));
	}
	
	// view user detail
	public function viewall() {
		$user = $this->User->find('all');
		$this->set(array(
				'user' => $user,
				'success' => true,
				'_serialize' => array('user','success')
		));
	}
	
	// simple authentication
	function authen($username=null,$password=null) {
		$c = $this->User->find('count', array('conditions' => array('User.username' => $username,"User.password" => $password)));
		
		if ($c>0) {
			$this->Session->write('Controller.sessKey', uniqid());			
			$this->set(array(
					'sid' => $this->Session->read('Controller.sessKey'),
					'success' => true,
					'_serialize' => array('sid','success')
			));
		} else {
			$this->set(array(
					'sid' => "0",
					'success' => false,
					'_serialize' => array('sid','success')
			));
		}
	}
	


}
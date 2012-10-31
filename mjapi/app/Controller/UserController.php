<?php
class UserController extends AppController {
 
	public function index() {
		//$this->set('results', $this->User->find('all'));
    }
    
    function viewalluser() {
    	$this->layout = 'ajax';
    	$users = $this->User->find('all', array('recursive' => -1));
    	$this->set(compact('results'));
    }
    
    function authen() {
    	$this->layout = 'ajax';
    	
    	$data=$this->params['named'];
    	$username=$data['u'];
    	$password=$data['p'];
    	
    	if (($username=="admin") AND ($password=="admin")) {
    		$req="0";
    		$msg="ok";
    	} else {
    		$req="1";
    		$msg="not authen";
    	}
    	
    	$results=array('req'=>$req,'msg'=>$msg);    	
    	$this->set(compact('results'));
    }
    
 
}
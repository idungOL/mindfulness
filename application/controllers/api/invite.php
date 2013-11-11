<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'libraries/REST_Controller.php';

class Invite extends REST_Controller {
	
	
	    
   
    function post()
    {
  
		
		date_default_timezone_set('Asia/Manila');
		$data = $this->_post_args;
		$this->load->model('db_connect');
		
		/*if (array_key_exists('photo', $data)==FALSE){
			$data['photo']=null;
		}		
		if (array_key_exists('share', $data)==FALSE){
			$data['share']=false;
		}*/
		
		try {
			//$id = $this->widgets_model->createWidget($data);
				//throw new Exception('Invalid request data', 400); // test code
			//throw new Exception('Widget already exists', 409); // test code
		} catch (Exception $e) {
			// Here the model can throw exceptions like the following:
			// * For invalid input data: new Exception('Invalid request data', 400)
			// * For a conflict when attempting to create, like a resubmit: new Exception('Widget already exists', 409)
			$this->response(array('error' => $e->getMessage()), $e->getCode());
		}
		if (array_key_exists('user_id', $data)==TRUE			
			&& array_key_exists('access_token', $data)==TRUE
			&& array_key_exists('email', $data)==TRUE 
			&& array_key_exists('sec_token', $data)==TRUE
			//&& array_key_exists('fb_token', $data)==TRUE					
			) {
			
						
			$valid_token = $this->db_connect->check_token('user_id', $data['user_id']);
			$user = $this->db_connect->get1('user_id', $data['user_id']);
			//$this->response($user);
			$from_name = $user[0]->firstname. ' '.$user[0]->lastname;
			$from_address = $user[0]->email;
			$email2 = $data['email'][0];	
			$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
			$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
			$data['timestamp']=time();
			$tokenPost = md5($salt1. md5($email2 . $valid_token));
								
			if($tokenPost==$data['sec_token']){
							
				$this->load->model('invites');
				$email_response = array();
				foreach($data['email'] as $to_address){
				$reply = $this->invites->send_email($from_name, $from_address, $to_address);
				
					if(empty($email_response)){
						$email_response = array($reply);
					}else{
						array_push($email_response, $reply);
					}
				}
				
				$obj = (object) $email_response;
				$this->response($obj,200);
				
						
					
			} else {
						$this->response(array('error' => 'Unauthorized'), 401);
					}
		} else
			$this->response(array('error' => 'Bad Request'), 400);
						
    }
    
    //end post()
    
 
    
}
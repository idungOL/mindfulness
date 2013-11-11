<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'libraries/REST_Controller.php';

class Follow extends REST_Controller {
	
	
	    
   
    function post()
    {
  
		
		date_default_timezone_set('Asia/Manila');
		$data = $this->_post_args;
		$this->load->model('db_connect');
		if (array_key_exists('privacy', $data)==FALSE){
			$data['privacy']=false;
		}
		
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
		if (array_key_exists('follower', $data)==TRUE			
			&& array_key_exists('access_token', $data)==TRUE
			&& array_key_exists('following', $data)==TRUE 
			&& array_key_exists('sec_token', $data)==TRUE			
			) {
			
			$valid_token = $this->db_connect->check_token('user_id', $data['follower']);
			$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
			$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
			$data['timestamp']=time();
			$tokenPost = md5($salt1. md5($data['follower'] . $valid_token));
				
			
					
			if($tokenPost==$data['sec_token']){
				$msg = array('msg'=>'inserted');
				$return = $this->db_connect->get1('user_id',$data['follower']);
				$follow_check = $this->db_connect->get_follow($data['follower'], $data['following']);
			
				if(count($follow_check)<1){				
									
					if($return[0]->private == false){
						$active = true;
					}else{
						$active = false;
					}
				
					$userdata = array(
									'follower' => $data['follower'],
									'following' => $data['following'],
									'active' => $active,
									'timestamp' => time()
									);
					
					$this->db_connect->insert_follow($userdata);
					$follow_obj = $this->db_connect->get_follow($data['follower'], $data['following']);
					$this->response($follow_obj[0], 201);
				} else {
					$this->response(array('error'=>'Bad Request. Already following or request is still pending.'), 400);
				}
				
			}
			else{
				$this->response(array('error' => 'Unauthorized'), 401);
			}
		} else
			$this->response(array('error' => 'Bad Request'), 400);
			
			
    }
    
    //end post()
    
    
	function delete()
    {
  
		
		date_default_timezone_set('Asia/Manila');
		$data = $this->_delete_args;
		
		$this->load->model('db_connect');
		if (array_key_exists('privacy', $data)==FALSE){
			$data['privacy']=false;
		}
		
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
		if (array_key_exists('follow_id', $data)==TRUE			
			&& array_key_exists('access_token', $data)==TRUE
			&& array_key_exists('user_id', $data)==TRUE 
			&& array_key_exists('sec_token', $data)==TRUE			
			) {
			
			$valid_token = $this->db_connect->check_token('user_id', $data['user_id']);
			$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
			$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
			$data['timestamp']=time();
			$tokenPost = md5($salt1. md5($data['follow_id'] . $valid_token));
				
			
					
			if($tokenPost==$data['sec_token']){

						$userdata = array(
						'follow_id' =>$data['follow_id'],									
						);						
						$this->db_connect->unfollow($userdata);
				$this->response('Deleted',200);
				
			}
			else{
				$this->response(array('error' => 'Unauthorized'), 401);
			}
		} else
			$this->response(array('error' => 'Bad Request'), 400);
			
			
    }


function put()
    {
  
		
		date_default_timezone_set('Asia/Manila');
		$data = $this->_put_args;
		
		$this->load->model('db_connect');
		if (array_key_exists('privacy', $data)==FALSE){
			$data['privacy']=false;
		}
		
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
		if (array_key_exists('follow_id', $data)==TRUE			
			&& array_key_exists('access_token', $data)==TRUE
			&& array_key_exists('user_id', $data)==TRUE 
			&& array_key_exists('sec_token', $data)==TRUE
			&& array_key_exists('active', $data)==TRUE			
			) {
			
			$valid_token = $this->db_connect->check_token('user_id', $data['user_id']);
			$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
			$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
			$data['timestamp']=time();
			$tokenPost = md5($salt1. md5($data['active'] . $valid_token));
				
			
					
			if($tokenPost==$data['sec_token']){

				$userdata = array(
				'follow_id' =>$data['follow_id'],
				'active' => $data['active']									
				);						
				$this->db_connect->updateFollow($userdata);
				
				$this->response('Updated',200);
				
			}
			else{
				$this->response(array('error' => 'Unauthorized'), 401);
			}
		} else
			$this->response(array('error' => 'Bad Request'), 400);
			
			
    }

     
    
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'libraries/REST_Controller.php';

class Refresh extends REST_Controller {
	
	
    	
    /*
    function get()
    {
    	$this->load->model('db_connect');
		$data = $this->db_connect->getAll();
		$data['timestamp']=time();
		$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
		$params['access_token'] = $this->_get('access_token');
		$params['facebook_id'] = $this->_get('facebook_id');
		$params['security_token'] = $this->_get('security_token');
		$security_token = md5($params['facebook_id'].$params['access_token'].$salt2);		
		$tokenGet = md5($data['timestamp'].$params['facebook_id']);
			
			if($params['access_token'] && $params['facebook_id'] && $params['security_token']){
			
				if($params['security_token']==$security_token){
					$this->db_connect->update1(array('facebook_id'=>$params['facebook_id']),
										array('access_token'=>$tokenGet, 'timestamp'=>$data['timestamp']));
					$return = $this->db_connect->get1('facebook_id',$params['facebook_id']);
					$this->response($return, 200);
				}
				else{
					$this->response(array('error'=>'Invalid Security Token.'), 401);
				}
				
			}
			else{
				$this->response(array('error' => 'Not found!'), 404);
			}	
    			
    }*/
    
    
    function get()
    {
    
		$this->load->model('db_connect');		
		$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
		$params['access_token'] = $this->_get('access_token');
		$params['user_id'] = $this->_get('user_id');
		$params['sec_token'] = $this->_get('sec_token');
		$data = $this->db_connect->get1('user_id',$params['user_id']);
		$data1 = $data[0];
		$timestamp = time();
		$tokenGet = md5($data1->timestamp.$data1->facebook_id);
		
		if($params['access_token']==$data1->access_token){
		
			$security_token = md5($data1->facebook_id .$params['access_token'] .$salt2);		
	
			
			if($params['access_token'] && $params['user_id'] && $params['sec_token']){
				
				if($params['sec_token']==$security_token){					
					$this->db_connect->update1(array('user_id'=>$params['user_id']),
										array('access_token'=>$tokenGet, 'timestamp'=>$timestamp));
					$return = $this->db_connect->get1('user_id',$params['user_id']);
					$this->response($return[0], 200);
				}
				else{
					$this->response(array('error'=>'Invalid Security Token.'), 401);
				}
				
			} else {
				
				$this->response(array('error' => 'Not found!'), 404);
			}	
		}else
		
			$this->response('Invalid access_token.', 401);
    			
    }

    
    
}
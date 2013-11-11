<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'libraries/REST_Controller.php';

class Activity extends REST_Controller {
	
	 
	/*
	
	function get()
    {
  
		
		date_default_timezone_set('Asia/Manila');
		$data = $this->_get_args;
		$this->load->model('db_connect');
		
		
				
		if (array_key_exists('user_id', $data)==TRUE			
			&& array_key_exists('access_token', $data)==TRUE			 
			&& array_key_exists('sec_token', $data)==TRUE			
			) {
			


			//validating TOKEN
						
			$valid_token = $this->db_connect->check_token('user_id', $data['user_id']);
			$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
			$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
			$data['timestamp']=time();
			$tokenPost = md5($salt1. md5($data['user_id'] . $valid_token));
				
			
					
			if($tokenPost==$data['sec_token']){
				
				
				
								
				$this->response($return_obj, 200);
			
					
					
			} else {
						$this->response(array('error' => 'Unauthorized'), 401);
					}
			
			
		} else
			$this->response(array('error' => 'Bad Request'), 400);
			
			
    }
    */
    
    
    function get()
    {
  
		
		date_default_timezone_set('Asia/Manila');
		$data = $this->_get_args;
		$this->load->model('db_connect');
		
		
				
		if (array_key_exists('user_id', $data)==TRUE			
			&& array_key_exists('access_token', $data)==TRUE			 
			&& array_key_exists('sec_token', $data)==TRUE			
			) {
			


			//validating TOKEN
						
			$valid_token = $this->db_connect->check_token('user_id', $data['user_id']);
			$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
			$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
			$data['timestamp']=time();
			$tokenPost = md5($salt1. md5($data['user_id'] . $valid_token));
				
			
					
			if($tokenPost==$data['sec_token']){
				$following = $this->db_connect->get_act_feed($data['user_id']);
				//print_r($following);
				$pract_shared = array();
				foreach($following as $user_id){
					$user = $this->db_connect->get1('user_id',$user_id->following);
					$users = array();
					if(count($users)>0){
						array_push($users,$user);
						
					}else {
						$users = $user;				
					}				

					
					$user_prac = $this->db_connect->get_user_practice2($user_id->following);
										
					$prog_shared = array();
					
					foreach($user_prac as $user_pr){
						$practice = $this->db_connect->get_practice2($user_pr->practice_id);
						//echo $practice->name;
						//print_r($user_prac);			
						//echo '</pre>';
							if(empty($pract_shared)){
								$pract_shared = array($practice);
							}else{
								array_push($pract_shared, $practice);
							}
						
						
						$user_prog = $this->db_connect->get_user_prac_prog($user_pr->user_practice_id);
						//echo '<pre>';
						//print_r($user_prog);
						//echo '</pre>';
						
						foreach($user_prog as $user_pro){
							$prog = $this->db_connect->get_prog($user_pro->progress_id);
								
									if(empty($prog)){
										
									}else{
										
										
											if(empty($prog_shared)){
												$prog_shared = $prog;
											}else{
												array_push($prog_shared, $prog[0]);
											}
									}
						
							
							$practice['progress'] = $prog_shared;
							
							$users['practice'] = $practice;
							$return_obj = array(
												'following' => $users
							);
							
						}									
					}
				}
				$this->response($return_obj, 200);
			
					
					
			} else {
						$this->response(array('error' => 'Unauthorized'), 401);
					}
			
			
		} else
			$this->response(array('error' => 'Bad Request'), 400);
			
			
    }
    

   
 
    
}
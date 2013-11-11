<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'libraries/REST_Controller.php';

class Practice extends REST_Controller {
	
	
	function post()
    {
  
		
		date_default_timezone_set('Asia/Manila');
		
		$data = $this->_post_args;
		$this->load->model('db_connect');
		if (array_key_exists('privacy', $data)==FALSE){
			$data['privacy']=false;
		}
		if (array_key_exists('reminder', $data)==FALSE){
			$data['reminder']='06:00:00';
		}
		if (array_key_exists('status', $data)==FALSE){
			$data['status']='active';
		}
		if (array_key_exists('photo', $data)==FALSE){
			$data['photo']=null;
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
		if (array_key_exists('name', $data)==TRUE			
			&& array_key_exists('access_token', $data)==TRUE
			&& array_key_exists('user_id', $data)==TRUE 
			&& array_key_exists('sec_token', $data)==TRUE
						
			) {
			
			$valid_token = $this->db_connect->check_token('user_id', $data['user_id']);
			$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
			$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
			$data['timestamp']=time();
			$tokenPost = md5($salt1. md5($data['name'] . $valid_token));
			$practice = array("timestamp"=>$data['timestamp'], 
								"name"=>$data['name'],
								'update_date' => date('Y-m-d',$data['timestamp']),
								'reset_date' => date('Y-m-d',$data['timestamp'])
							);
			
					
			if($tokenPost==$data['sec_token']){				
				$practice_obj = $this->db_connect->insert_practice($practice);
				$user_practice = array(
								'user_id' => $data['user_id'],
								'practice_id' => $practice_obj->practice_id,
								'reminder' => $data['reminder'],
								'premium' => $data['premium'],
								'status' => $data['status'],
								'privacy' => $data['privacy']
								);
				
				$user_practice_obj = $this->db_connect->insert_user_practice($user_practice);
				
				$prog_params = array(
									"description" => "Day 1: Start",
									"timestamp" => $data['timestamp'],
									"photo" => $data['photo']
									);
									
				$progress_obj = $this->db_connect->insert_progress($prog_params);
				
				$user_prac_prog_params = array(
										"progress_id" => $progress_obj->progress_id,
										"user_practice_id" => $user_practice_obj->user_practice_id
											);
											
				$user_prac_prog_obj = $this->db_connect->insert_user_prac_prog($user_prac_prog_params);
				
				
									
				$achievement_params = array(
							'achievement_id' => '1',
							'user_id' => $data['user_id'],
							'practice_id' => $practice_obj->practice_id,
							'timestamp' => $data['timestamp']
				);
				
				$achievement_obj = $this->db_connect->insert_achievement($achievement_params);
				
				$return_obj = array('practice'=> $practice_obj,
									'user_practice' => $user_practice_obj,
									'progress' => $progress_obj,
									'user_practice_progress' => $user_prac_prog_obj,
									'achievement' => $achievement_obj
									);				
									
									
				$this->response($return_obj,201);
				
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
		if (array_key_exists('practice_id', $data)==TRUE			
			&& array_key_exists('access_token', $data)==TRUE
			&& array_key_exists('sec_token', $data)==TRUE
			&& count($data)>3
			) {
			
			$user_practice_obj = $this->db_connect->get_user_practice($data['practice_id']);
			$prac_obj = $this->db_connect->get_practice($data['practice_id']);
			$valid_token = $this->db_connect->check_token('user_id', $user_practice_obj->user_id);
			$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
			$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
			$data['update_date']=time();
			$tokenPost = md5($salt1. md5($data['practice_id'] . $valid_token));
					
					
			if($tokenPost==$data['sec_token']){
				if(array_key_exists('name', $data)==TRUE || 
					array_key_exists('reset_date', $data)==TRUE ||
					array_key_exists('update_date', $data)==TRUE){
						if (array_key_exists('name', $data)==TRUE){
							$fields['name'] = $data['name'];
						}
						if (array_key_exists('reset_date', $data)==TRUE){
							if($data['reset_date']==true){
								$fields['reset_date'] = date('Y-m-d', $data['update_date']);
							} 
								else { 
									$this->response(array('error'=>'Bad Request'), 400);
								}
						}
						if (array_key_exists('update_date', $data)==TRUE){
							$fields['update_date'] = date('Y-m-d', $data['update_date']);
						}						
						$where = array('practice_id'=>$data['practice_id']);				
						$practice_obj = $this->db_connect->update_practice($fields, $where);
						$response['practice'] = $practice_obj;
						
					}
				
				if(array_key_exists('privacy', $data)==TRUE ||
					array_key_exists('reminder', $data)==TRUE ||
					array_key_exists('status', $data)==TRUE){
					
						if(array_key_exists('privacy', $data)==TRUE){
							$field['privacy'] = $data['privacy'];
						}
						
						if(array_key_exists('reminder', $data)==TRUE){
							$field['reminder'] = $data['reminder'];
						}
						
						if(array_key_exists('status', $data)==TRUE){
							$field['status'] = $data['status'];
						}
					
					$were = array('user_practice_id' => $user_practice_obj->user_practice_id);					
					$ret_obj = $this->db_connect->update_user_practice($field, $were);
					
					$response['user_practice'] = $ret_obj;				
					
				}
				
				$this->response($response, 200);
			}
			else{
				$this->response(array('error' => 'Unauthorized'), 401);
			}
		} else
			$this->response(array('error' => 'Bad Request'), 400);
			
			
    }


    
    
    
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'libraries/REST_Controller.php';

class Progress extends REST_Controller {
	
	
	    
   
    function post()
    {
  
		
		date_default_timezone_set('Asia/Manila');
		$data = $this->_post_args;
		$this->load->model('db_connect');
		if (array_key_exists('photo', $data)==FALSE){
			$data['photo']=null;
		}		
		if (array_key_exists('share', $data)==FALSE){
			$data['share']=false;
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
		if (array_key_exists('description', $data)==TRUE			
			&& array_key_exists('access_token', $data)==TRUE
			&& array_key_exists('user_practice_id', $data)==TRUE 
			&& array_key_exists('sec_token', $data)==TRUE
			&& array_key_exists('fb_token', $data)==TRUE			
			) {
			
			$user_id = $this->db_connect->getUserPracticeId($data['user_practice_id']);				
			$valid_token = $this->db_connect->check_token('user_id', $user_id->user_id);
			$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
			$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
			$data['timestamp']=time();
			$tokenPost = md5($salt1. md5($data['description'] . $valid_token));
				
			
					
			if($tokenPost==$data['sec_token']){
					
					
					$progress_params = array(
							'description' => $data['description'],
							'timestamp' => $data['timestamp'],
							'photo' => $data['photo'],
							'share_fb'	=> $data['share_fb']				
					);
					
					$progress_obj = $this->db_connect->insert_progress($progress_params);
					
					$user_prac_prog_params = array(
										"progress_id" => $progress_obj->progress_id,
										"user_practice_id" => $user_id->user_practice_id
											);
											
					$user_prac_prog_obj = $this->db_connect->insert_user_prac_prog($user_prac_prog_params);
					
					$fields = array('update_date' => date('Y-m-d',$data['timestamp']));
					$where = array('practice_id' => $user_id->practice_id);
					
					$this->db_connect->update_practice($fields, $where);
					
					$return_obj['progress'] = $progress_obj;
					$return_obj['user_practice_progress'] = $user_prac_prog_obj;
					
					if($data['share_fb']==TRUE){
					//do post request on fb graph
					$message = array(
								'message' => $data['description'],
								'access_token' => $data['fb_token']);
						if($data['photo']!=null){			
								$message['picture'] = $data['photo'];
						}
						
					$url = "https://graph.facebook.com/me/feed";
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($message));	
					curl_setopt($ch, CURLOPT_HTTPHEADER, 
									array('Content-Type: application/json', 
										'Accept: application/json'
										));
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
					$result = curl_exec($ch);
					curl_close($ch);
					
					$return_obj['fb_post']=json_decode($result);	
					}
									
					
					
					$this->response($return_obj, 201);
			} else {
						$this->response(array('error' => 'Unauthorized'), 401);
					}
		} else
			$this->response(array('error' => 'Bad Request'), 400);
						
    }
    
    //end post()
    
    
/*
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



				$this->response('Out of order', 201);
			}
			else{
				$this->response(array('error' => 'Unauthorized'), 401);
			}
		} else
			$this->response(array('error' => 'Bad Request'), 400);
			
			
    }
 */   
    
}
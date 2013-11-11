<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'libraries/REST_Controller.php';

class Comment extends REST_Controller {
	
	
	    
   
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
		if (array_key_exists('description', $data)==TRUE			
			&& array_key_exists('access_token', $data)==TRUE
			&& array_key_exists('user_id', $data)==TRUE 
			&& array_key_exists('sec_token', $data)==TRUE
			//&& array_key_exists('fb_token', $data)==TRUE
			&& (array_key_exists('progress_id', $data)==TRUE 
			|| array_key_exists('practice_id', $data)==TRUE)			
			) {
			
						
			$valid_token = $this->db_connect->check_token('user_id', $data['user_id']);
			$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
			$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
			$data['timestamp']=time();
			$tokenPost = md5($salt1. md5($data['description'] . $valid_token));
				
			
					
			if($tokenPost==$data['sec_token']){
			
				$comment_params = array(
						'description' => $data['description'],
						'timestamp' => $data['timestamp'],
						'user_id' => $data['user_id']
				);
				
				$comment_obj = $this->db_connect->insert_comment($comment_params);
				
				$return_obj = array('comment' => $comment_obj);
				
					if(array_key_exists('progress_id', $data)==TRUE){
							$com_prog_params = array(
								'comment_id' => $comment_obj->comment_id,
								'progress_id' => $data['progress_id']						
								);					
							$com_prog_obj = $this->db_connect->insert_comment_prog($com_prog_params);
							$return_obj['comment_progress'] = $com_prog_obj;
					}
					
					elseif(array_key_exists('practice_id', $data)==TRUE){
							$com_prac_params = array(
								'comment_id' => $comment_obj->comment_id,
								'practice_id' => $data['practice_id']						
								);					
							$com_prac_obj = $this->db_connect->insert_comment_prac($com_prac_params);
							$return_obj['comment_practice'] = $com_prac_obj;
					}
					
					$this->response($return_obj,201);
				
									
					
			} else {
						$this->response(array('error' => 'Unauthorized'), 401);
					}
		} else
			$this->response(array('error' => 'Bad Request'), 400);
						
    }
    
    //end post()
    
 
    
}
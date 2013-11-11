<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'libraries/REST_Controller.php';

class User extends REST_Controller {
	
	
	
	function get()
    {
    
		$this->load->model('db_connect');		
		$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
		$params['access_token'] = $this->_get('access_token');
		$params['user_id'] = $this->_get('user_id');
		$params['sec_token'] = $this->_get('sec_token');
		$data = $this->db_connect->get1('user_id',$params['user_id']);
		$data1 = $data[0];
		
		
		//$this->response($data1, 200);
		
		if($params['access_token']==$data1->access_token){
		
			$security_token = md5($data1->facebook_id .$params['access_token'] .$salt2);		
		
			if($params['access_token'] && $params['user_id'] && $params['sec_token']){
				
				if($params['sec_token']==$security_token){
					//$return = $this->db_connect->get1('user_id',$params['user_id']);
					$this->response($data1, 200);
				}
				else{
					$this->response(array('error'=>'Invalid Security Token.'), 401);
				}
				
			} else {
				
				$this->response(array('error' => 'Not found!'), 404);
			}	
    		
    	} else {

	    	$this->response('Invalid access_token.', 401);

    	}	
    }
    	
    
    function post()
    {
  
		
		date_default_timezone_set('Asia/Manila');
		$data = $this->_post_args;
		$this->load->model('db_connect');
		if (array_key_exists('birthday', $data)==FALSE){
			$data['birthday']=null;
		}
		if (array_key_exists('location', $data)==FALSE){
			$data['location']=null;
		}
		if (array_key_exists('gender', $data)==FALSE){
			$data['gender']=null;
		}
		if (array_key_exists('private', $data)==FALSE){
			$data['private']=false;
		}
		if (array_key_exists('locale', $data)==FALSE){
			$data['locale']=null;
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
		if (array_key_exists('email', $data)==TRUE
			&& array_key_exists('firstname', $data)==TRUE
			&& array_key_exists('lastname', $data)==TRUE
			&& array_key_exists('facebook_id', $data)==TRUE 
			&& array_key_exists('sec_token', $data)==TRUE
			&& array_key_exists('fb_token', $data)==TRUE			
			) {
			
			$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
			$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
			$data['timestamp']=time();
			$tokenPost = md5($salt1. md5($data['email'] . $data['firstname']));
			$tokenGet = md5($data['timestamp'].$data['facebook_id']);	
					
			if($tokenPost==$data['sec_token']){
			
				$return = $this->db_connect->get1('email',$data['email']);
				
				if(count($return)!=0){
					if($data['timestamp']>($return[0]->timestamp+(24*60*60))){	
						$return['error'] = array("error"=>"Token Expired.");					
						$this->response($return['error'], 202); 
					}else{	
						//array_push($return, $results->data);
						//$return['suggest']= $results->data;
						$json = array('user'=>$return[0]);									
						$this->response($json, 200);
						//$this->response(json_encode($return[0]), 200);
					}
						
				}
				else{
				
					$fql = urlencode('SELECT uid,name FROM user  WHERE uid IN(SELECT uid2 FROM friend WHERE uid1 = me()) AND is_app_user = 1 LIMIT 0,20');
					$url = "https://graph.facebook.com/fql?q=".$fql."&access_token=".$data['fb_token'];					
					$ch = curl_init($url);	
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
					$result = curl_exec($ch);
					curl_close($ch);
					$results = json_decode($result);
			//$uid = $results->data[0]->uid;
		
			//$this->response($results->data[0]->uid, 200);
			
			
					foreach($results->data as $user){
						if(empty($sug_friends)){
							$sug_friends = $this->db_connect->get1('facebook_id',$user->uid);
						} else {
							$arr = $this->db_connect->get1('facebook_id',$user->uid);
							array_push($sug_friends, $arr);			
						}
					}
				
					//$bday = date_create($data['birthday']);
					$userdata = array('email'=>$data['email'],
									'firstname'=> $data['firstname'],
									'lastname' => $data['lastname'],
									'facebook_id' => $data['facebook_id'],
									'access_token'=> $tokenPost,
									'timestamp'=>$data['timestamp'],									
									'birthday' => $data['birthday'],
									'gender' => $data['gender'],
									'private' => $data['private'],
									'location' => $data['location'],
									'locale' => $data['locale']						
									);
					$this->db_connect->insert1($userdata);
					$return = $this->db_connect->get1('email',$data['email']);
					$json = array('user'=>$return[0]);
					//$return['suggest']= $results->data[0];
					
					//if(!empty($sug_friends)){
					$json['suggest'] = $sug_friends;
				//	}				
					//array_push($return, $results->data);
					$this->response($json, 201); 
					//$this->response(json_encode($json), 201); 
				}
				
			}
			else{
				$this->response(array('error' => 'Unauthorized'), 401);
			}
		} else
			$this->response(array('error' => 'Bad Request'), 400);
			
			
    }
   /* 
    function put()
    {
		$data = $this->_put_args;
		$this->load->model('db_connect');
		
		if($data){
			$fields = array_keys($data);
			$this->response($fields, 200);
		}else{
			$this->response('Not Found', 404);
		}

	}
    */
    
    
    
}
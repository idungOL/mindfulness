<?php

class Users extends CI_Model {
	
	
	public function is_member($facebook_user){

		$this->db->where('email', $facebook_user['email']);
		$query = $this->db->get('user');//table
		
		if($query->num_rows()==1){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function log_in($facebook_user){
	
		
		$data = array(
				'is_logged_in' => 1,
				'email' => $facebook_user['email'],
				'name' => $facebook_user['name']
				);
		$this->session->set_userdata($data);
		
		
	}
	
	public function sign_up_from_facebook($facebook_user){
		echo '<pre>';
		print_r($facebook_user);
		$data = array(
				'firstname' => $facebook_user['first_name'],
				'lastname' => $facebook_user['last_name'],
				'email' => $facebook_user['email'],
				'facebook_id'=> $facebook_user['id']
			);
		$this->db->insert('user', $data);
		
	}
	
	
	
}
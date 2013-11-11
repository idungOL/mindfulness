<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {


	public function index()
	{
		$this->login();
	}
	
	public function login(){
	
		$this->load->library('fbconnect');		
		
		$this->load->view('login');	
		
		 
	}
	
	public function members(){
		if($this->session->userdata('is_logged_in')){
		
			$data = $this->session->all_userdata();
			$this->load->view('members', $data);
			
		} else {
		
			redirect('index.php/main/login');
			
		}
	}
	
	public function facebook_request(){
		
		$this->load->library('fbconnect');
		$data = array(
				'redirect_uri' => site_url('index.php/main/handle_facebook_login'),
				'scope' => 'email'
				);
		
		redirect($this->fbconnect->getLoginUrl($data));
		 
	}
	
	public function handle_facebook_login(){
		$this->load->library('fbconnect');
		$this->load->model('users');
		$facebook_user = $this->fbconnect->user;
		
		if($this->fbconnect->user){
		
			if($this->users->is_member($facebook_user)){
				$this->users->log_in($facebook_user);
				redirect('index.php/main/members');
				
			} else {
				
				$this->users->sign_up_from_facebook($facebook_user);
				$this->users->log_in($facebook_user);
				redirect('index.php/main/members');
			}
		
		/*
			echo "<pre>";
			print_r($this->fbconnect->user);
			echo "</pre>";
		*/
		
		}		
		else{
			echo('Could not log in at this time.');
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('index.php/main/login');
	}
	

}


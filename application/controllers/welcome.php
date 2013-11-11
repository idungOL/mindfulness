<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function test(){
		$this->load->model('db_connect');
		$acc_token = $this->db_connect->check_token('user_id','27');
		echo($acc_token);
		//echo($acc_token[0]->access_token);
	}
	
	public function test_practice(){
		$data = array(
					'name'=>'Memorize',
					'timestamp' => time()
					);
		$this->load->model('db_connect');
		$acc_token = $this->db_connect->insert_practice($data);
		print_r($acc_token);
		//echo($acc_token[0]->access_token);
	}
	
	public function test_user_practice(){
		$data = array(
					'user_id' => 27,
					'privacy' => false,
					'practice_id' => 2,
					'reminder'=>'8:00:00',
					'status' => 'active',
					'premium' => 'false'
					);
		$this->load->model('db_connect');
		$acc_token = $this->db_connect->insert_user_practice($data);
		print_r($acc_token);
		//echo($acc_token[0]->access_token);
		
	
	}
	
	public function unfollow(){
		$userdata = array(
						'follow_id' => 8,									
						);
		$this->load->model('db_connect');
		$this->db_connect->unfollow($userdata);
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
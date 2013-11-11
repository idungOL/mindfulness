<?php defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH.'libraries/REST_Controller.php';

class Cont extends CI_Controller{

	public function awat(){
		$this->load->model('db_connect');
		$field = 'email';
		$value = 'nntaclino@numlock.com.ph';
		$data = $this->db_connect->get1($field,$value);
		//$data = $this->db->query('SELECT * FROM user WHERE email = "'.$value.'"');
		print_r($data);	
		echo count($data);	
	}
	
	public function add_db(){
		$user = array(
					"firstname"=>"Neil", 					
					"lastname"=>"Yurri",
					"email"=>"nntaclino@numlock.com.ph",
					"access_token"=>"19709e481f84bf3ece16b10d7ce50102", 
					"facebook_id"=>"123412",
					"timestamp"=>time()
					);
					
		$this->load->model('db_connect');		
		$this->db_connect->insert1($user);
		$result = $this->db_connect->getAll();
		print_r($result);			
		
	}

}
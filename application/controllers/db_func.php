<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Db_func extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');
	}
	

	public function view_users(){
		
		$this->load->model('db_connect');
		$users = $this->db_connect->getUsers();
		echo "<br><pre>";
		print_r($users);
		echo "</pre>";
	}
	
	
	public function view_practice(){
		
		$this->load->model('db_connect');
		$practice = $this->db_connect->getPractice();
		echo "<br><pre>";
		print_r($practice);
		echo "</pre>";
	}


	public function view_user_practice(){
		
		$this->load->model('db_connect');
		$practice = $this->db_connect->getUserPractice();
		echo "<br><pre>";
		print_r($practice);
		echo "</pre>";
	}	
	
	public function view_follow(){
		
		$this->load->model('db_connect');
		$follow = $this->db_connect->getFollow();
		echo "<br><pre>";
		print_r($follow);
		echo "</pre>";
	}
	
	public function view_activity(){
		
		$this->load->model('db_connect');
		$activity = $this->db_connect->getActivity();
		echo "<br><pre>";
		print_r($activity);
		echo "</pre>";
	}
	
	public function view_comment(){
		
		$this->load->model('db_connect');
		$comment = $this->db_connect->getComment();
		echo "<br><pre>";
		print_r($comment);
		echo "</pre>";
	}
	
	public function view_comment_prog(){
		
		$this->load->model('db_connect');
		$comment = $this->db_connect->getCommentProg();
		echo "<br><pre>";
		print_r($comment);
		echo "</pre>";
	}
	
	public function view_comment_prac(){
		
		$this->load->model('db_connect');
		$comment = $this->db_connect->getCommentPrac();
		echo "<br><pre>";
		print_r($comment);
		echo "</pre>";
	}
	
	public function view_progress(){
		
		$this->load->model('db_connect');
		$practice = $this->db_connect->getProgress();
		echo "<br><pre>";
		print_r($practice);
		echo "</pre>";
	}	
	
	public function view_user_practice_progress(){
		
		$this->load->model('db_connect');
		$practice = $this->db_connect->getUserPracticeProgress();
		echo "<br><pre>";
		print_r($practice);
		echo "</pre>";
	}	
	
//EMPTY TABLE	
	
	function emptyUsers(){
		$this->load->model('db_connect');
		$this->db_connect->empty1('user');
		$this->view_users();
	}
	
	function emptyPractice(){
		$this->load->model('db_connect');
		$this->db_connect->empty1('practice');
		$this->view_practice();
	}
	
	function emptyUserPractice(){
		$this->load->model('db_connect');
		$this->db_connect->empty1('user_practice');
		$this->view_user_practice();
	}
	
	function emptyFollow(){
		$this->load->model('db_connect');
		$this->db_connect->empty1('follow');
		$this->view_follow();
	}
	
	function emptyUserPracticeProgress(){
		$this->load->model('db_connect');
		$this->db_connect->empty1('user_practice_progress');
		$this->view_user_practice_progress();
	}
	
	function emptyProgress(){
		$this->load->model('db_connect');
		$this->db_connect->empty1('progress');
		$this->view_progress();
	}
	
	function emptyComment(){
		$this->load->model('db_connect');
		$this->db_connect->empty1('comment');
		$this->view_comment();
	}
	
	function insertAchievement(){
		$data = array(
			'achievement_id' => '1',
			'user_id'=>'1',
			'practice_id'=> '1',
			'timestamp' => time(),
		);
		
		$this->load->model('db_connect');
		$this->db_connect->insert_achievement($data);
		
	}
	
	
//DB manipulation
/*	function addColumn(){
		$fields = array("timestamp"=> array('type' => 'INT'));
		$table = 'cheer';		
		$this->load->model('db_connect');
		
		$this->db_connect->add_column($table, $fields);
		//$this->view_comment();
	}
*/	

	function queryCheer(){
		$data = array('progress_id'=>'18', 'user_id'=>'2');
		$this->load->model('db_connect');
		$return = $this->db_connect->query_cheer($data);
		print_r($return);
		echo '<br>'.count($return);
	}
	
	function changeColumn(){
		$tablename = 'progress';
		$fields = array(
						'share' => array(
										'name' => 'share_fb',
										'type' => 'TINYINT'
						)
		);
		$this->load->model('db_connect');
		$this->db_connect->change_col_name($tablename, $fields);
		$this->view_progress();
	}
	
	
	function getUserIdfromPractice(){
		$this->load->model('db_connect');
		$user = $this->db_connect->get_user_practice('3');
		print_r($user);
	}
	
	function updatePractice(){
		$date = 1383189339;
		$tom = $date+(86400);
		$fields = array(
						'reset_date' => date('Y-m-d', $date)
						
		);
		$where = array('practice_id'=>'3');
		
		$this->load->model('db_connect');
		$practice = $this->db_connect->update_practice($fields, $where);
		print_r($practice);
		echo '<br>'.$date;
		echo '<br>'.($date+24*60*60);	
	}
	
	function updateUserPractice(){
		$fields = array(
					'reminder'=> '06:00:00',
					'privacy' => '1'
		);
		$where = array('user_practice_id'=>3);
		
		$this->load->model('db_connect');
		$practice = $this->db_connect->update_user_practice($fields, $where);
		print_r($practice);
	}
	
	
	function addTable(){
		$fields = array(
						'comment_practice_id' => array(
												'type' => 'INT',
												'auto_increment' => TRUE 
										),
						'comment_id' => array(
												'type' => 'INT',											
										),
						'practice_id' => array(
												'type' => 'INT',											
										)				

						);
		
		$table = 'comment_practice';
		
		$this->load->model('db_connect');
		
		$this->db_connect->new_table($table, $fields);
		$this->view_comment_prac();
	}
	
	function tableOffLimit(){
		$table='user';
		$offset='0';
		$limit='2';
		$id='2';
		$this->load->model('db_connect');		
		$result = $this->db_connect->table_off_limit($table,$id,$offset,$limit);
		print_r($result);
	}
	
	
	
	function getActFeed(){
		$user_id = '2';
		$this->load->model('db_connect');
		$following = $this->db_connect->get_act_feed($user_id);
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
			
			echo '<pre>List of Users I Follow: <br>';
			//print_r($users);
			echo '</pre>';
			echo 'I am Following ';
			echo $user[0]->firstname."!<br>";
			
			$user_prac = $this->db_connect->get_user_practice2($user_id->following);
			
			echo '<pre>'. $user[0]->firstname. ' created a practice called ';
			
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
						//echo '<pre><br>'.$user[0]->firstname.' shared a progress. <br>';
						//echo($prog[0]->description);
						//echo '</pre>';
						
							if(empty($prog_shared)){
								$prog_shared = array($prog[0]);
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
				
				//echo '<pre>';
				
				//print_r($practice);
				//print_r($prog_shared);
				//echo '</pre>';
				
			}
			//echo '<pre>';
			//print_r($practice);
			//echo '</pre>';
		}
		$json = json_encode($return_obj);
		//print_r($json);
		print_r($return_obj);
	}
	
	
	function simpleJoin(){
		$this->load->model('db_connect');
		$result = $this->db_connect->simple_join();
		echo '<pre>';
		print_r($result);
	}
	
	function actProg(){
		$this->load->model('db_connect');
		$result = $this->db_connect->act_progress();
		echo '<pre>';
		print_r($result);
	}
	
	function union(){
		$this->load->model('db_connect');
		$results = $this->db_connect->act_progress();
		$result = $this->db_connect->simple_join();
		$merge = array_merge($results,$result);
		echo '<pre>';
		print_r($merge);
	}
	

}

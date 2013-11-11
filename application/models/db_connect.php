<?php

class Db_connect extends CI_Model{


//QUery/empty functions for viewing/erasing database
	function getUsers() {
		$query = $this->db->query("SELECT * FROM user");		
		return $query->result();
	}
	
	function getPractice() {
		$query = $this->db->query("SELECT * FROM practice");		
		return $query->result();
	}
	
	function getUserPractice() {
		$query = $this->db->query("SELECT * FROM user_practice");		
		return $query->result();
	}
	
	function getFollow() {
		$query = $this->db->query("SELECT * FROM follow");		
		return $query->result();
	}
	
	function getProgress() {
		$query = $this->db->query("SELECT * FROM progress");		
		return $query->result();
	}
	
	function getUserPracticeProgress() {
		$query = $this->db->query("SELECT * FROM user_practice_progress");		
		return $query->result();
	}
	
	function getActivity() {
		$query = $this->db->query("SELECT * FROM activity");		
		return $query->result();
	}
	
	function getComment() {
		$query = $this->db->query("SELECT * FROM comment");		
		return $query->result();
	}
	function getCommentProg() {
		$query = $this->db->query("SELECT * FROM comment_progress");		
		return $query->result();
	}
	
	function getCommentPrac() {
		$query = $this->db->query("SELECT * FROM comment_practice");		
		return $query->result();
	}
	

	
	function empty1($data){
		$this->db->empty_table($data);
	}


	function add_column($table, $fields){
		$this->load->dbforge();
		$this->dbforge->add_column($table, $fields);
	}
	
	function new_table($tablename, $fields){
		$this->load->dbforge();		
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('comment_practice_id',TRUE);
		$this->dbforge->create_table($tablename);
	}
	
	function change_col_name($tablename, $fields){
		$this->load->dbforge();	
		$this->dbforge->modify_column($tablename, $fields);
	}
	
	

//real functions
	
	function getAll(){
		$query = $this->db->query("SELECT * FROM user");		
		return $query->result();
	}
	
	
	function get1($field, $value){
		$sql = "SELECT * FROM user WHERE ".$field ." = ?";
		$query = $this->db->query($sql, array($value));		
		return $query->result();
	}
	
	//$data an array()
	function insert1($data){
		$this->db->insert('user', $data);
	}
	
	function insert2($data){
		$this->db->insert_batch('user', $data);
	}
	
	function update1($data1,$data2){
		$this->db->update('user', $data2, $data1);
	}
	
	function delete1($data){
		
		$this->db->delete('user',$data);
	}
	
	
	function insert_follow($data){
			$this->db->insert('follow', $data);
		}
	
	function get_follow($value1, $value2){
		$sql = "SELECT * FROM follow WHERE follower = ? AND following = ?";
		$query = $this->db->query($sql, array($value1, $value2));		
		return $query->result();
	}
	
	function unfollow($data){
		$this->db->delete('follow', $data);
	}
	
	function check_token($field, $value){
		$sql = "SELECT access_token FROM user WHERE ".$field ." = ?";
		$query = $this->db->query($sql, array($value));		
		$token = $query->result();
		return $token[0]->access_token;
	}
	
	function check_achievement($value1, $value2){
		$sql = "SELECT * FROM progress_achievement WHERE practice_id = ? AND achievement_id = ?";
		$query = $this->db->query($sql, array($value1, $value2));		
		return $query->result();

	}
	
	function insert_practice($data){
		$this->db->insert('practice', $data);		
		$sql = "SELECT * FROM practice WHERE name = ? AND timestamp = ?";
		$query = $this->db->query($sql, array($data['name'], $data['timestamp']));
		$result = $query->result();
		return $result[0];
	}
	
	function insert_user_practice($data){
		$this->db->insert('user_practice', $data);
		$sql = "SELECT * FROM user_practice WHERE user_id = ? AND practice_id = ?";
		$query = $this->db->query($sql, array($data['user_id'], $data['practice_id']));
		$result = $query->result();
		return $result[0];	
	}
		
	
	function insert_progress($data){
		$this->db->insert('progress', $data);
		$sql = "SELECT * FROM progress WHERE description = ? AND timestamp = ?";
		$query = $this->db->query($sql, array($data['description'], $data['timestamp']));
		$result = $query->result();
		return $result[0];	
	}
	
	function insert_achievement($data){
		$this->db->insert('progress_achievement', $data);
		$achievement = $this->check_achievement($data['practice_id'], $data['achievement_id']);
		return $achievement;
	}
	

	function insert_comment($data){
		$this->db->insert('comment', $data);
		$sql = "SELECT * FROM comment WHERE description = ? AND timestamp = ? AND user_id = ?";
		$query = $this->db->query($sql, array($data['description'], $data['timestamp'], $data['user_id']));
		$result = $query->result();
		return $result[0];	
	}
	
	function insert_comment_prog($data){
		$this->db->insert('comment_progress', $data);
		$sql = "SELECT * FROM comment_progress WHERE comment_id = ?";
		$query = $this->db->query($sql, array($data['comment_id']));
		$result = $query->result();
		return $result[0];	
	}
	
	function insert_comment_prac($data){
		$this->db->insert('comment_practice', $data);
		$sql = "SELECT * FROM comment WHERE comment_id = ?";
		$query = $this->db->query($sql, array($data['comment_id']));
		$result = $query->result();
		return $result[0];	
	}
	
	function insert_user_prac_prog($data){
		$this->db->insert('user_practice_progress', $data);
		$sql = "SELECT * FROM user_practice_progress WHERE progress_id = ? AND user_practice_id = ?";
		$query = $this->db->query($sql, array($data['progress_id'], $data['user_practice_id']));
		$result = $query->result();
		return $result[0];
	}
	
	function updateFollow($data){
		$this->db->update('follow', array('active' => $data['active']), 'follow_id = '.$data['follow_id']);
		$sql = "SELECT * FROM follow WHERE follow_id = ?";
		$query = $this->db->query($sql, array($data['follow_id']));
		$result = $query->result();
		return $result[0];
	}
	
	function get_user_practice($practice_id){
		$sql = "SELECT * FROM user_practice WHERE practice_id = ?";
		$query = $this->db->query($sql, array($practice_id));
		$result = $query->result();
		return $result[0];	
	}
	
	//$table = tablename; $fields = array(field=>values); $where (field = values) 
	function update_practice($fields, $where){
		$this->db->update('practice', $fields, $where);

	}
	
	function update_user_practice($fields, $where){
		$this->db->update('user_practice', $fields, $where);
		$sql = "SELECT * FROM user_practice WHERE user_practice_id = ?";
		$query = $this->db->query($sql, array($where['user_practice_id']));
		$result = $query->result();
		return $result[0];
	}
	
	function get_practice($practice_id){		
		$sql = "SELECT * FROM practice WHERE practice_id = ?";
		$query = $this->db->query($sql, array($practice_id));
		$result = $query->result();
		return $result[0];
	}
	
	function getUserPracticeId($data) {
		$sql = "SELECT * FROM user_practice where user_practice_id = ?";
		$query = $this->db->query($sql, array($data));				
		$user_practice = $query->result();
		return $user_practice[0];
	}
	
	function get_act_feed($user_id){
		$sql = "SELECT following FROM follow where follower = ?";
		$query = $this->db->query($sql, array($user_id));				
		$user_practice = $query->result();
		return $user_practice;		
	}
	
	function get_user_practice2($user_id){
		$sql = "SELECT * FROM user_practice WHERE user_id = ? AND privacy = 0";
		$query = $this->db->query($sql, array($user_id));
		$result = $query->result();
		return $result;
	}
	
	function get_user_prac_prog($user_practice_id){
		$sql = "SELECT * FROM user_practice_progress WHERE user_practice_id = ?";
		$query = $this->db->query($sql, array($user_practice_id));
		$result = $query->result();
		return $result;
	}
	
	function get_prog($progress_id){
		$sql = "SELECT * FROM progress WHERE progress_id = ? AND share_fb = 1";
		$query = $this->db->query($sql, array($progress_id));
		$result = $query->result();
		return $result;
	}
		function get_practice2($practice_id){		
		$sql = "SELECT * FROM practice WHERE practice_id = ?";
		$query = $this->db->query($sql, array($practice_id));
		$result = $query->result();
		return $result;
	}
	
	function send_email($from_name, $from_address, $to_address){
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, 'api:key-7lc36b3agw1kjvj2n63r0ddvjk0tiy-7');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/mailbug.mailgun.org/messages');
		curl_setopt($ch, CURLOPT_POSTFIELDS, array('from' => $from_name."<".$from_address.">",
												 'to' => $to_address,
												 'subject' => 'Mindfulness App Invite',
												 'text' => 'Hi'));

		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
	
	function query_cheer($data){
		$sql = "SELECT * FROM cheer WHERE user_id = ? AND progress_id = ?";
		$query = $this->db->query($sql, array($data['user_id'], $data['progress_id']));
		$result = $query->result();
		return $result;
	}
	
	function insert_cheer($data){
		$this->db->insert('cheer', $data);
		$result = $this->query_cheer($data);
		return $result[0];
	}
	
	function table_off_limit($table,$id,$offset,$limit){		
		
		$query = $this->db->get_where($table, array('user_id' => $id), $limit, $offset);
		$result = $query->result();
		return $result;
	}
/*	
	function simple_join1(){
		//$this->db->select('u.user_id, u.firstname, u.lastname, up.user_practice_id, p.practice_id, p.name');
		//$this->db->from('user AS u');
		//$this->db->join('user_practice AS up', 'up.user_id = u.user_id','full');
		//$this->db->join('practice AS p', 'p.practice_id = up.practice_id','full');
		//$this->db->limit(10,0);
		//$query = $this->db->get();
		//$query = $this->db->query('SELECT user.user_id, user.firstname, user.email, user_practice.user_practice_id, user_practice.practice_id, user_practice.privacy FROM user,practice JOIN user_practice ON user_practice.user_id = user.user_id WHERE user.user_id = 1 LIMIT 0,10');		
		return $query->result();			
		
	}
*/
	
	function simple_join(){
		$this->db->select('up.user_practice_id, up.practice_id, up.user_id, p.name, p.timestamp');
		$this->db->from('user_practice AS up');		
		$this->db->join('practice AS p', 'p.practice_id = up.practice_id');		
		$this->db->where('up.user_id = 1');		
		$this->db->limit(10,0);
		$query = $this->db->get();
		return $query->result();		
		
	}
	
		function act_progress(){
		$this->db->select('*');
		$this->db->from('user_practice_progress AS upp, progress AS pr');		
		$this->db->join('user_practice AS up', 'up.user_practice_id = upp.user_practice_id');		
		$this->db->where('up.user_id = 1');		
		$this->db->limit(10,0);
		$query = $this->db->get();
		return $query->result();		
		
	}
	
	
	
	
}
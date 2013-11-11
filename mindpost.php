<?php


// PUT ON PRACTICE
/*	
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	//$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$practice_id ='3';
	$privacy = 0;
	$current = time();
	$access_token = 'ce7593f434c7bf78cb149aebc01ffcb1';
	$access_tok = md5($salt1. md5($practice_id.$access_token));
		$data = array("practice_id" => $practice_id, 					 
					"access_token" => $access_token,
					"sec_token" => $access_tok,
					"privacy" => $privacy,
					'reminder' => '08:00:00',
					'name' => 'Memorize the song The Fox in 7 days.',
					'reset_date' => true
					);
				
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/practice";				
					
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);
	
	echo "<h1>PUT request on ../api/practice</h1>";
	echo "<pre>";
	print_r($result);
	echo "</pre><br>";
	echo $access_tok.'<br>';
	echo http_build_query($data);
*/	

// POST ON practice
	
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	//$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$user_id = '1';
	$name = 'Heroes of the Storm';
	$access_token = 'ce7593f434c7bf78cb149aebc01ffcb1';
	$access_tok = md5($salt1. md5($name.$access_token));
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/practice";
	$data = array("name" => $name, 
					"user_id" => $user_id, 
					"access_token" => $access_token,
					"sec_token" => $access_tok,
					"privacy" => true,
					"premium" => true
					);
					
					
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, 
					array('Content-Type: application/json', 
						'Accept: application/json'
						));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);
	
	echo "<h1>POST request on ../api/practice</h1>";
	echo "<pre>";
	print_r($results);
	echo "</pre><br>";
//	echo $access_tok;
*/

// POST ON CHEER

	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	//$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$user_id = '2';
	$progress_id ='18';
	$access_token = 'a36dff421283c163edbf34274662b876';
	$access_tok = md5($salt1. md5($progress_id.$access_token));
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/cheer";
	$data = array("progress_id" => $progress_id, 
					"user_id" => $user_id, 
					"access_token" => $access_token,
					"sec_token" => $access_tok
				);
					
					
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, 
					array('Content-Type: application/json', 
						'Accept: application/json'
						));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);
	
	echo "<h1>POST request on ../api/cheer</h1>";
	echo "<pre>";
	print_r($result);
	echo "<br>";
	print_r(json_encode($data));
	echo "</pre><br>";
	echo $access_tok;
	
	
// POST ON INVITE
/*
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	//$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$user_id = '1';
	$email = array('nntaclino@numlock.com.ph','lampa101@yahoo.com');
	$email2 = $email[0];
	$access_token = 'ce7593f434c7bf78cb149aebc01ffcb1';
	$access_tok = md5($salt1. md5($email2.$access_token));
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/invite";
	$data = array("email" => $email, 
					"user_id" => $user_id, 
					"access_token" => $access_token,
					"sec_token" => $access_tok
				);
					
					
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, 
					array('Content-Type: application/json', 
						'Accept: application/json'
						));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);
	
	echo "<h1>POST request on ../api/practice</h1>";
	echo "<pre>";
	print_r($result);
	print_r(json_encode($data));
	echo "</pre><br>";
	echo $access_tok;
*/



// POST ON comment
/*	
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	//$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$user_id = '2';
	$progress_id = '3';
	$description = 'Memorize the song The Fox.';
	$access_token = 'a36dff421283c163edbf34274662b876';
	$access_tok = md5($salt1. md5($description.$access_token));
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/comment";
	$data = array("description" => $description, 
					"user_id" => $user_id, 
					"access_token" => $access_token,
					"sec_token" => $access_tok,
					"practice_id" => $progress_id		
					);
					
					
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, 
					array('Content-Type: application/json', 
						'Accept: application/json'
						));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);
	
	echo "<h1>POST request on ../api/comment</h1>";
	echo "<pre>";
	print_r($result);
	echo "</pre><br>";
	echo $access_tok;
	
	echo "<pre>";
	print_r(json_encode($data));
	echo "</pre><br>";

*/

// POST ON progress

/*
	$fb_token = 'CAATZBtbKhadABAIRWTlahZAdY5KEpZCJBFI9uMocwFfuP8fdAybTXepniFWZCLJmpngAFPpZBlftSSVCHO9jnTyz6FMkX3krr647ZAYHaKj1Ww9CObkTUqzceJZAInKALfQ9URNJFn13ZAkHZBoEQpZAXCbTMxdwjZBHq91hRSZBFSwf1IRt0ZAQK8sPmcYUqSyKR9yJkjH3bHHnyEAZDZD';
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	//$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$description = 'Memorized last stanza again and again.';
	$user_practice_id = '3';
	$access_token = 'ce7593f434c7bf78cb149aebc01ffcb1';
	$access_tok = md5($salt1. md5($description.$access_token));
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/progress";
	$data = array("description" => $description,
					"user_practice_id" => $user_practice_id,
					"user_id" => $user_id, 
					"access_token" => $access_token,
					"sec_token" => $access_tok,
					'share_fb'=>true,
					'fb_token'=> $fb_token					
					);
					
					
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, 
					array('Content-Type: application/json', 
						'Accept: application/json'
						));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);
	
	echo "<h1>POST request on ../api/Progress</h1>";
	echo "<pre>";
	print_r($result);
	echo "</pre><br>";
	echo $access_tok;
	echo '<br><pre>';
	print_r(json_encode($data));
	echo '</pre>';

*/

/*
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	//$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$fb_token = 'CAATZBtbKhadABABZBWBG90tBZCASiSdXizbHSZB93k8nC9wS8H0hZAzUpzdkutjPpBmfnoMkXbOA5QyjELxgw8wIBOv0PZC0mUDfEsVg0nQT56IXSXPyxZALP0vJzW4gcKzCXf2xUZBdAWLdXDj6JIb7enPB9jLM6sazscq1OJ4dW5wQopnw78Ha6ZA1rOTgyIe4tOi9qq7XiOgZDZD';
	$fname = 'NeYu';
	$lname = 'Taclino';
	$gender = 'male';
	$email = 'senbonzakura57@gmail.com';
	$fb_id = '1815882152';
	$locale = "en_US";
	$access_tok = md5($salt1. md5($email.$fname));
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/user";
	$data = array("email" => $email, 
					"firstname" => $fname, 
					"lastname" => $lname,
					"facebook_id" => $fb_id,
					"sec_token" => $access_tok,
					"fb_token" => $fb_token,
					"birthday" => '1900-05-07',
					'gender' => $gender,
					'locale' => 'en_US',
					'private' => 0
					);
					
					
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, 
					array('Content-Type: application/json', 
						'Accept: application/json'
						));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);
	
	echo "<h1>POST request on ../api/user</h1>";
	echo "<pre>";
	print_r($result);
	echo "</pre><br>";
	echo $access_tok;
*/	
	
/*	
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	//$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$fb_token = 'CAATZBtbKhadABABZBWBG90tBZCASiSdXizbHSZB93k8nC9wS8H0hZAzUpzdkutjPpBmfnoMkXbOA5QyjELxgw8wIBOv0PZC0mUDfEsVg0nQT56IXSXPyxZALP0vJzW4gcKzCXf2xUZBdAWLdXDj6JIb7enPB9jLM6sazscq1OJ4dW5wQopnw78Ha6ZA1rOTgyIe4tOi9qq7XiOgZDZD';
	$fname = 'Red';
	$lname = 'John';
	$gender = 'male';
	$email = 'drjenoh1125@gmail.com';
	$fb_id = '100003174385644';
	$locale = "en_US";
	$access_tok = md5($salt1. md5($email.$fname));
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/user";
	$data = array("email" => $email, 
					"firstname" => $fname, 
					"lastname" => $lname,
					"facebook_id" => $fb_id,
					"sec_token" => $access_tok,
					"fb_token" => $fb_token,
					"birthday" => '1900-05-07',
					'gender' => $gender,
					'locale' => 'en_US',
					'private' => 0
					);
					
					
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, 
					array('Content-Type: application/json', 
						'Accept: application/json'
						));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);
	
	echo "<h1>POST request on ../api/user</h1>";
	echo "<pre>";
	print_r($result);
	echo "</pre><br>";
	//echo $access_tok;//100003174385644
*/	
	/*
	$fql = urlencode('SELECT uid,name, is_app_user FROM user  WHERE uid IN(SELECT uid2 FROM friend WHERE uid1 = me()) AND is_app_user = 1 LIMIT 0,3');
	$url = "https://graph.facebook.com/fql?q=".$fql."&access_token=CAATZBtbKhadABAMgYcXDg9QbZAqpSu5qmhxrLjwYnSwrSrq2CMygVAlV3gKRvp9j834pKWCfJg5NK7Dn0iQX6X9AZCctIH4EfB9XjtXEpX6ZApvD6K8MZBLXlhTaWtZBX3iRngJkoOZB0jsHTVuGWOws4wWvaa1lwdfZAEnkfCrxb56C34zb7lbfjzhGi4I3GaVIuYf306wUyQZDZD";					
	$ch = curl_init($url);	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);

	echo "<h1>GET request on ../api/user</h1>";
	echo "<pre>";
	print_r($results);
	echo "</pre>";
	
	
	
	*/
	
	
	// POST ON FOLLOW
/*	
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	//$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$follower = '2';
	$following = '1';
	$access_token = 'a36dff421283c163edbf34274662b876';
	$access_tok = md5($salt1. md5($follower.$access_token));
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/follow";
	$data = array("follower" => $follower, 
					"following" => $following, 
					"access_token" => $access_token,
					"sec_token" => $access_tok,
					);
				
					
					
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, 
					array('Content-Type: application/json', 
						'Accept: application/json'
						));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);
	
	echo "<h1>POST request on ../api/user</h1>";
	echo "<pre>";
	print_r($result);
	echo "</pre><br>";
	echo $access_tok;
*/
	
		// POST ON Activity
	/*
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	//$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$user_id = '2';

	$access_token = 'a36dff421283c163edbf34274662b876';
	$access_tok = md5($salt1. md5($user_id.$access_token));
	
	$data = array("user_id" => $user_id, 
					"access_token" => $access_token,
					"sec_token" => $access_tok,
					);
					
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/activity?".http_build_query($data);
	$ch = curl_init($url);
	//curl_setopt($ch, CURLOPT_POST, 1);
	//curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	//curl_setopt($ch, CURLOPT_HTTPHEADER, 
	//				array('Content-Type: application/json', 
	//					'Accept: application/json'
	//					));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);
	
	echo "<h1>POST request on ../api/activity</h1>";
	echo "<pre>";
	print_r($result);
	echo '<br>'.json_encode($data).'<br>';
	echo "</pre><br>";
	echo $access_tok;
	*/
	
	
	
	// DELETE ON FOLLOW
	/*
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	//$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$follower = '1';
	$follow_id = '1';
	$access_token = 'ce7593f434c7bf78cb149aebc01ffcb1';
	$access_tok = md5($salt1. md5($follower.$access_token));
	//$url = "http://nslib.net/mailbug/mindfulness/index.php/api/follow";
	$data = array("user_id" => $follower, 
					"follow_id" => $follow_id, 
					"access_token" => $access_token,
					"sec_token" => $access_tok,
					);
				
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/follow";				
					
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);
	
	echo "<h1>POST request on ../api/user</h1>";
	echo "<pre>";
	print_r($results);
	echo "</pre><br>";
	echo $access_tok;	
	*/
	
/*	
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	//$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$follower = '1';
	$follow_id = '1';
	$access_token = 'ce7593f434c7bf78cb149aebc01ffcb1';
	$access_tok = md5($salt1. md5($follower.$access_token));
	$data = array("user_id" => $follower, 
					"follow_id" => $follow_id, 
					"access_token" => $access_token,
					"sec_token" => $access_tok,
					);
					
	print_r(http_build_query($data));
*/
	
	// POST ON UNFOLLOW
	/*
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	//$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$follow_id = 9;
	$user_id = 27;
	$access_token = '6e3887ba7f60a861ad6ac35dd60f2ffa';
	$access_tok = md5($salt1. md5($follow_id.$access_token));
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/unfollow";
	$data = array("user_id" => $user_id, 
					"follow_id" => $follow_id, 
					"access_token" => $access_token,
					"sec_token" => $access_tok,
					);
					
					
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, 
					array('Content-Type: application/json', 
						'Accept: application/json'
						));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);
	
	echo "<h1>POST request on ../api/user</h1>";
	echo "<pre>";
	print_r($result);
	echo "</pre><br>";
	echo $access_tok;
	*/
	
	// PUT ON FOLLOW
	/*
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	//$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$follower = '1';
	$follow_id = '2';
	$active = 1;
	$access_token = 'ce7593f434c7bf78cb149aebc01ffcb1';
	$access_tok = md5($salt1. md5($active.$access_token));
		$data = array("user_id" => $follower, 
					"follow_id" => $follow_id, 
					"access_token" => $access_token,
					"sec_token" => $access_tok,
					"active" => $active
					);
				
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/follow";				
					
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);
	
	echo "<h1>PUT request on ../api/follow</h1>";
	echo "<pre>";
	print_r($results);
	echo "</pre><br>";
	echo $access_tok;	
	*/
	
	
/*
	//UNFOLLOW
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	//$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$follower = '27';
	$following = '26';
	$follow_id = '8';
	$access_token = '6e3887ba7f60a861ad6ac35dd60f2ffa';
	$access_tok = md5($salt1. md5($follow_id.$access_token));
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/follow";
	$data = array("user_id" => $follower, 
					"follow_id" => $follow_id, 
					"access_token" => $access_token,
					"sec_token" => $access_tok
					);
					
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, 
					array('Content-Type: application/json', 
						'Accept: application/json'
						));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);
	
	echo "<h1>POST request on ../api/user</h1>";
	echo "<pre>";
	print_r($result);
	echo "</pre><br>";
	echo $access_tok;
	*/
	
	/*
	$user_id = '37';
	$fb_id = '100003174385644';
	$acc_tok = '958ef395b0a9f1cfe926b41850694927';
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$sec_tok = md5($fb_id.$acc_tok.$salt2);
	
	
	$parameters = array("access_token" => $acc_tok ,
						"user_id" => $user_id,
						"sec_token" => $sec_tok
						);
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/refresh?".http_build_query($parameters);					
	$ch = curl_init($url);	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);

	echo "<h1>GET request on ../api/user</h1>";
	echo "<pre>";
	print_r($result);
	echo "</pre><br>";
	$date = date_create($results->birthday);
	echo(date_format($date, 'm/d/Y'));

	$date = 1383122839;
	echo date('M-d-Y',$date);
	*/



/*
curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X DELETE 'http://nslib.net/mailbug/mindfulness/index.php/api/follow' -d '{"user_id":"27", "follow_id":"8", "access_token":"6e3887ba7f60a861ad6ac35dd60f2ffa", "sec_token":"960b057ae166b35eafb3c8bc9a752f9b"}'

curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X DELETE 'http://nslib.net/mailbug/mindfulness/index.php/api/unfollow?user' -d '{"user_id":"27", "follow_id":"8", "access_token":"6e3887ba7f60a861ad6ac35dd60f2ffa", "sec_token":"960b057ae166b35eafb3c8bc9a752f9b"}'

curl -i -X PUT 'http://nslib.net/mailbug/mindfulness/index.php/api/practice' -d 'practice_id=3&access_token=ce7593f434c7bf78cb149aebc01ffcb1&sec_token=1b3e8a65189f98f9a313c8af96c1d254&privacy=0&reminder=08%3A00%3A00&name=Memorize+the+song+The+Fox+in+7+days.'


curl -i -X POST 'https://graph.facebook.com/me/feed' -d 'message=this+is+a+test&access_token=CAATZBtbKhadABAOYpnsobZCJMZCxmKaeafqcvhZANvQjx75CEJY8PUt31Kc0UI4kidk3wlovZBVbkc1uWlbV0svdhlMaLf4OfFUZBtZC9iecVtfOeO91iNkzaIT7isJZCnUmZAkub6Dku0bNnXss2ZC2A3878wN5MzqtA3UUGToMo48YOsHQzRLmWjbOhsdPmZBSJAIlXEwOvEcxAZDZD'

curl -i -X POST 'http://nslib.net/mailbug/mindfulness/index.php/api/activity' -H "Accept: application/json" -H "Content-Type: application/json" -d '{"user_id":"2", "access_token":"a36dff421283c163edbf34274662b876", "sec_token":"c81f5f2372387474cb3766946f6f9507"}'

curl -i -X POST 'http://nslib.net/mailbug/mindfulness/index.php/api/cheer' -H "Accept: application/json" -H "Content-Type: application/json" -d '{"progress_id":"18","user_id":"2","access_token":"a36dff421283c163edbf34274662b876","sec_token":"cd33eb2d39094cf3b56b316be92d97f6"}'
*/	
/*
	$date = '1383122839';
	echo date('Y-m-d',$date);
*/
/*
	$message = array('message'=>'This is a test.',
					'picture'=> 'http://theantipodeandotnet.files.wordpress.com/2012/02/catmelonhead_cybersalt-org.jpg',
					'access_token' => 'CAATZBtbKhadABAOYpnsobZCJMZCxmKaeafqcvhZANvQjx75CEJY8PUt31Kc0UI4kidk3wlovZBVbkc1uWlbV0svdhlMaLf4OfFUZBtZC9iecVtfOeO91iNkzaIT7isJZCnUmZAkub6Dku0bNnXss2ZC2A3878wN5MzqtA3UUGToMo48YOsHQzRLmWjbOhsdPmZBSJAIlXEwOvEcxAZDZD');
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
	$results= json_decode($result);
	
	echo "<h1>POST request on ../api/user</h1>";
	echo "<pre>";
	print_r($result);
	echo "</pre><br>";
	echo $access_tok;
*/



?>
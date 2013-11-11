<?php	
	

	
	/*
	//refresh token
	$user_id = '1';
	$fb_id = '6541211';
	$acc_tok = '00a2b1048f25a20ba31b9a5327789407';
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$sec_tok = md5($fb_id.$acc_tok.$salt2);
	
	
	$parameters = array("access_token" => $acc_tok ,
						"user_id" => $user_id,
						"security_token" => $sec_tok
						);
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/refresh?".http_build_query($parameters);					
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
/*
	//post
	//http://nslib.net/mailbug/mindfulness/index.php/api/user
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$fb_token = 'CAACEdEose0cBAKiZCMcfzSNvZBrsGI0vasl5RJZC1kQgS7e9DsJQigjT6iIheuecZCcUallQpMzhZCyqCQlP1Lt4WO9rS5b8iOHODKvR6nzKBPP8AF4qLOwyaKrbCoau4qWCkFAgZBZAX0tcpGUnOCbFqrk3A1VmqowL4r95gikzgZDZD';
	$fname = 'Juan';
	$lname = 'Tamad';
	$email = 'drkw@gmail.com';
	$fb_id = '6541211';
	$access_tok = md5($salt1. md5($email.$fname));
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/user";
	$data = array("email" => $email, 
					"firstname" => $fname, 
					"lastname" => $lname,
					"facebook_id" => $fb_id,
					"sec_token" => $access_tok,
					"fb_token" => $fb_token,
					"birthday" => '1985-05-07'
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
	echo "</pre>";
*/	
/*	
		//get
	$user_id = '791734426';
	$fb_id = '6541211';
	$acc_tok = '257c9b406860c333a527af59c2582874';
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$sec_tok = md5($fb_id.$acc_tok.$salt2);
	
	
	$parameters = array("access_token" => $acc_tok ,
						"user_id" => $user_id,
						"security_token" => $sec_tok
						);
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/user?".http_build_query($parameters);					
	$ch = curl_init($url);	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);

	echo "<h1>GET request on ../api/user</h1>";
	echo "<pre>";
	print_r($results);
	echo "</pre><br>";
	$date = date_create($results->birthday);
	echo(date_format($date, 'm/d/Y'));
*/	
	/*
/*	
	echo "<h1>POST request on ../api/user</h1>";
	echo "<pre>";
	print_r($result);
	echo "</pre>";
	
	$fname = 'Red123';
	$lname = 'John123';
	$email = 'drjenoh1125111@gmail.com';
	$fb_id = '12313131';
	$access_tok = md5($salt1. md5($email.$fname));
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/user";
	$data = array("email" => $email, 
					"firstname" => $fname, 
					"lastname" => $lname,
					"facebook_id" => $fb_id,
					"sec_token" => $access_tok,
					"fb_token" => $fb_token					
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
	echo "</pre>";
	*/
	
	//get user access_token
	
	/*
	$fql = urlencode('SELECT uid,name, is_app_user FROM user  WHERE uid IN(SELECT uid2 FROM friend WHERE uid1 = me()) AND is_app_user = 1');
	$url = "https://graph.facebook.com/fql?q=".$fql."&access_token=517547064995803";					
	$ch = curl_init($url);	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);

	echo "<h1>GET request on ../api/user</h1>";
	echo "<pre>";
	print_r($result);
	echo "</pre><br>";
	*/
/*	
	$fql = urlencode('SELECT uid,name, is_app_user FROM user  WHERE uid IN(SELECT uid2 FROM friend WHERE uid1 = me()) AND is_app_user = 1');
	$url = "https://graph.facebook.com/fql?q=".$fql."&access_token=CAATZBtbKhadABAJ0ZCdFfHybAHqftX944UPG6DWrmS23fcMXQHv1nBt2np2hOxrSFpW3OyHdG5akd3MVRZBzSpBRcZAMGi6kDm98jrcL2gMP0ZBJ0G43Q0NQu2YtcLYxWiuGgQDpsdgvd1hcjNj1ZCHUpvB8xMYQM7TrzicwaE7m99oz9iK4N69LOi3EoQD8RpICmcZC8g8WAZDZD";					
	$ch = curl_init($url);	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 	
	$result = curl_exec($ch);
	curl_close($ch);
	$results= json_decode($result);

	echo "<h1>GET request on ../api/user</h1>";
	echo "<pre>";
	print_r($results);
	echo "</pre>";
	
	foreach($results->data as $data){
	echo "<pre>";
		print_r($data);
	echo('</pre>');
	}
	
*/
/*	
	http://www.nslib.net/mailbug/mindfulness/index.php/api/user
header fields:
[request setValue:@"application/json" forHTTPHeaderField:@"Accept"];
[request setValue:@"application/json" forHTTPHeaderField:@"Content-type"];
parameters:
postParameters = {
birthday = "09/12/1981";
email = "maipranga@gmail.com";
"facebook_id" = 754006648;
"fb_token" = CAAHWtND2r9sBAFF4toYfifB8p5ZCI3BPT6IvBteZCZB1tbrWLAV6IchstDiz9ptZBvYs2RZC84ZCoGt3w7Tpbv6MmobZAfqhrGKdMVyr3I3O9Qx2ep1eHYGgHRXE9ubkFJfjJ8Oqb4ZCq8eTaCHQ4PtFq1Fofbk8VbrgVWsrO8PV3pR6Vtr4y1rtTJ3KPmmN4w9qZB78oRG4hgLFkogyIQ21XLjdr6eJvi4YxkMBBgqLHiQZDZD;
firstname = Myrha;
gender = female;
lastname = Ladanga;
locale = "en_US";
location = "";
private = 0;
"sec_token" = 3658673f57aa848e9661e7e209b8e868;
}
*/


	//http://nslib.net/mailbug/mindfulness/index.php/api/user
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$fb_token = 'CAAHWtND2r9sBAFF4toYfifB8p5ZCI3BPT6IvBteZCZB1tbrWLAV6IchstDiz9ptZBvYs2RZC84ZCoGt3w7Tpbv6MmobZAfqhrGKdMVyr3I3O9Qx2ep1eHYGgHRXE9ubkFJfjJ8Oqb4ZCq8eTaCHQ4PtFq1Fofbk8VbrgVWsrO8PV3pR6Vtr4y1rtTJ3KPmmN4w9qZB78oRG4hgLFkogyIQ21XLjdr6eJvi4YxkMBBgqLHiQZDZD';
	$fname = 'Myrha';
	$lname = 'Ladanga';
	$gender = 'female';
	$email = 'maipranga@gmail.com';
	$fb_id = '754006648';
	$locale = "en_US";
	//$bday = '09\/12\/1981';
	$access_tok = md5($salt1. md5($email.$fname));
	$url = "http://nslib.net/mailbug/mindfulness/index.php/api/user";
	$data = array("email" => $email, 
					"firstname" => $fname, 
					"lastname" => $lname,
					"facebook_id" => $fb_id,
					"sec_token" => $access_tok,
					"fb_token" => $fb_token,
					"birthday" => '1981-09-12',
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


	
	/*
	curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X POST http://nslib.net/mailbug/mindfulness/index.php/api/user -d '{"email":"senbonzakura57@gmail.com","firstname":"NeYu","lastname":"Taclino","facebook_id":"1815882152","sec_token":"ce7593f434c7bf78cb149aebc01ffcb1", "fb_token":"CAATZBtbKhadABANEJhvIkTTQ3HFC8Q1p9qLk234NOIZAJjM7UAf9liKpY7XxZAufYd5Y8iMxwtw5pYWTUo1g0NIEacMIcOjKoU2E7izfo7vY47SDmvOAp5sbpZAaAkYRyOVLPvJQZBLNHwM9kPZATflAq29jDsWtDpMwVZBDZAdnptxYlsQGXPVCqFPfptudU8HBok0KwRtJkwZDZD", "gender":"male","locale":"en_US", "private":"0"}'
	
	
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
					
					
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json',"OAuth-Token: $token"));
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
	
	*/
	
$date = date_create("05/07/1990");
echo date_format($date,"m-d-Y");
	
?>
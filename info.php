<?php //phpinfo(); 
	/*
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$firstname = 'Neil';
	$email = 'dungol@asdadada.com';
	$facebook_id = '123131231';
	$ts = 1380881864;
	*/
	$salt1 = '007v4716qx83kT3raZW6oyXUS3NQ2SRR';
	$salt2 = '1I52zr6Le83QSVSC2PG6tdtO4pPbp8k1';
	$firstname = 'Cait';
	$email = 'cait@gmail.com';
	$facebook_id = '12309122';
	$ts = 1380881864;
	
	
	$token = md5($salt1 .md5( $firstname . $email));
	$new_token = md5($ts.$token);
	
	$security_token = md5($facebook_id.$new_token.$salt2);
	
	echo $security_token.'<br>';
	echo $new_token.'<br>';
	echo $token.'<br>';
	echo date('Y-m-d H:i:s', 1380881864).'<br>';
	echo date('Y-m-d H:i:s', 1380881864+(24*60*60));
	
	/*
	$dbh=mysql_connect ("localhost", "numlock1_mfn01", "*+3AH;MwELk9")
	or die ('I cannot connect to the database.');
	mysql_select_db ("mindfulness");
	*/
	//http://nslib.net/mailbug/mindfulness/index.php/api/user?access_token=01f9c391f5e8a693f2c1182ff4e7e908&facebook_id=123131231&security_token=ab93b29bb3b72f06b1dd4e7742660645
	
?>
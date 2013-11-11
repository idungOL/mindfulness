<?php

class Invites extends CI_Model{



	
	function send_email($from_name, $from_address, $to_address){
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, 'api:key-2wntm2wm4v1nnrlmpxmknxrhykv1bdg0');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/dungol.mailbug.com/messages');
		curl_setopt($ch, CURLOPT_POSTFIELDS, array('from' => $from_name."<".$from_address.">",
												 'to' => $to_address,
												 'subject' => 'Mindfulness App Invite',
												 'text' => 'Test Email!'));

		$result = curl_exec($ch);
		curl_close($ch);
		return json_decode($result);
		
	}
	
}
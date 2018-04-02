<?php


function sendEmail($emailSubject, $message){
	//your email adress 
	$emailTo ="shubhamgupta0206@gmail.com,agupta.92@gmail.com"; //"yourmail@yoursite.com";

	//from email adress
	$emailFrom ="agupta.92@gmail.com"; //"contact@yoursite.com";
	$headers = "MIME-Version: 1.0" . "\r\n"; 
	$headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 
	$headers .= "From: <$emailFrom>" . "\r\n";
	mail($emailTo, $emailSubject, $message, $headers);
}

?>
<?php

include (dirname(__FILE__)."/../shared/utility.php");
$stockCode = 'ADANIENT';
$output = "Stock : $stockCode<br>";
$high = '2. high';
$low = '3. low';
$result = file_get_contents("https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=$stockCode&interval=1min&apikey=J6LGP3NREJV0WKUP&outputsize=compact");
if($result){
	$result = json_decode($result);	
} else {
	echo "There is some problem in getting Content from API";
	exit;
}

//var_dump($result);
$output .= "Time Considered :";
//$output .= $today = date("Y-m-d 00:00:00");
$output .= $today = date("Y-m-d 00:04:00");
$property = 'Time Series (1min)';
//var_dump($result->$property->$today);
$checkpointValue = $result->$property->$today;
$output .= "<br>High: ".$checkpointValue->$high."<br>Low: ".$checkpointValue->$low."<br>";
//echo $output;
$output .= "Order 1 : Buy= ". ($checkpointValue->$high + 0.2) . " & Sell= ". ($checkpointValue->$high + 0.7);
//echo $output;
$output .= "<br>Order 2 : Sell= ". ($checkpointValue->$low - 0.2) . " & Buy= ". ($checkpointValue->$low - 0.7);

$emailSubject = "ADANIENT DAILY INTRADAY";

sendEmail($emailSubject, $output);
echo $output;

//echo "Time Take: ". $today;



?>
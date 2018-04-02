<?php

include "/../shared/utility.php";
$stockCode = 'ADANIENT';
$output = "Stock : $stockCode\n";
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
$output .= $today = date("Y-m-d 06:00:00");
//$output .= $today = date("Y-m-d 00:04:00");
$property = 'Time Series (1min)';
//var_dump($result->$property->$today);
$checkpointValue = $result->$property->$today;
$output .= "\nHigh: ".$checkpointValue->$high."\nLow: ".$checkpointValue->$low."\n";
//echo $output;
$output .= "Order 1 : Buy= ". ($checkpointValue->$high + 0.2) . " & Sell= ". ($checkpointValue->$high + 0.7);
//echo $output;
$output .= "\nOrder 2 : Sell= ". ($checkpointValue->$low - 0.2) . " & Buy= ". ($checkpointValue->$low - 0.7);

$emailSubject = "ADANIENT DAILY INTRADAY";

sendEmail($emailSubject, $output);
echo $output;

//echo "Time Take: ". $today;



?>
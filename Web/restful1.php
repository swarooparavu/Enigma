<?php
 
header("Content-Type:application/json");
include 'database1.php';

if(!empty($_GET['data']))   
{
	$metrics = $_GET['data'];

	$response = enigma($metrics);
	   
	if(empty($response))
	{
		deliver_response(200,"metrics not Found",NULL);
	}
	else
	{
		deliver_response(200,"metrics Found",$response);
	}
}    
else
{
	deliver_response(400,"No entry Found",NULL);
}

function deliver_response($status,$status_message,$i)
{
	global $find;
	
	header("HTTP/1.1 $status $status_message");
	$reply['status']=$status;
	$reply['status_message']=$status_message;
	
	$json_response=json_encode($reply);
	echo "$json_response\n";
	
	
	
	for ($row = 0; $row < $i; $row++)
	{
		$result['data_rate'] = $find[$row]['data_rate'];
		$result['Ips'] = $find[$row]['Ips'];
		$result['Ipd'] = $find[$row]['Ipd'];


		$json_response=json_encode($result);
		echo "$json_response\n";
	}
	
}

?>


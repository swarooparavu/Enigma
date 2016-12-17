
<?php
 
header("Content-Type:application/json");
include 'database.php';

if(!empty($_GET['metrics']))   
{
	$metrics = $_GET['metrics'];

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
		$result['rrt'] = $find[$row]['rrt'];
		$result['sst'] = $find[$row]['sst'];
		$result['ips'] = $find[$row]['ips'];
		$result['ipd'] = $find[$row]['ipd'];

		$json_response=json_encode($result);
		echo "$json_response\n";
	}
	
}

?>


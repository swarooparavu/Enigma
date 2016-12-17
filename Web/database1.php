<?php

$i = 0;
$find;

function enigma($metrics)
{
	global $i,$find;	
	
	//include "db.conf";
$path = dirname(__FILE__);

$path1 = explode("/",$path,-1);
$path1[count($path1)+1]='db.conf';
$finalpath = implode("/",$path1);

$handle = fopen($finalpath, "r");
while (!feof($handle))
		 {
			 $line = fgets($handle);

			$data = explode("'",$line);

				if($data[0]=='host=>')
				{
				  $host= $data[1];
				}
				elseif($data[0]=='port=>')
				{
				 $port= $data[1];
				}
				elseif($data[0]=='username=>')
				{
				 $username= $data[1];
				}
				elseif($data[0]=='password=>')
				{
				 $password= $data[1];
				}
				elseif($data[0]=='database=>')
				{
				 $database= $data[1];
				}
		 }

	
	// Create connection
        $conn = mysql_connect($host, $username, $password,$database);

        // Check connection
        if (!$conn) 
{
        die("Connection failed: " . mysql_connect_error());
}
        //echo "Connected successfully<br>";

        mysql_select_db('ENIGMA',$conn);
        $result = mysql_query("SELECT * FROM data",$conn);


$i=0;
while($row = mysql_fetch_array($result)) 

	{

	 	$find[$i]['data_rate'] = $row['0'];
		$find[$i]['Ips'] = $row['1'];
		$find[$i]['Ipd'] = $row['2'];

		$i++;
	}


return($i);

}	
?>

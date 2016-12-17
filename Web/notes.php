<?php

$path = dirname(__FILE__);

$path1 = explode("/",$path,-1);
$path1[count($path1)+1]='db.conf';
$finalpath = implode("/",$path1);

$handle = fopen($finalpath, "r");
while (!feof($handle)) {
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

echo"<link rel='stylesheet' type='text/css' href='stylesheet.css'/>";
//
$dbhandle = mysql_connect($host, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db("ENIGMA",$dbhandle) 
  or die("Could not select databse");

//execute the SQL query and return records
$i = 0;
$j = 0;
$result = mysql_query("SELECT * FROM Average");

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	$average[0] = $row['averageRRT'];
	$average[1] = $row['averageSST'];
	$average[2] = $row['averageDRATE'];
	$i++;  
}


$result1 = mysql_query("SELECT thresholdRTT,thresholdSST,thresholdDRATE FROM notifications"); 

while($ring = mysql_fetch_array($result1))
{
	$thresh[0] = $ring['thresholdRTT'];
	$thresh[1] = $ring['thresholdSST'];
	$thresh[2] = $ring['thresholdDRATE'];	
	echo "thresholdRTT: " . $thresh[0] . "</br>thresholdSST: " . $thresh[1] . "</br>thresholdDRATE: " . $thresh[2] . "</br>";
	$j++;
}


//$aver = array("averageRRT","averageSST","averageDRATE");
//$thr = array("thresholdRTT","thresholdSST","thresholdDRATE");

echo "<table border='1'>
<thead>average</thead>
<tr>
<th>averageRRT</th>
<th>averageSST</th>
<th>averageDRATE</th>	
</tr>
<tr>";

for($k = 0; $k < 3; $k++)
{
	if ($average[$k] > $thresh[$k])
	{
		$color_class = 'red';
	}
	else
	{
		$color_class = 'white';
	}

	echo "<td style = 'background-color: " . $color_class . "'>" . $average[$k] . "</td>";
	
}

	echo "</tr></table>";
/*
    echo "<tr class={$color_class}>" ;
    echo "<td>" . $row['averageRRT'] . "</td>" ; 
    echo "<td>" . $row['averageSST'] . "</td>>" ;
    echo "<td>" . $row['averageDRATE'] . "</td>" ;

    
    echo "</tr>";*/

//echo "</table>";

?>





 



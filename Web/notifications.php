<!DOCTYPE html>
<html>
<body>

<head>
<title>Page Title</title>
<style> 
html { 
  background: url(image.jpg) no-repeat center center fixed; 
  background-size: cover;
}

body { 
  color: white; 
}
</style>
</head>

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


?>

<h1>Notifications</h1>



<form method="GET" > 
thresholdRTT: <br>
<input type="text" name="thresholdRTT" > <br>

thresholdRTT1: <br>
<input type="text" name="thresholdRTT1" > <br>
 
thresholdSST: <br>
<input type="text" name="thresholdSST" > <br>

thresholdSST1: <br>
<input type="text" name="thresholdSST1" > <br>
  
thresholdDRATE:   <br>
<input type="text" name="thresholdDRATE"> <br>

thresholdDRATE1:   <br>
<input type="text" name="thresholdDRATE1"> <br>

Emailid: <br>
<input type="text" name="Emailid"> <br>

IPAddress:   <br>             
<input type="text" name="IPAddress"> <br>

OID:    <br>           
<input type="text" name="OID"> <br>


port:    <br>           
<input type="text" name="port"> <br>


SNMPCommunity:    <br>           
<input type="text" name="SNMPCommunity"> <br>

SMS:  <br>              
<input type="text" name="SMS"> <br>

<input type="submit" value="Submit">
</form> 

<?php

$dbhandle = mysql_connect($host, $username, $password, $database) 
 or die("Unable to connect to MySQL");

//select a database to work with
$selected = mysql_select_db("ENIGMA",$dbhandle) 
  or die("Could not select databse");

//$sql="DROP TABLE `notifications` IF EXISTS";
//$del=mysql_query($sql,$dbhandle);

//sql to create a table
/*$sql1= " CREATE TABLE  `tcp` (

`thresholdRTT` VARCHAR(20) NOT NULL,
`thresholdSST` VARCHAR(30) NOT NULL,
`thresholdDRATE` VARCHAR(30) NOT NULL,
`Emailid` VARCHAR(50) NOT NULL,
`IPAddress` VARCHAR(30) NOT NULL,
`OID` VARCHAR(20) NOT NULL,
`Hostname` VARCHAR(20) NOT NULL,
`port` VARCHAR(20) NOT NULL,
`SNMPCommunity` VARCHAR(20) NOT NULL,
`SMS` VARCHAR(20) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$create=mysql_query($sql1,$dbhandle);*/

$sql="CREATE TABLE IF NOT EXISTS `notifications` (
	`id` INT(8) NOT NULL,
	`thresholdRTT` VARCHAR(20) NOT NULL,`thresholdRTT1` VARCHAR(20) NOT NULL,
`thresholdSST` VARCHAR(30) NOT NULL,`thresholdSST1` VARCHAR(30) NOT NULL,
`thresholdDRATE` VARCHAR(30) NOT NULL,`thresholdDRATE1` VARCHAR(30) NOT NULL,
`Emailid` VARCHAR(30) NOT NULL,
`IPAddress` VARCHAR(4800) NOT NULL,
`OID` VARCHAR(4800) NOT NULL,`port` VARCHAR(4800) NOT NULL,
`SNMPCommunity` VARCHAR(4800) NOT NULL,
`SMS` VARCHAR(4800) NOT NULL,
	
	PRIMARY KEY (`id`)  )

	ENGINE=InnoDB DEFAULT CHARSET=latin1";

mysql_query($sql,$dbhandle);

$sql2=mysql_query("INSERT INTO `notifications` (id,thresholdRTT,thresholdRTT1, thresholdSST,thresholdSST1, thresholdDRATE,thresholdDRATE1,Emailid,IPAddress,OID,port,SNMPCommunity,SMS)
VALUES ('1','1','1','1','1','1','1','1','1','1','1','1','1') ");



$thresholdRTT=htmlspecialchars($_GET['thresholdRTT']);
$thresholdRTT1=htmlspecialchars($_GET['thresholdRTT1']);
$thresholdSST=htmlspecialchars($_GET['thresholdSST']);
$thresholdSST1=htmlspecialchars($_GET['thresholdSST1']);
$thresholdDRATE=htmlspecialchars($_GET['thresholdDRATE']);
$thresholdDRATE1=htmlspecialchars($_GET['thresholdDRATE1']);
$Emailid=htmlspecialchars($_GET['Emailid']);
$IPAddress=htmlspecialchars($_GET['IPAddress']);
$OID=htmlspecialchars($_GET['OID']);
$port=htmlspecialchars($_GET['port']);
$SNMPCommunity=htmlspecialchars($_GET['SNMPCommunity']);
$SMS=htmlspecialchars($_GET['SMS']);

if($thresholdRTT== '' && $thresholdRTT1== '' && $thresholdSST== '' && $thresholdSST1== '' && $thresholdDRATE== '' && $thresholdDRATE1== '' ) 
{
}
else
{
//Updating data into mysql
$sql3 =  "UPDATE notifications SET thresholdRTT='$thresholdRTT',thresholdRTT1='$thresholdRTT1', thresholdSST='$thresholdSST',thresholdSST1='$thresholdSST1', thresholdDRATE='$thresholdDRATE',thresholdDRATE1='$thresholdDRATE1',Emailid='$Emailid',IPAddress='$IPAddress',OID='$OID',port='$port',SNMPCommunity='$SNMPCommunity',SMS='$SMS' WHERE id=1";
}
//VALUES ('',,,,,,,) ";

$ins=mysql_query($sql3,$dbhandle);

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


$result1 = mysql_query("SELECT thresholdRTT,thresholdRTT1,thresholdSST,thresholdSST1,thresholdDRATE,thresholdDRATE1 FROM notifications"); 

while($ring = mysql_fetch_array($result1))
{
	$thresh[0] = $ring['thresholdRTT'];
	$thresh[1] = $ring['thresholdRTT1'];
	$thresh[2] = $ring['thresholdSST'];
	$thresh[3] = $ring['thresholdSST1'];	
	$thresh[4] = $ring['thresholdDRATE'];
        $thresh[5] = $ring['thresholdDRATE1'];	

	$j++;
}
echo "thresholdRTT: " . $thresh[0] . "</br>thresholdRTT1: " . $thresh[1] . "</br>thresholdSST: " . $thresh[2] . "</br>thresholdSST1: " . $thresh[3] . "</br>thresholdDRATE: " . $thresh[4] . "</br>thresholdDRATE1: " . $thresh[5] . "</br>";	



//$aver = array("averageRRT","averageSST","averageDRATE");
//$thr = array("thresholdRTT","thresholdSST","thresholdDRATE");



echo "<table border='1'>
<thead>average</thead>
<tr>
<th>averageRRT</th>
<th>averageSST</th>
<th>averageDRATE</th>	
</tr>";




	if ($average[0] >= $thresh[0] && $average[0] < $thresh[1])
	{

		$color_class1 = '#FF850A';
	}
	elseif($average[0] >= $thresh[1])
        {
                $color_class1 = '#FF0000';
        }
        else
	{
		$color_class1 = '#00CC00';
	}

        if ($average[1] >= $thresh[2] && $average[1] < $thresh[3])
	{
		$color_class2 = '#FF850A';
	}
	elseif($average[1] >= $thresh[3])
        {
                $color_class2 = '#FF0000';
        }
        else
	{
		$color_class2 = '#00CC00';
	}

        if ($average[2] >= $thresh[4] && $average[2] < $thresh[5])
	{
		$color_class3 = '#FF850A';
	}
	elseif($average[2] >= $thresh[5])
        {
                $color_class3 = '#FF0000';
        }
        else
	{
		$color_class3 = '#00CC00';
	}

	echo "<td style = 'background-color: " . $color_class1 . "'>" . $average[0] . "</td>";
	echo "<td style = 'background-color: " . $color_class2 . "'>" . $average[1] . "</td>";
	echo "<td style = 'background-color: " . $color_class3 . "'>" . $average[2] . "</td>";
	


	echo "</tr></table>";
/*
    echo "<tr class={$color_class}>" ;
    echo "<td>" . $row['averageRRT'] . "</td>" ; 
    echo "<td>" . $row['averageSST'] . "</td>>" ;
    echo "<td>" . $row['averageDRATE'] . "</td>" ;

    
    echo "</tr>";*/

//echo "</table>";

?>

</body>
</html>


<html>
<body>
<div class="input-color">
    <input type="text" value="Green indicates normal" readonly />
    <div class="color-box" style="background-color: #00CC00"></div>
   <!-- Replace "#FF850A" to change the color -->
</div>

<div class="input-color">
    <input type="text" value="orange indicates warning" readonly />
    <div class="color-box" style="background-color: #FF850A"></div>

<div class="input-color">
    <input type="text" value="red indicates critical" readonly />
    <div class="color-box" style="background-color: #FF0000;">
</div>
</body>
</html>


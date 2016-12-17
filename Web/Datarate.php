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

header("refresh: 10;");
 
// Create connection
$conn = mysql_connect($host, $username, $password,$database);

// Check connection
if (!$conn) {
   die("Connection failed: " . mysql_connect_error());
}
//echo "Connected successfully<br>";

mysql_select_db('ENIGMA',$conn);
$result = mysql_query("SELECT * FROM data",$conn);
?>

<div>
<style>thead {color:black;}
table,th,td
{border:1px solid black;}
</style>
</head>
<body>
<table border="1" style="width:300px">
<thead>
<tr  style = "padding: 2px;">
<th  style = "text-align: center;">Datarate(Bps)</th>
<th  style = "text-align: center;">SourceIP/port</th>
<th  style = "text-align: center;">DestinationIP/port</th>


<!--<th  style = "text-align: center;">Datarate</th> -->


</tr>
<?php
$i=0;
while($row = mysql_fetch_array($result)) {
?>

<tr style = "padding: 2px;">
<td><?php echo $row["data_rate"]; ?></td>
<td><?php echo $row["Ips"]; ?></td>
<td><?php echo $row["Ipd"]; ?></td>


<!--<td><?php echo $row["data_rate"]; ?></td>-->



</tr>
<?php
$i++;
}
?>
</table>

</div>



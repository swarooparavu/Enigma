<!DOCTYPE html>
<html>
<head>
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
</html>
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

$dbhandle = mysql_connect($host, $username, $password) 
 or die("Unable to connect to MySQL");


//select a database to work with
$selected = mysql_select_db("ENIGMA",$dbhandle) 
  or die("Could not select databse");


$password=md5($_POST["password"]);
//execute the SQL query and return records
$result = mysql_query(" SELECT * FROM `login` WHERE user='".$_POST["username"]."' && password='".$password."' ");

if(mysql_num_rows($result)==1)
{
include 'home.html';
}
else echo "sorry cant connect database";

//fetch tha data from the database 
//close the connectionx
mysql_close($dbhandle);


?>



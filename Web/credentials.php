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



// Create connection
$conn = mysql_connect($host, $username, $password,$database);

// Check connection
if (!$conn) {
   die("Connection failed: " . mysql_connect_error());
}
//echo "Connected successfully<br>";

mysql_select_db('ENIGMA',$conn);

$sql="CREATE TABLE IF NOT EXISTS `credentials` (
	`id` INT(8) NOT NULL,
	`Ipaddress` VARCHAR(20) NOT NULL,
	`USERname` VARCHAR(20) NOT NULL,
        `Password` VARCHAR(30) NOT NULL,
        `Interface` VARCHAR(30) NOT NULL,
        `link1` VARCHAR(30) NOT NULL,
        `link2` VARCHAR(30) NOT NULL,
        `Sourcepath` VARCHAR(50) NOT NULL,
        `Destinationpath` VARCHAR(50) NOT NULL,

	PRIMARY KEY (`id`)  )

	ENGINE=InnoDB DEFAULT CHARSET=latin1";

mysql_query($sql,$conn);

$sql2=mysql_query("INSERT INTO `credentials` (`id`, `Ipaddress`,`USERname`, `Password`,`Interface`,`link1`,`link2`,`Sourcepath`,`Destinationpath`) VALUES('1','1', '1', '1','1','1','1','1','1')");


$Ipaddress=htmlspecialchars($_GET['Ipaddress']);
$USERname=htmlspecialchars($_GET['USERname']);
$Password=htmlspecialchars($_GET['Password']);
$Interface=htmlspecialchars($_GET['Interface']);
$link1=htmlspecialchars($_GET['link1']);
$link2=htmlspecialchars($_GET['link2']);
$Sourcepath=htmlspecialchars($_GET['Sourcepath']);
$Destinationpath=htmlspecialchars($_GET['Destinationpath']);



//Inserting data into mysql
$sql3 =  "UPDATE credentials SET Ipaddress='$Ipaddress', USERname='$USERname', Password='$Password',Interface='$Interface',link1='$link1',link2='$link2',Sourcepath='$Sourcepath',Destinationpath='$Destinationpath' WHERE id=1";

$ins=mysql_query($sql3,$conn);

//close the connectionx
mysql_close($conn);

?>



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





<form method="GET"> 
Ipaddress: <br>
<input type="text" name="Ipaddress" > <br>

USERname: <br>
<input type="text" name="USERname" > <br>

Password: <br>
<input type="Password" name="Password" > <br>

Interface: <br>
<input type="text" name="Interface" > <br>

link1: <br>
<input type="text" name="link1" > <br>

link2: <br>
<input type="text" name="link2" > <br>

Sourcepath: <br>
<input type="text" name="Sourcepath" > <br>

Destinationpath: <br>
<input type="text" name="Destinationpath" > <br>


<input type="submit" value="Submit"> <br>


</form>




<?php

{
include 'credentials.php';
}

?>




<?php
$hostname="localhost";
$username="root";
$password="";
$dbid="visitor";
$link=mysql_connect($hostname,$username,$password) or die("Could not connect database");
mysql_select_db($dbid) or die("unable to connect");

?>

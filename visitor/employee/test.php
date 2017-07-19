<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
name:<?php
$hostname="localhost";
$username="root";
$password="";
$dbid="visitor";
$link=mysql_connect($hostname,$username,$password);
mysql_select_db($dbid) or die("unable to connect");


$data = @mysql_query("select * from employee");
echo "<p>Select a Name:";
echo "<Select Name='ID'>";
while ($row = mysql_fetch_assoc($data))
{
$name = $row['name'];
$pass = $row['password'];
echo "<option value=$name>$name";
}
echo "</select>";
echo "</p>";
?>
</body>
</html>

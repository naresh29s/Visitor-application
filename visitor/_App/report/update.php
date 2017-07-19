<?php
session_start(); 


$mysql_db_hostname = "localhost";
$mysql_db_user = "root";
$mysql_db_password = "";
$mysql_db_database = "visitor";

$con = mysql_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password) or die("Could not connect database");
mysql_select_db('visitor', $con) or die("Could not select database");
$status = $_POST['status'];
$date = $_POST['date'];
$barcode = $_POST['barcode'];
$contno=$_POST['mno'];
$name=$_POST['nm'];
$q="UPDATE visiting_details SET status ='".$status."' where Barcode='".$barcode."'and visiting_date='".$date."'";
$row=mysql_query($q);


$sql2= " insert into popup (`name`,`mob_no`,`status`) values ('{$name}','{$contno}','{$status}')";
			$row2= mysql_query($sql2);
		if(! $row2 )
			{
  			die('Could not update data21212121: ' . mysql_error());
			}
echo "<script> alert('1 record updated'); 
 window.location.href='../vmsreport.php';</script>";


mysql_close($con);
?>
<?php
session_start(); 
include('../../db_con.php');

$status = $_REQUEST['status'];
$date = $_REQUEST['date'];
$barcode = $_REQUEST['bc'];
$page=$_REQUEST['page'];
$name=$_REQUEST['name'];
$contno=$_REQUEST['cont_no'];

$q="UPDATE visiting_details SET status ='".$status."' where Barcode='".$barcode."'and visiting_date='".$date."'";
$row=mysql_query($q);


$sql2= " insert into popup (`name`,`mob_no`,`status`) values ('{$name}','{$contno}','{$status}')";
			$row2= mysql_query($sql2);
		if(! $row2 )
			{
  			die('Could not update data21212121: ' . mysql_error());
			}
echo "<script>
 window.location.href='".$page.".php';</script>";

?>
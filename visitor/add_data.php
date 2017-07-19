<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>


<body>
<?php 
include('db_con.php');

	$full_name=$_POST['Emp_Name'];
	$e_id=$_POST['e_id'];
	$password=$_POST['Password'];
	$code=$_POST['Emp_Code'];
	
	
	$q1 = "select * from Emp_details where Emp_code='$code'";
	$rs = mysql_query($q1);
	$row=mysql_fetch_array($rs);
	$a=$row['id'];
	if ($a>0)
	{
	echo "<script>alert('Emp_code ($code) is exist in databse');window.location.href='add_employee.php';</script>";
	}
	else
	{
	 $sql1 = "insert into Emp_details (`Emp_Code`,`full_Name`,`email_id`,`password`) values ('{$code}','{$full_name}','{$e_id}', '{$password}')";
 $retval = mysql_query( $sql1, $conn );
 echo "<script>alert('Data is added in database');window.location.href='add_employee.php';</script>";
	if(! $retval )
	{
  		die('Could not enter data: ' . mysql_error());
	}
	}
?>
</body>
</html>

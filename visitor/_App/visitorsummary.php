
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body  bgcolor="#e1e1e1">
<div>
<?php 
 
include('../db_con.php');
$q = "select visiting_date from visiting_details where visiting_date='".date("Y-m-d")."'";
$result = mysql_query($q);
$row = mysql_num_rows($result);
?>
<table width="149" height="289" >
  <tr><td height="40"><h3>Total Visited:</h3></td><td><h3><u><?php echo $row; ?></u></h3></td></tr>
<?php $q1 = "select status from visiting_details where status='IN' and visiting_date='".date("Y-m-d")."'";
  $result1 = mysql_query($q1);
$row1 = mysql_num_rows($result1);
?>              
 <tr><td height="42"><h3>Total In:</h3></td><td><h3><u><?php echo $row1; ?></u></h3></td></tr>
 
<?php $q2 = "select status from visiting_details where status='OUT' and visiting_date='".date("Y-m-d")."'";
  $result2 = mysql_query($q2);
$row2 = mysql_num_rows($result2);
?>        
 <tr><td height="38"><h3>Total Out:</h3></td><td><h3><u><?php echo $row2; ?></u></h3></td></tr>
		   
<?php $q3 = "select status from visiting_details where status='Waiting' and visiting_date='".date("Y-m-d")."'";
  $result3 = mysql_query($q3);
$row3 = mysql_num_rows($result3);?>
<tr><td height="37"><h3>Waiting:</h3></td><td><h3><u><?php echo $row3; ?></u></h3></td></tr></table>
</div>
</body>
</html>
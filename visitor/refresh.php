<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Refresh Visitor Summary</title>
</head>

<body>
<?php
 
include('db_con.php');
$q = "select visiting_date from visiting_details where visiting_date >= '".date("Y-m-d")."'";
$result = mysql_query($q);
$row = mysql_num_rows($result);
?>

<table width="600">
<tr><td align="right"><h3>Total Visited:</h3></td><td align="left"><h3><u><?php echo $row; ?></u>|</h3></td>

<?php $q1 = "select Status from visiting_details where Status='IN' and visiting_date >= '".date("Y-m-d")."'";
  $result1 = mysql_query($q1);
$row1 = mysql_num_rows($result1);
?>              
<td align="right"><h3>Total In:</h3></td><td align="left"><h3><u><?php echo $row1; ?></u>|</h3></td>

<?php $q2 = "select visiting_date from visiting_details where Status='OUT' and visiting_date >= '".date("Y-m-d")."'";
  $result2 = mysql_query($q2);
$row2 = mysql_num_rows($result2);
?>        
<td align="right"><h3>Total Out:</h3></td><td align="left"><h3><u><?php echo $row2; ?></u>|</h3></td>

<?php $q3 = "select visiting_date from visiting_details where Status='Waiting' and visiting_date >= '".date("Y-m-d")."'";
  $result3 = mysql_query($q3);
$row3 = mysql_num_rows($result3);
?>        
<td align="right"><h3>Waiting:</h3></td><td align="left"><h3><u><?php echo $row3 ?></u>|</h3></td></tr></table>		   

</body>
</html>
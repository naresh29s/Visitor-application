<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php $con=mysql_connect("localhost","root","");
// Check connection
if (!$con){
  die('Could not connect:' . mysql_error());
  }
mysql_select_db("visitor", $con);
$q = "select frmdate from validitydate where frmdate='".date("Y-m-d")."'";
$result = mysql_query($q,$con);
$row = mysql_num_rows($result);
?>
<table><tr><td><b>Today's Strength:</b></td><td><?php echo $row; ?></td><td></td>
<?php $q1 = "select Status from validitydate where Status='IN'";
  $result1 = mysql_query($q1,$con);
$row1 = mysql_num_rows($result1);
?>              
		   <td><b>Total In:</td><td></td><td><?php echo $row1; ?></td>
<?php $q2 = "select Status from validitydate where Status='OUT'";
  $result2 = mysql_query($q2,$con);
$row2 = mysql_num_rows($result2);
?>        
		   <td><b>Total Out:</td><td></td><td><?php echo $row2; ?></td></tr></table>
<?php mysql_close($con);?>
</body>
</html>

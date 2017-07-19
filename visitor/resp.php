
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<body>
<table width="100px" height="27" bordercolor="#990000" id="newspaper-a" summary="2007 Major IT Companies' Profit"> 
<tr>

<th ><b>Name</b></th>
<th ><b>Status</b></th>
</tr>                                              

<?php 

include('db_con.php');
$q = "select * from  visiting_details where visiting_date='".date('Y-m-d')."' and status!='OUT' order by visiting_date";
$result = mysql_query($q);
$row_num = mysql_num_rows($result);

$q1 = "select * from preference";
$rs = mysql_query($q1);
$row=mysql_fetch_array($rs);
$a=$row['need_user_approval'];

$row_num = mysql_num_rows($result);
 while($row1 = mysql_fetch_array($result)) 
 {
 if($a=='YES')
 {
 echo "<tr><td  align='center'>".$row1['vname']."</td>";
 echo "<td  align='center'>".$row1['status']."</td></tr>";
	}
 } 

?>
</table>

</body>
</html>
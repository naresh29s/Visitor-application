<?php
session_start(); 

$mysql_db_hostname = "localhost";
$mysql_db_user = "root";
$mysql_db_password = "";
$mysql_db_database = "visitor";

$con = mysql_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password) or die("Could not connect database");
mysql_select_db('visitor', $con) or die("Could not select database");
$id = $_REQUEST['id'];
$q = "select * from visiting_details where Barcode='".$id."'";
$result = mysql_query($q);

while($row=mysql_fetch_array($result))
{

?>
<html>
<body bgcolor="#FFFFFF">
<form name="frm" method="POST" action="admin_update.php">

<center>
<br>
  <font color="#990000" size="+2"><B>------Edit Status Manually-----</B></font>
  <br>
  <br>
</center>

<?php
/*
$query=         "select v_id, image from master_visitor where v_id='0008'";

$query_run=     mysql_query($query);

while ($query_fetch=    mysql_fetch_assoc($query_run))
 {

     echo '</br>';
     echo $query_fetch['image'];

}
header("Content-type: image/jpeg");
*/
?>

<table border=1 bordercolordark="#990000" align=center >


<tr >
<td width="234"><img width="235"  height="134" src="getImage.php?contno='<?php echo $row['cont_no']; ?>'"/></td>
</tr>
</table>

<table width="379" height="228" border=1 align=center bordercolorlight="#990000">

<tr>
<td><font color="#990000">Visitor_ID:</font></td><td><INPUT type="text" name="vid" value="<?php echo $row['v_id']?> " readonly> </td></tr>
<tr>
<td><font color="#990000"> Name:</font></td><td><INPUT type="text" name="nm" value="<?php echo $row['vname']?> " readonly> </td></tr>
<tr>
<td><font color="#990000"> Mobile_No:</font></td><td><INPUT type="text" name="mno" value="<?php echo $row['cont_no']?> " readonly> </td></tr>
<tr>
<td><font color="#990000">Date:</font></td><td><INPUT type="text" name="date" value="<?php echo $row['visiting_date']?> " readonly> </td></tr>
<tr>
<td><font color="#990000">Time:</font></td><td><INPUT type="text" name="time" value="<?php echo $row['visiting_time']?> " readonly> </td></tr>
<tr>
<td><font color="#990000">Status:</font></td><td><INPUT type="text" name="status" value="<?php echo $row['status']?> " readonly> </td>
<tr>
<td><font color="#990000">Change Status To:</font></td><td><select name="status" style="width:145px">
				 	<option value="IN">IN</option>
					<option value="OUT">OUT</option>
					<option value="DONT_ALLOW">DO NOT ALLOW</option>
					</select></td>
<td><INPUT type="hidden" name="barcode" value="<?php echo $row['Barcode']?>" /></td>
</tr>

<tr><td colspan=2><center><INPUT type="submit" value="Update"/>
<a href='../../_app/vmsreport.php''><font color="#990000"><b>BACK</b></font></a></center></td></tr>
</table>
</form>
</html>
<?php
//code for popup...............................................................
$hostname="localhost";
$username="root";
$password="";
$dbid="visitor";
$link=mysql_connect($hostname,$username,$password);
$count=0;
$p=0;
mysql_select_db($dbid) or die("unable to connect");

$name=$_SESSION['UNAME'];

$data = mysql_query("select * from popup_at_emp where cont_person='$name'");

while ($row = mysql_fetch_assoc($data))
{

$name1 = $row['name'];
$no = $row['mob_no'];
$st=$row['status'];
$count++;
$p++;
}
if($p>0)
{
echo "<script type='text/javascript'>alert('$count person is waiting for you ....visit dashbord' );</script>";
echo "<script> 
</script>";
}
$sql2="DELETE FROM popup_at_emp where cont_person='$name' ";

$retval1 = mysql_query( $sql2);
if(! $retval1 )
{
  die('Could not enter data: ' . mysql_error());
}
header("Refresh:600");
?>

</body>
<?php } ?>
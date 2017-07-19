<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<title></title>
</head>

<?php
session_start(); 
include('../../db_con.php');
$id = $_REQUEST['id'];
$q = "select * from visiting_details where Barcode='".$id."'";
$result = mysql_query($q);

while($row=mysql_fetch_array($result))
{

?>

<body bgcolor="#FFFFFF">
<form name="frm" method="POST" action="update.php">
<div id="container">
    <!--top section start-->
	<div id="header">
		<div id="left">
			<div id="logo">
				<div class="name"><b><font color="#3F5E35">Visitor Management System</font></b></div>
				<div class="tag"><b>Median IT Solutions pvt.ltd</b> </div>
			</div>	
		</div>
		<div id="right"><img src="../../visitorimage/log2.jpg" style="height:100px; width:100%;"/></img>
		</div>
	</div>
	<div  class="heading">
			<div class="toplinks1" style="width:100%; height:30px; "><a href="#" ><b><center>--Edit Status Manually--</center></a></b></div>			
	</div>
	
	<center>
	
	<table width="90%" height="100%" class="toplinks">
	<tr valign="top">
	<td width="10%" valign="top"><a href="../../index.php" style="float:left" title="Home" ><h3>Home</font></h3></a></td>
	<td width="90%" align="right"><a href="../../logout.php" title="logout" target="_top" ><h3><?php echo $_SESSION['UNAME'];?>&nbsp;&nbsp;Logout</font></h3></a></td>
	</tr>
	</table>

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
					<option value="DONT_ALLOW">DO NOT ALLOW</option>
					</select><INPUT type="hidden" name="barcode" value="<?php echo $row['Barcode']?>" /></td>
</tr>

<tr><td colspan=2><center><INPUT type="submit" value="Update"/>
<INPUT type="button" value="Back"
onClick="history.go(-1);return true;"/></center></td></tr>
</table>
<br><br><br><br><br><br><br><br>
		<?php include('../../fotter.php')?>

	
</div>
</body>
</html>

</form>


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

<?php } ?>

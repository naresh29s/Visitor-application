<?php 
session_start();?>

<?php 
$contno = $_REQUEST['no'];
$_SESSION['contno']=$contno; 

$mysql_db_hostname = "localhost";
$mysql_db_user = "root";
$mysql_db_password = "";
$mysql_db_database = "visitor";

$con = mysql_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password) or die("Could not connect database");
mysql_select_db('visitor', $con) or die("Could not select database");

$sql1="SELECT * from master_visitor where cont_no='".$contno."'";
$q1 = mysql_query($sql1);
$row1 = mysql_fetch_array($q1);
$vi = $row1['v_id'];

$sq22="SELECT * from advance_visitor where cont_no='".$contno."'";
$q22 = mysql_query($sq22);
$row22 = mysql_fetch_array($q22);
$vi1 = $row22['v_id'];
//$pass = $row['pswd'];
//$aa_id=$row['aa_id'];
if(is_numeric($contno))
{
if($vi>0)
	echo "<script type='text/javascript'>window.location.href='vmsedit.php'</script>";
	else if($vi1>0)
		echo "<script type='text/javascript'>window.location.href='vmsedit_advance.php'</script>";
		else
		echo "<script type='text/javascript'>window.location.href='vms_notexist.php'</script>";
}
else

echo "<script type='text/javascript'>alert('$contno is not a Number' );window.location.href='vms.php'</script>";

?>
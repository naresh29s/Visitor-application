<?php 
session_start();

$contno = $_REQUEST['no'];
$_SESSION['cont_contno']=$contno;
include('../db_con.php');
$sql1="SELECT * from conteractor_pass_information where cont_no='".$contno."'";
$q1 = mysql_query($sql1);
$row1 = mysql_fetch_array($q1);
$vi = $row1['cont_v_id'];
$end_date=$row1['end_date'];

$s="SELECT * from  advance_conteractor_pass where cont_no='".$contno."'";
$q = mysql_query($s);
$r = mysql_fetch_array($q);
$v1 = $r['cont_no'];

$todays_date=date('Y-m-d');
if($end_date>$todays_date)
{
echo "<script type='text/javascript'>alert('pass is issued and it is valid till $end_date');window.location.href='vms_cont.php'</script>";
}else
{
if(is_numeric($contno))
{
if($vi>0)
	echo "<script type='text/javascript'>window.location.href='../vms_cont_edit.php'</script>";
		else if($v1>0)
			echo "<script type='text/javascript'>window.location.href='../vms_cont_edit.php?type=cont'</script>";
			else
		echo "<script type='text/javascript'>window.location.href='../vms_cont_notexist.php'</script>";
}
else

echo "<script type='text/javascript'>alert('$contno is not a Number' );window.location.href='vms_cont.php'</script>";
}
?>
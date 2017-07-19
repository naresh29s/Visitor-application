<?php
session_start();

$rpt=$_SESSION['dept'];
$_SESSION['rpt']=$rpt;
$_SESSION['dept']=$rpt;
?>

<?php 

include('../../inc/dbConnect.inc.php');
$q = "select * from  visiting_details a, master_visitor b where a.cont_no = b.cont_no and deptname='".$_SESSION['rpt']."'and visiting_date='".date('Y-m-d')."' order by visiting_date";

$result = mysql_query($q);
$row_num = mysql_num_rows($result);
header("Content-type: application/xls");
header('Content-disposition: attachment; filename="department_wise_report.xls"');
echo "Pass_ID";echo "\t";
echo "Date";echo "\t";
echo "Time_in";echo "\t";
echo "Time_out";echo "\t";
echo "Name";echo "\t";
echo "Mobile_No";echo "\t";
echo "DeptName";echo "\t";
echo "Cont_Person";echo "\t";
echo "Company";echo "\t";
echo "Status";echo "\n";                     
 while($row1 = mysql_fetch_array($result)) {
 echo $row1['v_id']; echo "\t";
 echo $row1['visiting_date']; echo "\t";
 echo $row1['visiting_time']; echo "\t";
 echo $row1['out_time']; echo "\t";
 echo $row1['vname']; echo "\t";
 echo $row1['cont_no']; echo "\t";
 echo $row1['deptname']; echo "\t";
 echo $row1['cont_person']; echo "\t";
 echo $row1['vcompname']; echo "\t";
 echo $row1['status']; echo "\n";
 } 

?>
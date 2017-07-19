<?php
session_start();

$rpt=$_SESSION['d1'];
$rpt2=$_SESSION['d2'];
$_SESSION['rpt']=$rpt;
$_SESSION['d1']=$rpt;
$_SESSION['d2']=$rpt2;
?>
<?php 

include('../../inc/dbConnect.inc.php');
$q = "SELECT *
FROM visiting_details a, master_visitor b
WHERE a.cont_no = b.cont_no
AND visiting_date
BETWEEN '".$rpt."'
AND '".$rpt2."'
ORDER BY visiting_date
LIMIT 0 , 30";
$result = mysql_query($q);
$row_num = mysql_num_rows($result);
header("Content-type: application/xls");
header('Content-disposition: attachment; filename="date_wise_records.xls"');
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
<?php
session_start();

$rpt=$_SESSION['d1'];
$rpt2=$_SESSION['d2'];
$_SESSION['rpt']=$rpt;
$_SESSION['d1']=$rpt;
$_SESSION['d2']=$rpt2;
?>
<?php 

include('../../db_con.php');
$q = "SELECT * FROM conteractor_pass_information WHERE start_date BETWEEN '".$rpt."' AND '".$rpt2."' ORDER BY start_date LIMIT 0 , 30";
$result = mysql_query($q);
$row_num = mysql_num_rows($result);
header("Content-type: application/vnd.ms-excel");
header('Content-disposition: attachment; filename="date_wise_records.xls"');
echo "Pass_ID";echo "\t";
echo "Start_date";echo "\t";
echo "End_date";echo "\t";
echo "Name";echo "\t";
echo "Mobile_No";echo "\t";
echo "Site";echo "\t";
echo "DeptName";echo "\t";
echo "Designattion";echo "\t";
echo "Date of birth";echo "\t";
echo "Resi_address";echo "\t";
echo "Native_address";echo "\t";
echo "Tel_no";echo "\t";
echo "To meet";echo "\t";
echo "Purpose";echo "\t";
echo "Reason";echo "\t";
echo "Emergency name";echo "\t";
echo "Emergency no";echo "\t";
echo "Cmpny_name";echo "\t";
echo "Cmpny_address";echo "\t";
echo "Cmpny_contno";echo "\n";                     
 while($row1 = mysql_fetch_array($result)) {
 echo $row1['cont_v_id']; echo "\t";
 echo $row1['start_date']; echo "\t";
  echo $row1['end_date']; echo "\t";
 echo "".$row1['sname']." ".$row1['fname']." ".$row1['lname'].""; echo "\t";
 echo $row1['cont_no']; echo "\t";
 echo $row1['v_site']; echo "\t";
 echo $row1['dept']; echo "\t";
 echo $row1['designattion']; echo "\t";
  echo $row1['dob']; echo "\t";
   echo $row1['resi_add']; echo "\t";
    echo $row1['native_add']; echo "\t";
	echo $row1['tel_no']; echo "\t";
	echo $row1['tomeet']; echo "\t";
	echo $row1['v_reason']; echo "\t";
	echo $row1['v_for']; echo "\t";
	echo $row1['emr_cont_per']; echo "\t";
	echo $row1['emr_cont_no']; echo "\t";
 echo $row1['v_comp_name']; echo "\t";
  echo $row1['v_comp_add']; echo "\t";
 echo $row1['v_comp_cont']; echo "\n";
 } 

?>
<?php 

session_start(); 
include('../db_con.php');
$q = mysql_query('SELECT MAX(cont_v_id) as cont_v_id from `conteractor_pass_information`');
$row = mysql_fetch_assoc($q);
$v_id = $row['cont_v_id'] + 1;

	$cont_no=$_POST['contno'];
$q = mysql_query('select * from conteractor_pass_information where cont_no='.$cont_no.' ');
$r1 = mysql_fetch_assoc($q);
 $exist=$r1['cont_v_id'];

	$_SESSION['contno']=$_POST['contno'];
	//$vid=$_POST['vid'];
	$sname=$_POST['sname'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$dob=$_POST['dob'];
	$designattion=$_POST['designattion'];
	$resi_add=$_POST['resi_add'];
	$native_add=$_POST['native_add'];
	$tel_no=$_POST['tel_no'];
	
	$dept=$_POST['dept'];
	$tomeet=$_POST['emp'];
	$v_site=$_POST['v_site'];
	$emr_cont_per=$_POST['emr_cont_per'];
	$emr_cont_no=$_POST['emr_cont_no'];

	$v_comp_name=$_POST['compnm'];
	$v_comp_add=$_POST['compadd'];
    $v_comp_cont=$_POST['compcont'];

	$vreason=$_POST['reason'];
	$for=$_POST['v_reason'];
	$rfid=$_POST['rfid_no'];

	//$vfor=$_POST['for'];
	$_SESSION['cont_barcode']=$date=date('dmy'.$_POST['vid'].'Gis');//barcode
	$_SESSION['barcode']= $date;
	 $start_date=$_POST['date3'];
	 $end_date=$_POST['date4'];
	$time=date('H:i:s');
	
	$name=$_SESSION['UNAME'];
	$sql = "SELECT * FROM img WHERE name like '$name%'";
	$result = mysql_query("$sql");
	$row = mysql_fetch_assoc($result);
	$img=$row['image'];
	
	if($exist>0)           //for cheking no is exist in db or not
	{ 
	$Querry="UPDATE conteractor_pass_information SET `cont_v_id` = '$v_id' , `sname` = '$sname' , `fname` = '$fname' , `lname` = '$lname' , `cont_no` = '$cont_no' , `dob` = '$dob' , `designattion` = '$designattion' , `resi_add` = '$resi_add' , `native_add` = '$native_add' , `tel_no` = '$tel_no' , `dept` = '$dept' , `tomeet` = '$tomeet' , `v_site` = '$v_site' , `emr_cont_per` = '$emr_cont_per' , `emr_cont_no` = '$emr_cont_no' , `v_comp_name` = '$v_comp_name' , `v_comp_add` = '$v_comp_add' , `v_comp_cont` = '$v_comp_cont' , `v_reason` = '$vreason' , `v_for` = '$for' , `start_date` = '$start_date' , `end_date` = '$end_date' ,`image`='$img', `barcode` = '$date', rfid_no='$rfid' WHERE `cont_no` = '$cont_no' ";
	$row=mysql_query($Querry);	

	}else
	{
$Querry= "INSERT INTO `conteractor_pass_information` (`cont_v_id`, `sname`, `fname`, `lname`, `cont_no`, `dob`, `designattion`, `resi_add`, `native_add`, `tel_no`, `dept`, `tomeet`, `v_site`, `emr_cont_per`, `emr_cont_no`, `v_comp_name`, `v_comp_add`, `v_comp_cont`, `v_reason`, `v_for`, `start_date`, `end_date`, `barcode`,`rfid_no`,`image`) VALUES ('$v_id', '$sname', '$fname', '$lname', '$cont_no', '$dob', '$designattion', '$resi_add', '$native_add', '$tel_no', '$dept', '$tomeet', '$v_site', '$emr_cont_per', '$emr_cont_no', '$v_comp_name', '$v_comp_add', '$v_comp_cont', '$vreason', '$for', '$start_date', '$end_date', '$date','$rfid','$img')";
$row=mysql_query($Querry);	
}

//delete from advance vositing pass...................
$sq3 = "delete from advance_conteractor_pass where cont_no='$cont_no'";
	$result = mysql_query("$sq3");
	
echo "<script> alert('1 record Added');
window.location.href='printeg_add.php';
</script>";
?>
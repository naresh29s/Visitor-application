<?php 
session_start(); 
$_SESSION['code']="";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Report</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script language="javascript" src="calendar/calendar.js"></script>

<!--refresh-->
<script language="javascript" src="../js/jquery-1.2.6.min.js"></script>
<script language="javascript" src="../js/jquery.timers-1.0.0.js"></script>

<script type="text/javascript">

$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".refresh").everyTime(200,function(i){
			j.ajax({
			  url: "../refresh.php",
			  cache: false,
			  success: function(html){
				j(".refresh").html(html);
			  }
			})
		})
	});
   j('.refresh').css({color:"green"});
});
</script>

</head>

<body bgcolor="#FFFFFF">
<div id="container">
	<div id="header">
		<div id="left">
			<div id="logo">
				<div class="name"><b><font color="#3F5E35">Visitor Management System</font></b></div>
				<div class="tag"><b>Median IT Solutions pvt.ltd</b> </div>
			</div>	
		</div>
		<div id="right"><img src="../visitorimage/log2.jpg" style="height:100px; width:100%;"/></img>
		</div>
	</div>
	<div  style="border:px solid;"class="heading">
			<div class="toplinks1" style="width:100%; height:30px; "><a href="#" ><center>--Validate User Pass--</center></a></div>			
	</div>

<table width="100%" height="100%" border="0px" class="toplinks">
	<tr valign="top">
	<td width="10%" valign="top"><a href="../index.php" style="float:left" title="Home" ><h3>Home</font></h3></a></td>
	<td width="10%" valign="top"><a href="validate_visitor.php" style="float:left" title="validat user pass" ><h3>Validate_Pass</font></h3></a></td>
	
	<td width="80%" align="right"><a href="../logout.php" title="logout" target="_top" ><h3><?php echo $_SESSION['UNAME'];?>&nbsp;&nbsp;Logout</font></h3></a></td>
	</tr>
	</table>

<form method="POST" enctype="multipart/form-data" action="validate_visitor.php"> 
<center>
<div style="width:80%;" align="left">
<fieldset>
<legend><h3>Validate Pass</h3></legend>
<table>
<tr><td><b><font color="#009900">CODE:</font></b></td>
<td><input name="code" type="text" id="code" onChange="submitForm()" size="20" autofocus="autofocus" /></td>
<td><input type="submit" name="vupdate" value="Enter" ></td>
<td><input type="submit" name="clear" value="Clear"/></td></tr>
</table>


</fieldset>
<?php
if (isset($_POST['code']))
{ 

  include('../inc/dbConnect.inc.php');
  $code=$_POST['code'];
  $status="";
  $q2="select * from visiting_details where `Barcode`='".$_POST['code']."'";
  $rs2= mysql_query($q2);
  $row2=mysql_fetch_array($rs2);
  $q="select * from visiting_details where `Barcode`='".$_POST['code']."' and `visiting_date`='".date('Ymd')."'";
  $rs= mysql_query($q);
  $row=mysql_fetch_array($rs);
  $rownum=mysql_num_rows($rs);
  $time=date('H:i:s');
  
if($row2['v_id']>0)
{	
//this is for normal pass 
  if ($row['status']=='WAITING')
  {
  echo "<b><font color='#009900'>Code :</font></b> ".$row['Barcode'];
  echo "<br/><b><font color='#009900'>Pass_id :</font></b> ".$row['v_id'];
  echo "<br/><b><font color='#009900'>Name :</font></b> ".$row['vname'];
  echo "<br/><b><font color='#009900'>Mobile_no :</font></b> ".$row['cont_no'];
  echo "<br/><b><font color='#009900'>Dept :</font></b> ".$row['deptname'];
  echo "<br/><b><font color='#009900'>From :</font></b> ".$row['vcompname'];
  echo "<br/><b><font color='#009900'>Status :</font></b> ".$row['status'];
  echo "&nbsp;&nbsp;&nbsp;<b><font color='#009900'>Status_change </font>:</b> IN";
  echo "</label>";
  $status='IN';
  $q1="update visiting_details set `status`='IN' where `Barcode`='".$_POST['code']."' and `status`='WAITING' and `visiting_date`='".date('Ymd')."'";
  $rs1=mysql_query($q1);
  }
 
  	if ($row['status']=='IN')
  	{
	  echo "<label><b><font color='#009900'>Code :</font></b> ".$row['Barcode'];
 	  echo "<br/><b><font color='#009900'>Pass_id :</font></b> ".$row['v_id'];
  	  echo "<br/><b><font color='#009900'>Name :</font></b> ".$row['vname'];
	  echo "<br/><b><font color='#009900'>Mobile_no :</font></b> ".$row['cont_no'];
	  echo "<br/><b><font color='#009900'>Dept :</font></b> ".$row['deptname'];
	  echo "<br/><b><font color='#009900'>From :</font></b> ".$row['vcompname'];
	  echo "<br/><b><font color='#009900'>Status :</font></b> ".$row['status'];
	  echo "&nbsp;&nbsp;&nbsp;<b><font color='#009900'>Status_change :</font></b> OUT";
 	  echo "</label>";
  	  $q1="update visiting_details set `status`='OUT',`out_time`='$time' where `Barcode`='".$_POST['code']."' and `status`='IN' and `visiting_date`='".date('Ymd')."'";
	  $rs1=mysql_query($q1);
	 }
 
  	if ($row['status']=='OUT'|| $row['status']=='DONT_ALLOW' || $rownum<1)
 	 {
 	 echo "<script> alert('Invalid Pass') </script>";
       
 	 }
 }
 else// this iss for advance appointment
 {
 
  $q1="select * from advance_visitor where `barcode`='".$_POST['code']."'";
  $rs1= mysql_query($q1);
  $row1=mysql_fetch_array($rs1);
//  $rownum1=mysql_num_rows($rs1);

	$q3 = mysql_query('SELECT MAX(v_id) as v_id from `master_visitor`');
	$row = mysql_fetch_assoc($q3);
	$v_id= $row['v_id'] + 1;

	$vid=$v_id;
	$sname=$row1['sname'];
	$fname=$row1['fname'];
	$lname=$row1['lname'];
	$contno=$row1['cont_no'];
	$dept=$row1['deptname'];
	$tomeet=$row1['cont_person'];
	$vcompnm=$row1['vcompname'];
	$vcompadd=$row1['vcomadd'];
    $vcompcont=$row1['cont_no_person'];
	$vreason=$row1['reason'];
	//$vfor=$_POST['for'];
	$date=$row1['barcode'];
	$d1=$row1['frmdate'];
	$d2=$row1['frmdate'];
	$time=date('H:i:s');

 	  echo "<label><b><font color='#009900'>Code :</font></b> ".$row1['barcode'];
 	  echo "<br/><b><font color='#009900'>Pass_id :</font></b> ".$v_id;
	  $vname1=" ".$row1['sname']." " .$row1['fname']." ".$row1['lname']." ";
  	  echo "<br/><b><font color='#009900'>Name :</font></b> ".$vname1;
	  echo "<br/><b><font color='#009900'>Mobile_no :</font></b> ".$row1['cont_no'];
	  echo "<br/><b><font color='#009900'>Dept :</font></b> ".$row1['deptname'];
	  echo "<br/><b><font color='#009900'>From :</font></b> ".$row1['vcompname'];
	  $date_time1="".$row1['frmdate']."->".$row1['time']."";
	  echo "<br/><b><font color='#009900'>Time_of_appointment :</font></b> ".$date_time1;
	  echo "<br/><b><font color='#009900'>To_meet:</font></b> ".$row1['cont_person'];
	  echo "<br/><b><font color='#009900'>Reason:</font></b> ".$row1['reason'];
	  
	 
	  
	  if ($conn = mysqli_connect('127.0.0.1', 'root', '', 'visitor'))
		 {	
		 
		 $full=$sname." ".$fname." ".$lname;
		 $add_com=$vcompnm." , ".$vcompadd;
			
		  //$sql1 = "insert into visiting_details (v_id,vname,cont_no,deptname,cont_person,reason,vcompname,visiting_date,Barcode,status) values ('{$vid}','{$full}','{$contno}', '{$dept}', '{$tomeet}', '{$vreason}','{$add_com}', '{$d1}','".$date."','WAITING')";
		 
/*		 
		 
	$q19 = "select * from preference";
	$rs9 = mysql_query($q19);
	$row9=mysql_fetch_array($rs9);
	$a=$row9['need_user_approval'];
	echo $a;
			if($a=='YES')
			{
	$sql4 = "insert into visiting_details (`v_id`,`vname`,`cont_no`,`deptname`,`cont_person`,`reason`,`vcompname`,`visiting_date`,`visiting_time`,`Barcode`,`status`) values ('{$vid}','".$sname." ".$fname." ".$lname."','{$contno}', '{$dept}', '{$tomeet}', '{$vreason}','".$vcompnm.", ".$vcompadd."', '{$d1}','{$time}','".$date."','WAITING')";
		$row4=	mysqli_query($conn,$sql4);	
		$sql6 = "insert into popup_at_emp(`name`,`mob_no`,`status`,`cont_person`) 
		values ('".$sname." ".$fname." ".$lname."','{$contno}','WAITING','{$tomeet}')";
		$row6=	mysqli_query($conn,$sql6);
			}
			else
			{
*/
	$sql4 = "insert into visiting_details (`v_id`,`vname`,`cont_no`,`deptname`,`cont_person`,`reason`,`vcompname`,`visiting_date`,`visiting_time`,`Barcode`,`status`) values ('{$vid}','".$sname." ".$fname." ".$lname."','{$contno}', '{$dept}', '{$tomeet}', '{$vreason}','".$vcompnm.", ".$vcompadd."', '{$d1}','{$time}','".$date."','IN')";
		$row4=	mysqli_query($conn,$sql4);	
			//}

		 
		 
		 $q8 = "select * from master_visitor where cont_no='$contno'";
	$rs8 = mysql_query($q8);
	$row8=mysql_fetch_array($rs8);
	$a3=$row8['v_id'];
	
if($a3>0)
{
$sq22 = "update master_visitor set sname='$sname', fname='$fname', lname='$lname', cont_no='$contno', passid_issue_date='$d1' where cont_no='$contno'";
$row22=	mysql_query($sq22);
		if(! $row22 )
			{
  			die('Could not update data2222: ' . mysql_error());
			}
}
else
{
 $sq33 = "insert into master_visitor
 (v_id,sname,fname,lname,cont_no,passid_issue_date)values('{$vid}','{$sname}','{$fname}','{$lname}','{$contno}','{$d1}')";
			
		$row33=	mysql_query($sq33);
		if(! $row33 )
			{
  			die('Could not update data2222: ' . mysql_error());
			}
}			
	
			
			 $sql2= " insert into validitydate (`cont_no`,`frmdate`,`todate`,`deptname`,cont_person) values ('{$contno}','{$d1}','{$d2}','{$dept}','{$tomeet}')";
			$row2= mysqli_query($conn,$sql2);
		if(! $row2 )
			{
  			die('Could not update data21212121: ' . mysql_error());
			}
		     $sql3="INSERT INTO `visitor_company` (`vcompname`,`vcompadd`,`vcompcont`,`cont_no`,`reason`)VALUES ('{$vcompnm}','{$vcompadd}','{$vcompcont}','{$contno}','{$vreason}')";
			 $row3= mysqli_query($conn,$sql3);
			if(! $row3 )
			{
  			die('Could not update data3333: ' . mysql_error());
			}
			
		$sql2="DELETE FROM advance_visitor where cont_no='$contno' ";
			$retval1 = mysql_query( $sql2);
		if(! $retval1 )
			{
  			die('Could not enter data: ' . mysql_error());
			}
			
	
 }
		
 }  
}
?>
</div>
</center><br><br><br><br><br><br><br><br><br><br><br><br>
<center><div class="refresh"><?php require('..//refresh.php');?></div></center>

</form> 

<div class="tag" ></div>
		<center>
		<b>Median IT Solutions pvt.ltd</b><br><font size="-3px" color="#FB5031">Copyright © 2013 Median IT Solutions Pvt. Ltd. All 	rights reserved.<br>MIDC,Andheri(E),Mumbai.
		<br></center>


</div>

</body>
</html>

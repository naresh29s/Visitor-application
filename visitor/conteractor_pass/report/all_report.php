<?php
session_start();
   date_default_timezone_set('Asia/Kolkata');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<link rel="stylesheet" type="text/css" href="../../css/but.css" />

<title>Report</title>
<script type="text/javascript">
function back()
{
window.location="../vmsreport.php";
}
</script>
</head>

<body bgcolor="#FFFFFF">
<body>
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
			<div class="toplinks1" style="width:100%; height:30px; "><a href="#" ><b><center>--Total Pass created today--</center></a></b></div>			
	</div>
	
	<center>
	
	<table width="90%" height="100%" class="toplinks">
	<tr valign="top">
	<td width="10%" valign="top"><a href="../../index.php" style="float:left" title="Home" ><h3>Home</font></h3></a></td>
	<td width="90%" align="right"><a href="../../logout.php" title="logout" target="_top" ><h3><?php echo $_SESSION['UNAME'];?>&nbsp;&nbsp;Logout</font></h3></a></td>
	</tr>
	</table>

<?php
$statment=""; 
$cust_querry="";
if(isset($_POST['period']))
{   if($_POST['period']=='current_rec')
	{
	$period=$_POST['period'];
	$cust_querry="start_date='".date('Y-m-d')."'";
	$statment="".$statment."Todays Pass Where ";
	}
	else
	{
	$start_date=$_POST['date3'];
	$end_date=$_POST['date4'];
	$cust_querry="start_date>='$start_date' and start_date<=' $end_date'";
	$statment="".$statment."Pass in between Date ".$start_date." to ".$end_date." Where "; 
	}
}
$date=date('Y-m-d');
if(isset($_POST['status']))
{
 if($_POST['status']=='all')
	$all_satus=$_POST['status'];
	else if($_POST['status']=='valid')
	{
		$valid_satus=$_POST['status'];
		$cust_querry="start_date<='$date' and end_date>='$date'";
		$statment="".$statment."Satus is Valid pass ";
		}
		else
		{
			$exp_ststus=$_POST['status'];
			if($_POST['period']=='current_rec')
			$cust_querry="end_date='$date'";
			else
			$cust_querry="end_date>='$start_date' and end_date<='$end_date'";
			$statment="".$statment."Satus is Expired pass ";

		}
}

if(isset($_POST['company']))
{
 if($_POST['company']=='all')
	$all_cmpny=$_POST['company'];
	else
	{
	$name_of_cmpny=$_POST['cmpny_name'];
	$cust_querry="".$cust_querry."and v_comp_name LIKE '%$name_of_cmpny%'";
	$statment="".$statment."And company name is ".$name_of_cmpny." ";

	}
}

if(isset($_POST['sort']))
{
 if($_POST['sort']=='pass_id')
	{
	$id_sort=$_POST['sort'];
	$cust_querry="".$cust_querry."order by cont_v_id";
		$statment="".$statment."And Sort by pass ID ";
	}
	else
	{
	$dept_name=$_POST['dept'];
	$cust_querry="".$cust_querry."and dept='$dept_name'";
	$statment="".$statment."And Sort by Department name ".$dept_name." ";
	}
}
?><br>
<b><?php echo $statment;?></b>
<fieldset style="width:90%">
<legend><h3>Todays Pass</h3></legend>
<div style= "overflow-y:auto; width:100%;height:300px; background:#FFFFFF">
<table width="98%" bgcolor="white"> 
<tr>
<th width="44" >Pass_ID</th>
<th width="57">Start_date</th>
<th width="51">End_date</th>
<th width="62">Name</th>
<th width="63" >Mobile_No</th>
<th width="40">site</th>
<th width="75">DeptName</th>
<th width="76">Designattion</th>
<th width="110">RFID No</th>
<th width="92">cmpny_name</th>
<th width="75">cmpny_no</th>
<th width="85">image </th>
</tr>                                              
                                            

<?php 


include('../../db_con.php');
//$q = "select * from visiting_details where visiting_date between '".$rpt."' and '".$rpt2."' order by visiting_date";
 //$dep=$_SESSION['dept'];
 
$q = "SELECT * FROM conteractor_pass_information WHERE $cust_querry ";
$c=$_SESSION['UNAME'];
$_SESSION[$c]=$q;
$result = mysql_query($q);
$row_num = mysql_num_rows($result);
 while($row1 = mysql_fetch_array($result)) {
  echo "<tr><td width='50' align='center'>".$row1['cont_v_id']."</td>";
 echo "<td width='200' align='center'>".$row1['start_date']."</td>";
 echo "<td width='200' align='center'>".$row1['end_date']."</td>";
  echo "<td width='200' align='center'>".$row1['sname']." ".$row1['fname']." ".$row1['lname']."</td>";
 echo "<td width='200' align='center'>".$row1['cont_no']."</td>";
 echo "<td width='100' align='center'>".$row1['v_site']."</td>";
 echo "<td width='100' align='center'>".$row1['dept']."</td>";
 echo "<td width='200' align='center'>".$row1['designattion']."</td>";
 echo "<td width='200' align='center'>".$row1['rfid_no']."</td>";
 echo "<td width='200' align='center'>".$row1['v_comp_name']."</td>";
 echo "<td width='200' align='center'>".$row1['v_comp_cont']."</td>";
 
 $contno=$row1['cont_no'];
 echo "<td width='200' align='center'>" ?>  
  <img width="100"  height="70" src="getImage.php?contno='<?php echo $contno; ?>'"/> 
  <?php "</td>";
 } 
?>    
</table></div>

</fieldset> 

<b><font size="2" color="#333333" style="float:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Record: <?php  echo $row_num;?></font></b>
<a href="all_pass.php" title="Report" style="float:right" class="toplinks"><b><font size="2" color="#333333"><img height="20" width="20" src="../../image/xl.png"/>Get Record</font></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><br>
<input type="button" class="myButton" value="Back" onclick="back()" />
<br><br><br><br><br><br><br><br>
		<?php include('../../fotter.php');?>	

	</div>
</div>
</body>
</html>

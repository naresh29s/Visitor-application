<?php 
session_start(); 
?>
<?php
require_once('../calendar/classes/tc_calendar.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dashboard</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/buttone.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script language="javascript" src="calendar/calendar.js"></script>


<script language="javascript" src="../calendar/calendar.js"></script>
<link href="../calendar/calendar.css" rel="stylesheet" type="text/css" />

<!--refresh-->
<script language="javascript" src="../js/jquery-1.2.6.min.js"></script>
<script language="javascript" src="../js/jquery.timers-1.0.0.js"></script>
<script type="text/javascript">

$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".refresh").everyTime(1000,function(i){
			j.ajax({
			  url: "visitorsummary.php",
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

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>

<!--
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".refreshdashboard").everyTime(60000,function(i){
			j.ajax({
			  url: "refreshdashboard.php",
			  cache: false,
			  success: function(html){
				j(".refreshdashboard").html(html);
			  }
			})
		})
	});
   j('.refreshdashboard');
});
</script>-->
</head>
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
		<div id="right"><img src="../visitorimage/log2.jpg" style="height:100px; width:100%;"/></img>
		</div>
	</div>
	<div  class="heading">
			<div class="toplinks1" style="width:100%; height:30px; "><a href="#" ><b><center>--Visitor Status & Report--</center></a></b></div>			
	</div>
	
	<center>
	
	<table width="90%" height="100%" border="0px" class="toplinks">
	<tr valign="top">
	<td width="10%" valign="top"><a href="../index.php" style="float:left" title="Home" ><h3>Home</font></h3></a></td>
	<td width="90%" align="right"><a href="../logout.php" title="logout" target="_top" ><h3><?php echo $_SESSION['UNAME'];?>&nbsp;&nbsp;Logout</font></h3></a></td>
	</tr>
	</table>

<div align="center" >
<br><br>
<table width="700px" border="1" bordercolorlight="#990000">  
<tr><td width="300px" height="278" valign="top">
<table width="690" height="271" border="0" style="vertical-align:top;">
<form method="POST" enctype="multipart/form-data"> 
<tr><td width="132" height="49">
<input name="report" type="radio" value="datewise" <?php if (isset($_SESSION['rpt']) and isset($_SESSION['date']) and $_SESSION['rpt']==$_SESSION['date']) {echo "checked='checked'";}?>/>
<b> Datewise:</b></td>
  <td width="109">
  <div > From: </div>
<div style="float: left; padding-right: 3px; line-height: 18px;">
 <?php
					$date2="";$date1="";
					  $myCalendar = new tc_calendar("date3", true, false);
					  $myCalendar->setIcon("../calendar/images/iconCalendar.gif");
					  $myCalendar->setDate(date('d'), date('m'), date('Y'));
					  $myCalendar->setPath("../calendar/");
					  $myCalendar->setYearInterval(1970, 2020);
					  //$myCalendar->dateAllow('2009-02-20', "", false);
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->setDatePair('date3', 'date4', $date2);
					  //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
					  $myCalendar->writeScript();
					 
					  ?></div>
	 
  <td>
  <div style="float: left; padding-left: 3px; padding-right: 3px; line-height: 18px;"> To: </div>
  <div><?php
					  $myCalendar = new tc_calendar("date4", true, false);
					  $myCalendar->setIcon("../calendar/images/iconCalendar.gif");
					  $myCalendar->setDate(date('d'), date('m'), date('Y'));
					  $myCalendar->setPath("../calendar/");
					  $myCalendar->setYearInterval(1970, 2020);
					  //$myCalendar->dateAllow("", '2009-11-03', false);
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->setDatePair('date3', 'date4', $date1);
					  //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
					  $myCalendar->writeScript();
					  ?>
   </div>
</td>
<td width="143" rowspan="6">
           <div class="refresh" style=" float:right; border:1px solid #BBBBBB;"><?php require ('visitorsummary.php')?>;</div>
           </td>
  </tr>
	  <tr>
	  <td height="43"><input name="report" type="radio" value="dept" <?php if (isset($_SESSION['rpt']) and isset($_SESSION['dept']) and $_SESSION['rpt']==$_SESSION['dept']) {echo "checked='checked'";}?>/><b> Departmentwise:</b></td>		  
	  <td><select name="dept" style="width:180px">
	      <option>--Select--</option> 
	     <?php include('../db_con.php');
            $q= "select deptname from dept";
			$rs=mysql_query($q);  
		    while($row=mysql_fetch_array($rs))
			{
			echo "<option name='".$row['deptname']."'>".$row['deptname']."</option>";
			}
			 ?>
		   </select></td>
          	   
		</tr>
	  <tr><td height="43" colspan="2"><input name="report" type="radio" value="all" <?php if (isset($_SESSION['rpt']) and isset($_SESSION['all']) and $_SESSION['rpt']==$_SESSION['all']) {echo "checked";}?>/><b>Current Record</b></td>		  
</tr>
<tr><td height="44" colspan="2"><input name="report" type="radio" value="mobile" <?php if (isset($_SESSION['rpt']) and isset($_SESSION['all']) and $_SESSION['rpt']==$_SESSION['all']) {echo "checked";}?>/><b>Search by mobile number</b></td>		  
</tr>
<tr><td height="39" colspan="2"><input name="report" type="radio" value="name" <?php if (isset($_SESSION['rpt']) and isset($_SESSION['all']) and $_SESSION['rpt']==$_SESSION['all']) {echo "checked";}?>/><b>Search by Name</b></td>		  
</tr>


<tr ><td height="39" colspan="3">
<center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" style="float:none" class="myButton" name="search" value="Search" /></center>
</td>
</tr>
</form>
</table>
</td></tr>
</table>
</font>
</center>
<?php 
   if(isset($_POST['report']) and $_POST['report']=='all') {
         $_SESSION['all']=$_POST['report'];
		 header('location:report/allrpt.php');}
	else if(isset($_POST['report']) and $_POST['report']=='dept') {
     $_SESSION['dept']=$_POST['dept'];
	  header('location:report/deptwiserpt.php');
	   }
	else if(isset($_POST['report']) and $_POST['report']=='datewise') {
     $_SESSION['d1']=$_POST['date3'];
	 $_SESSION['d2']=$_POST['date4'];
    header('location:report/datewiserpt.php');}
	else if(isset($_POST['report']) and $_POST['report']=='mobile') {
     //$_SESSION['d1']=$_POST['date3'];
	 //$_SESSION['d2']=$_POST['date4'];
    header('location:http:report/admin_serch.php');}
	else if(isset($_POST['report']) and $_POST['report']=='name') {
     //$_SESSION['d1']=$_POST['date3'];
	 //$_SESSION['d2']=$_POST['date4'];
    header('location:http:report/admin_serch_name.php');}
	else {
	        if(!isset($_SESSION['rpt'])){ 
	 echo "<script> alert('Please select Option ')</script>";
	 }
	//header('location:vmsreport.php');
	}
	
 ?>
<br><br><br><br>
<?php include('../fotter.php')?>
  </div>
</div>
</body>
</html>

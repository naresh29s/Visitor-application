<?php 
session_start(); 
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
<script LANGUAGE="JavaScript">
function ValidateForm(form){
ErrorText= "";
if ( ( form.period[0].checked == false ) && ( form.period[1].checked == false ) )
{
alert ( "Please choose your Date: current or periodic date" );
return false;
}
if (ErrorText= "") { form.submit() }
}
</script>
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
	<td width="10%" valign="top"><a href="../index.php" style="float:left" title="Home" ><h3>Home</h3></a></td>
	<td width="10%" valign="top"><a href="import_data.php" style="float:left" title="Excel data import" ><h3>Import Data</h3></a></td>
	<td width="80%"><a href="../logout.php" style="float:right" title="logout" target="_top" ><h3><?php echo $_SESSION['UNAME'];?>&nbsp;&nbsp;Logout</font></h3></a></td>
	</tr>
	</table>

<div align="center" >
<br><br>
<form action="report/all_report.php" method="post" name="feednack" onSubmit="return ValidateForm(this)">

<div style="border:solid 1px #999999; width:620px;">
<b><font face="Blackadder ITC" color="#666666" size="6">Generate report</font></b>
<table width="585" border="0" bordercolorlight="#990000">  
<tr>
	<td>
	<fieldset style="border: dashed 1px #999999;">
	<legend><b>Pass created on</b></legend>
	<table width="571" height="44">
	  <tr>
	<td width="27%"><input type="radio" name="period" value="current_rec"/>Current Record</td>
	<td width="23%"><input type="radio" name="period" value="date_wise"/>Date Wise:</td>
	<td width="6%">From:</td>
	<td width="18%"><?php
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
					 ?></td>
	<td width="4%">To:</td>
	<td width="22%"><?php
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
					  ?></td>
	</tr></table>
	</fieldset>
	</td>
</tr>
<tr>
	<td>
	<fieldset  style="border: dashed 1px #999999;">
	<legend><b>Sort By</b></legend>
	<table width="573" height="43">
	  <tr>
	<td width="27%"><input type="radio" name="sort" value="pass_id"/>Pass Id</td>
	<td width="24%"><input type="radio" name="sort" value="dept_name"/>Department Name:</td>
	<td width="49%"><select name="dept" style="width:145px">
        <option>--Select--</option>
        <?php include('../db_con.php');
            $q= "select DISTINCT dept from conteractor_pass_information";
			$rs=mysql_query($q);  
		    while($row=mysql_fetch_array($rs))
			{
			echo "<option name='".$row['dept']."'>".$row['dept']."</option>";
			}
			 ?>
      </select></td>	
	</tr></table>
	</fieldset>
	</td>
</tr>
<tr>
	<td>
	<fieldset  style="border: dashed 1px #999999;">
	<legend><b>Select Company</b></legend>
	<table width="573" height="43">
	  <tr>
	<td width="27%"><input type="radio" name="company" value="all"/>All Company</td>
	<td width="29%"><input type="radio" name="company" value="one_name"/>Enter Name of Company:</td>
	<td width="44%"><input type="text" name="cmpny_name"></td>	
	</tr></table>
	</fieldset>
	</td>
</tr>
<tr>
	<td>
	<fieldset  style="border: dashed 1px #999999;">
	<legend><b>Pass Status</b></legend>
	<table width="573" height="43">
	  <tr>
	<td width="27%"><input type="radio" name="status" value="all"/>All </td>
	<td width="29%"><input type="radio" name="status" value="valid"/>Valid pass for today</td>
	<td width="44%"><input type="radio" name="status" value="expired"/>Expired Pass</td>	
	</tr></table>
	</fieldset>
	</td>
</tr>
<tr><td align="center">
<input type="submit" style="float:none" class="myButton" name="search" value="Search" />
</td></tr>
</table>
</div>
</form>
<br><br><br><br>
		<?php include('../fotter.php');?>	

  </div>
</div>
</body>
</html>

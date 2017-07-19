<?php
  session_start();
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
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
		<div id="right"><img src="visitorimage/log2.jpg" style="height:100px; width:100%;"/></img>
		</div>
	</div>
	<div  class="heading">
			<div class="toplinks1" style="width:100%; height:30px; "><a href="#" ><b><center>--Welcome <?php echo $_SESSION['UNAME'];?>--</center></a></b></div>			
	</div>
	
	<center>
	
	<div style="width:90%; border:0px solid;">
	<table width="100%" height="100%" border="0px" class="toplinks">
	<tr valign="top">
	<td width="10%"><a href="#" style="float:left"  title="privileges"><h3> Privileges </h3></a></a></td><!--privileges.php -->
	<td width="15%"><a href="conteractor_pass/vmsreport.php" style="float:left"  title="conteractor report"><h3>Conteractor Report</h3></a></a></td>
	<td width="51%"><a href="#" style="float:right" title="add_emp"><h3>Add_Employee</font></h3></a></td><!--padd_emp.php -->
	<td width="12%"><a href="#" style="float:right" title="Dashboard"><h3>Dashboard</font></h3></a></td><!--_App/vmsreport.php -->
	<td width="12%"><a href="logout.php" style="float:right" title="logout" target="_top" ><h3><?php echo $_SESSION['UNAME'];?>&nbsp;&nbsp;Logout</font></h3></a></td>
	</tr>
	</table>
	<br><br><br><br>
<table width="100%" height="100%" border="0px">
	<tr>
	<td><img align="center" src="visitorimage/admin.jpg" /></td>
	<td valign="top"> <font size="3px" ><center><b>About Software</b></center></font>
	<br><font size="2" color="#333333" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Median IT Solutions</b> provides a secure, web based visitor management system for a variety of industries and companies of any size looking for easier visitor control, increased visitor security.visitor software increases lobby management and visitor control.  We strive to assist you in simplifying your visitor management techniques and processes.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Our visitor management software is easy to deploy and requires no hardware or software installations.</b></font> </td>
	<td><img align="center" src="visitorimage/images 1.jpg" /></img></td>
	</tr>
	</table>
	</div>
	</center>
  
  
    <!--fotter section start-->
   <br><br><br>
		<?php include('fotter.php');?>	

	</div>
</div>
</body>
</html>

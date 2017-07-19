<?php
session_start();
?>
<html>
<head>
<link href="style/style.css" rel="stylesheet" type="text/css"/>
<script language="javascript" src="calendar/calendar.js"></script>
</head>
<body>
<center>
<div id="border" >



<div id="header">		
		<div id="left">
			<div id="logo">
				<div class="name"><b>Sanodariyas diamonds</b></div>
				<div class="tag">A diamond is the beauty of life </div>
			</div>	
		</div>
		<div id="jewellery"><img src="images/2.jpeg" height="165px" width="409px" /></img></div>
	</div>

	<div id="mainarea">
		<div class="heading">
			<div class="toplinks" style="padding-left: 30px;"><a href="sell.php">Selling</a></div>
			<div class="sap2">::</div>	
			<div class="toplinks"><a href="Buy.php"  >Buying</a></div>
			<div class="sap2">::</div>
			<div class="toplinks"><a href="calculat.php"  >Calculat</a></div>
			<div class="sap2">::</div>
			<div class="toplinks"><a href="Report.php" >Selling_Report</a></div>
			<div class="sap2">::</div>
			<div class="toplinks"><a href="Report_buy.php"  >Buying_Report</a></div>
		</div>

	</div>


<br><br><br><br>




<font class="words_hadding">Search_Selling_Record</font>
<div id="middal1">
<br>
<a class="words" href="logout.php" style="float:right"><?php echo "".$_SESSION['username']."_logout";?></a>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form method="post" enctype="multipart/form-data">

<table class="words" width="464" height="153" border="0" align="center">  
<tr>
	<td width="179">
	<input name="report" type="radio" value="datewise" <?php if (isset($_SESSION['rpt']) and isset($_SESSION['date']) and $_SESSION['rpt']==$_SESSION['date']) {echo "checked='checked'";}?>/>Date_wise_recode:
	</td>
	<td width="36">From:</td>
 	<td width="96">
 	 <?php		
      require_once('classes/tc_calendar.php');		
      $date3_default = "";
      $date4_default = "";

	  $myCalendar = new tc_calendar("date3", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setDateFormat('d-m-Y');
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(1970, 2020);
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->setDatePair('date3', 'date4', $date4_default);
	  $myCalendar->writeScript();	
	 ?>	 </td>
	 <td width="18">to:</td>
	 <td width="113">    <?php
	  $myCalendar = new tc_calendar("date4", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setDateFormat('d-m-Y');	   
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(1970, 2020);
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->setDatePair('date3', 'date4', $date3_default);
	  $myCalendar->writeScript();
	  ?>  	</td>

  </tr>
		<tr><td height="44" colspan="5"><input name="report" type="radio" value="mobile" <?php if (isset($_SESSION['rpt']) and isset($_SESSION['all']) and $_SESSION['rpt']==$_SESSION['all']) {echo "checked";}?>/>
		<b>Search by mobile_number</b></td>		  
		</tr>
		<tr><td height="39" colspan="5"><input name="report" type="radio" value="name" <?php if (isset($_SESSION['rpt']) and isset($_SESSION['all']) and $_SESSION['rpt']==$_SESSION['all']) {echo "checked";}?>/>
		<b>Search by Name</b></td>		  
		</tr>


	<tr >
	<td height="39" colspan="5" align="center">
	<input type="submit" style="float:none" class="myButton" name="search" value="Search" /></td>
	</tr>
</table>
<?php 
   if(isset($_POST['report']) and $_POST['report']=='all') {
         $_SESSION['all']=$_POST['report'];
		 header('location:report/allrpt.php');}
	else if(isset($_POST['report']) and $_POST['report']=='dept') {
     $_SESSION['dept']=$_POST['dept'];
	  header('location:deptwise.php');
	   }
	else if(isset($_POST['report']) and $_POST['report']=='datewise') {
     $_SESSION['d1']=$_POST['date3'];
	 $_SESSION['d2']=$_POST['date4'];
    header('location:datewise.php');}
	else if(isset($_POST['report']) and $_POST['report']=='mobile') {
     //$_SESSION['d1']=$_POST['date3'];
	 //$_SESSION['d2']=$_POST['date4'];
    header('location:http:ser_mobile.php');}
	else if(isset($_POST['report']) and $_POST['report']=='name') {
     //$_SESSION['d1']=$_POST['date3'];
	 //$_SESSION['d2']=$_POST['date4'];
    header('location:http:ser_name.php');}
	else {
	        if(!isset($_SESSION['rpt'])){ 
	 echo "<script> alert('Please select Option ')</script>";
	 }
	//header('location:vmsreport.php');
	}
	
 ?>

</form>	 	 
</div>
</div>
</center>
</body>
</html>
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
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>

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
   j('.refresh').css({color:"Green"});
});
</script>

</head>

<?php 
session_start(); 
$value = $_SESSION['UNAME'];
setcookie("name", $value);
?>

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
	<div class="heading">
			<div class="toplinks1" style="width:100%; height:30px; "><a href="#" ><center>--Visitor Status--</center></a></div>			
	</div>
	<center>
	<table width="90%" height="100%" border="0px" class="toplinks">
	<tr valign="top">
	<td width="76%" align="left"><a href="../employee.php">&nbsp;&nbsp;&nbsp;Home</a></td>
	<td width="14%" align="right"><a href="../logout.php"><?php echo $_SESSION['UNAME'];?>_Logout</a></td>
	</tr>
	</table>
	</center>
	

<div align="center" >
<br><br><br><br>
<table width="650px" border="1">  
<tr><td valign="top" width="300px">
<table style="vertical-align:top;" border="0">
<form method="POST" enctype="multipart/form-data"> 
<tr><td width="130px">
<input name="report" type="radio" value="datewise" <?php if (isset($_SESSION['rpt']) and isset($_SESSION['date']) and $_SESSION['rpt']==$_SESSION['date']) {echo "checked='checked'";}?>/>
<b> Datewise:</b></td>
  <td width="120px">
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
<td width="250" rowspan="4">
           <div class="refresh" style="float:right;border:1px solid;"><?php require ('visitorsummary.php')?></div>
           </td>
  </tr>
	  <!--tr>
	  <td><input name="report" type="radio" value="dept" </form>/?php if (isset($_SESSION['rpt']) and isset($_SESSION['dept']) and $_SESSION['rpt']==$_SESSION['dept']) {echo "checked='checked'";}?>/><b> Departmentwise:</b></td>		  
	  <td><select name="dept">
	      <option>--Select--</option> 
	     <//?php include('../inc/dbConnect.inc.php');
            $q= "select deptname from dept";
			$rs=mysql_query($q);  
		    while($row=mysql_fetch_array($rs))
			{
			echo "<option name='".$row['deptname']."'>".$row['deptname']."</option>";
			}
			 ?>
		   </select></td>
          	   
		</tr-->
	  <tr><td colspan="2"><input name="report" type="radio" value="all" <?php if (isset($_SESSION['rpt']) and isset($_SESSION['all']) and $_SESSION['rpt']==$_SESSION['all']) {echo "checked";}?>/><b>Current Record</b></td>		  
</tr>
<tr><td>
<input type="submit" class="myButton" name="search" value="Search" />
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
	else {
	        if(!isset($_SESSION['rpt'])){ 
	 //echo "<script> alert('Please select Option ')</script>";
	 }
	//header('location:vmsreport.php');
	}
	
 ?>
 
 
<?php
//code for popup...............................................................

$count=0;
$p=0;
mysql_select_db($dbid) or die("unable to connect");

$name=$_SESSION['UNAME'];

$data = mysql_query("select * from popup_at_emp where cont_person='$name'");

while ($row = mysql_fetch_assoc($data))
{

$name1 = $row['name'];
$no = $row['mob_no'];
$st=$row['status'];
$count++;
$p++;
}
if($p>0)
{
echo "<script type='text/javascript'>alert('$count person is waiting for you ....visit dashbord' );</script>";
echo "<script> 
</script>";
}
$sql2="DELETE FROM popup_at_emp where cont_person='$name' ";

$retval1 = mysql_query( $sql2);
if(! $retval1 )
{
  die('Could not enter data: ' . mysql_error());
}

header("Refresh:1200");
?>

<br><br><br><br><br><br><br>
		<?php include('../fotter.php')?>

	</div>
</div>
</body>
</html>

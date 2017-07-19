<?php session_start(); 
include('../db_con.php');
require_once('../calendar/classes/tc_calendar.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ID_Card_Print</title>

<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/buttone.css" />
<script language="javascript" src="../calendar/calendar.js"></script>
<link href="../calendar/calendar.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<link rel="stylesheet" href="../js/jquery-ui.css" />
<script src="../js/jquery-1.9.1.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="../css/jsDatePick_ltr.min.css" />
<link type="text/css" href="../_App/css/ui-lightness/jquery-ui-1.8.6.custom.css" rel="stylesheet" />
<script type="text/javascript" src="../js/jquery.1.4.2.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<link rel="stylesheet" href="../css/jquery-ui.css" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
   <!--refresh-->
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
			<div class="toplinks1" style="width:100%; height:30px; "><a href="#" ><center>--Creare Advance Pass--</center></a></div>			
	</div>
<table width="90%" height="100%" border="0px" class="toplinks">
	<tr valign="top">
	<td width="76%" align="left"><a href="../employee.php">&nbsp;&nbsp;&nbsp;Home</a></td>
	<td width="14%" align="right"><a href="../logout.php"><?php echo $_SESSION['UNAME'];?>_Logout</a></td>
	</tr>
	</table>

<form method="POST" enctype="multipart/form-data" action="../employee/insertvms_emp.php"> 

<table align="center"  width="900">
<tr>                                                      
<td width="270" valign="top" rowspan="2">
<DIV>
<fieldset>
<legend><h3>PersonalInfo</h3></legend>
<table>
<tr><td>Visitor_Id:</td>
<td><input name="vid" type="text" id="vid" size="20" value="<?php require ('../inc/newvid.php');?>" readonly/>
</td></tr>

<tr><td>Mobile No:</td>
<td><input name="contno" type="text" id="contno" size="20" placeholder="Enter Here....." required autocomplete="on"/>
</td></tr>

<tr><td>Surname:</td>
<td><input name="sname" type="text" id="sname" size="20" placeholder="Enter Here....." autofocus autocomplete="on"/></td></tr>

<tr><td>First Name:</td>
<td><input name="fname" type="text" id="fname" size="20" placeholder="Enter Here....." autocomplete="on"/></td></tr>
    
<tr><td>Last Name:</td>
<td><input name="lname" type="text" id="lname" size="20" placeholder="Enter Here....." autocomplete="on"/></td></tr>
<tr><td>Emaile_id:</td>
<td><input name="e_id" type="text" id="e_id" size="20" placeholder="Enter Here....." autocomplete="on"/></td></tr>
</table></fieldset>
</DIV>
<br />

<DIV>
<fieldset ><legend><h3>Visiting TO</h3></legend>
<table>
<tr><td>Department:</td>
<td><input name="dept" type="text" id="dept" size="20" class="dept" /></td></tr> 
    
<!--tr>
<td>To Meet:</td>
<td><?php
/*
$hostname="localhost";
$username="root";
$password="";
$dbid="visitor";
$link=mysql_connect($hostname,$username,$password);
mysql_select_db($dbid) or die("unable to connect");


$data = mysql_query("select * from user where aa_id='3'");
echo "<Select name=\"emp\">";
while ($row = mysql_fetch_assoc($data))
{
$name = $row['uname'];
$pass = $row['pswd'];
$aa_id=$row['aa_id'];
echo "<option value=$name>$name</option>";
}
echo "</select>";
echo "</p>";
*/
?></td>
</tr--></table>
</fieldset>
</DIV>
</td>
<td width="270" valign="top" rowspan="2">
<DIV>
<fieldset>
<legend><h3>Visitor CompanyInfo</h3></legend>
<table>
<tr><td>Company_Name:</td><td><input name="compnm" type="text" id="compnm" size="20" placeholder="Enter Here....." /></td></tr>
<tr><td>Address:</td><td><textarea name="compadd" id="compadd" rows="3" cols="15" style="width:120" placeholder="Enter Here....." ></textarea></td></tr>
<tr><td>Contact_no.:</td><td><input name="compcont" id="compcont" type="text" size="15" style="width:120" placeholder="Enter Here....." /></td></tr>
</table></fieldset>
</DIV>
<br />
<DIV>
<fieldset>
<legend><h3>Visit</h3></legend>
<table>
<tr><td><input  id="reason" name="reason" type="radio" value="Official"/>Official</td>
<td><input id="reason" name="reason" type="radio" value="Personal"/>Personal</td></tr>
<!--<tr><td valign="middle">for: <td colspan="2" valign="top"><textarea id="for" name="for" row="3" placeholder="Enter Here....." ></textarea></td></tr>-->
</table>
</fieldset>
</DIV>
</td>

<td width="270" valign="top" rowspan="3">
<fieldset>
<legend><h3>Photo</h3></legend>
<!--table>
<tr><td valign=top>

	<script type="text/javascript" src="../js/webcam.js"></script>
	
	<script language="JavaScript">
		webcam.set_api_url( '../cam.php' );
		webcam.set_quality( 90 ); // JPEG quality (1 - 100)
		webcam.set_shutter_sound( true ); // play shutter click sound
	</script>
	
	<script language="JavaScript">
		document.write( webcam.get_html(220,180 ) );
	</script>
	<br/>
		<input type=button value="Take Snapshot" onClick="take_snapshot()">
		<input type=button value="Configure..." onClick="webcam.configure()">
		<input type="hidden" name="MAX_FILE_SIZE" value="500000">
        <input type="file" name="image" id="image" value="asdasd" />
	
	<script language="JavaScript">
		webcam.set_hook( 'onComplete', 'my_completion_handler' );
		
		function take_snapshot() {
			// take snapshot and upload to server
			document.getElementById('upload_results').innerHTML = '<h1>Uploading...</h1>';
			webcam.snap();
		}
		
		function my_completion_handler(msg) {
			// extract URL out of PHP output
			if (msg.match(/(http\:\/\/\S+)/)) {
				var image_url = RegExp.$1;
				// show JPEG image in page
				document.getElementById('upload_results').innerHTML = 
					//'<h1>Upload Successful!</h1>' + 
					//'<h3>JPEG URL: ' + image_url + '</h3>' + 
					'<img src="' + image_url + '">';
				
				// reset camera for another shot
				webcam.reset();
			}
			else alert("PHP Error: " + msg);
		}
	</script>
	
	</td></tr><tr><td valign=top>
		<div id="upload_results"></div>
	</td></tr></table--></fieldset>
</td></tr>
<tr></tr>
<tr>
<td valign="top">
<DIV>
<fieldset>
<legend><h3>Card Validity</h3></legend>
<table><tr valign="top"><td>
  <div style="float: left; padding-right: 3px; line-height: 18px;"> Date: </div>
<div> <?php
						$thisweek = date('W');
						$thisyear = date('Y');

						$dayTimes = getDaysInWeek($thisweek, $thisyear);
						//----------------------------------------

						$date1 = date('Y-m-d', $dayTimes[0]);
						$date2 = date('Y-m-d', $dayTimes[(sizeof($dayTimes)-1)]);

						function getDaysInWeek ($weekNumber, $year, $dayStart = 1) {
						  // Count from '0104' because January 4th is always in week 1
						  // (according to ISO 8601).
						  $time = strtotime($year . '0104 +' . ($weekNumber - 1).' weeks');
						  // Get the time of the first day of the week
						  $dayTime = strtotime('-' . (date('w', $time) - $dayStart) . ' days', $time);
						  // Get the times of days 0 -> 6
						  $dayTimes = array ();
						  for ($i = 0; $i < 7; ++$i) {
							$dayTimes[] = strtotime('+' . $i . ' days', $dayTime);
						  }
						  // Return timestamps for mon-sun.
						  return $dayTimes;
						}


					  $myCalendar = new tc_calendar("date3", true, false);
					  $myCalendar->setIcon("../calendar/images/iconCalendar.gif");
					  $myCalendar->setDate(date('d', strtotime($date1)), date('m', strtotime($date1)), date('Y', strtotime($date1)));
					  $myCalendar->setPath("../calendar/");
					  $myCalendar->setYearInterval(1970, 2020);
					  //$myCalendar->dateAllow('2009-02-20', "", false);
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->setDatePair('date3', 'date4', $date2);
					  //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
					  $myCalendar->writeScript();
					  ?></div>
					  
	 
  <td>
  <div style="float: left; padding-left: 3px; padding-right: 3px; line-height: 18px;"> Time: </div>
  <div>
  <input name="time" type="text" id="time" size="10" placeholder="20:15" required autocomplete="on"/>
   </div>
</td>
</tr>
</table></fieldset>
</DIV>
<td colspan="" align="center">
<input type="submit" value="Create Pass" class="myButton" style="color:#990000" name="Save" class="button" />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</td>
</tr>
</table>
<!--table align="center" width="900">
<tr>
<td valign="top">
<fieldset>
<legend><h3><h3>History</h3></legend>
<table style="width:850px; cellpadding:0 cellspacing:0" bgcolor="white" border="1"> 
<tr><th >id</th> <th >S_Name</th><th>F_Name</th><th>L_Name</th> <th>Contact</th>
</tr>                                              
<tr><td colspan='5'>
<div style="overflow-y:auto;width:850px;height:100px;"> 
<?php
/*
$con=mysql_connect("localhost","root","");
// Check connection
if (!$con){
  die('Could not connect:' . mysql_error());
  }
mysql_select_db("visitor", $con);
$q = "select * from Master_visitor order by v_id desc";
$result = mysql_query($q);
echo "<table style='width: 850px; cellpadding:0 cellspacing:0' bgcolor='white'>";
 while($row = mysql_fetch_array($result)) {
 echo "<tr><td width='50' align='center'>".$row['v_id']."</td>";
 echo "<td width='200' align='center'>".$row['sname']."</td>";
 echo "<td width='200' align='center'>".$row['fname']."</td>";
 echo "<td width='200' align='center'>".$row['lname']."</td>";
 echo "<td align='center'>".$row['cont_no']."</td></tr>";
 }
echo "</table>";    
*/
?>
</div>
</td></tr>

</table></fieldset-->
<!--center><div class="refresh"><?php //require('_App/refresh.php'); ?></div></center>
<!--div id="fotter">
         <p>Copyright &copy; 2013 Median IT Solutions Pvt. Ltd All rights reserved.
         </p>
    </div-->
</form>

<br><br><br><br><br><br><br>
			<?php include('../fotter.php')?>


</div>
</body>
</html>

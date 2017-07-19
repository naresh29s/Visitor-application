<?php 
session_start(); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<link rel="stylesheet" href="css/style1.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/buttone.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="_App/calendar/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script language="javascript" src="_App/calendar/calendar.js"></script>



<link rel="stylesheet" href="js/jquery-ui.css" />
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<link type="text/css" href="_App/css/ui-lightness/jquery-ui-1.8.6.custom.css" rel="stylesheet" />
<script language="javascript" src="js/calendar.js"></script>

<script type="text/javascript" src="js/jquery.1.4.2.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>

   <!--refresh-->
<script language="javascript" src="js/jquery-1.2.6.min.js"></script>
<script language="javascript" src="js/jquery.timers-1.0.0.js"></script>
<script type="text/javascript">

$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".refresh").everyTime(1000,function(i){
			j.ajax({
			  url: "_App/refresh.php",
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
<!--<script>
$(document).ready(function(){
$("#contno").autocomplete("_App/autocomplete.php", {
		selectFirst:true
	});
});
</script>-->

<script>
$(document).ready(function(){
$("#dept").autocomplete("_App/deptfill.php", {
		selectFirst:true
	});
});
</script>

</head>

<body bgcolor="#FFFFFF">

<style>
ul
{
float:left;
width:100%;
padding:0;
margin:0;
list-style-type:none;
}
a
{
float:right;
text-decoration:none;
padding:0.2em 0.6em;
}
li {display:inline;}
</style>
<table align="center"  width="900">
<tr><td colspan=2><div><img height="100" width="100%" src="visitorimage/log.jpg" /></div></td></tr>
<tr><td></td>
<td id="vmslink"><ul>
<li><a href="logout.php" title="logout" target="_top"><h3><font color="#990000"><?php echo $_SESSION['UNAME'];?>&nbsp;&nbsp;Logout</font></h3></a></li>
<li><a href="index.php" title="Home"><h3><font color="#990000">Home</font></h3></a></li>
</ul></td></tr></table>

<form method="POST" enctype="multipart/form-data" action="vmsedit_advance.php"> 

<table align="center"  width="900" >
<div align="center"><h2><font color="#990000">Search_advance_Form</font></h2>
</div>
<!--<form name="visitor" id="visitor" method="POST">-->
<tr>                                                      
<td width="270" valign="top" rowspan="2">
<DIV>
<fieldset>
<legend><h3><font color="#990000">PersonalInfo</font></h3></legend>
<table>
<tr><td>Visitor_Id:</td>
<td><input name="vid" type="text" id="vid" size="20" value="<?php require ('inc/newvid.php');?>" readonly/>
</td></tr>

<tr><td>Mobile No:</td>
<td><input name="contno" type="text" id="contno" size="20" placeholder="Enter contect number" autofocus required autocomplete="on"/>
</td></tr>

<tr><td>Surname:</td>
<td><input name="sname" type="text" id="sname" size="20" placeholder="Enter surname" /></td></tr>

<tr><td>First Name:</td>
<td><input name="fname" type="text" id="fname" size="20" placeholder="Enter first name" /></td></tr>
    
<tr><td>Last Name:</td>
<td><input name="lname" type="text" id="lname" size="20" placeholder="Enter last name" /></td></tr>
</table></fieldset>
</DIV>
<br />

<DIV>
<fieldset><legend><h3><font color="#990000">Visiting_TO</font></h3></legend>
<table>
<tr><td>Department:</td>
<td><input name="dept" type="text" id="dept" size="20" class="dept" /></td></tr>       
<tr>
<td>To Meet:</td><td><input name="tomeet" type="text" id="tomeet" size="20" /></td>
</tr></table>
</fieldset>
</DIV>
</td>
<td width="270" valign="top" rowspan="2">
<DIV>
<fieldset>
<legend><h3><font color="#990000">Visitor_CompanyInfo</font></h3></legend>
<table>
<tr><td>Company_Name:</td><td><input name="compnm" type="text" id="compnm" size="20" onBlur="fillcompanydetails(this.value);" placeholder="Enter Here....." /></td></tr>
<tr><td>Address:</td>
<td><textarea name="compadd" id="compadd" rows="3" cols="18" style="width:120; size:20;" placeholder="Enter Here....." ></textarea></td></tr>
<tr><td>Contact_no.:</td><td><input name="compcont" id="compcont"type="text" size="20" style="width:120" placeholder="Enter Here....." /></td></tr>
</table></fieldset>
</DIV>
<br />
<DIV>
<fieldset>
<legend><h3><font color="#990000">Visit</font></h3></legend>
<table>
<tr><td><input id="offcl" name="reason" type="radio" value="Official" checked="checked"/>Official</td>
<td><input id="prsnl" name="reason" type="radio" value="Personal"/>Personal</td></tr>
<!--<tr><td valign="middle">for: <td colspan="2" valign="top"><textarea id="for" name="for" row="3" placeholder="Enter Here....." ></textarea></td></tr>-->
</table>
</fieldset>
</DIV>
</td>

<td width="270" valign="top" rowspan="3">
<fieldset>
<legend><h3><font color="#990000">Photo</font></h3></legend>
<table>
<tr><td valign=top>
<!-- First, include the JPEGCam JavaScript Library -->
	<script type="text/javascript" src="js/webcam.js"></script>
	
	<!-- Configure a few settings -->
	<script language="JavaScript">
		webcam.set_api_url( 'cam.php' );
		webcam.set_quality( 90 ); // JPEG quality (1 - 100)
		webcam.set_shutter_sound( true ); // play shutter click sound
	</script>
	
	<!-- Next, write the movie to the page at 320x240 -->
	<script language="JavaScript">
		document.write( webcam.get_html(220,180 ) );
	</script>
	<br/>
		<input type=button value="Take Snapshot" onClick="take_snapshot()">
		<!--<input type=button value="Reset" onClick="webcam.reset()">
		<input type=button value="Save" onClick="take_snapshot()">-->
		<input type=button value="Configure..." onClick="webcam.configure()">
		<input type="hidden" name="MAX_FILE_SIZE" value="500000">
        <input type="file" name="image" id="image"  value="casdcasca"/>
	
<!-- Code to handle the server response (see test.php) -->
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
	</td></tr></table></fieldset>
</td></tr>
<tr></tr>
<tr>
<td valign="top">
<DIV>
<fieldset>
<legend><h3><font color="#990000">Card_Validity</font></h3></legend>
<table><tr valign="top"><td>
  <div style="float: left; padding-right: 3px; line-height: 18px;"> From: </div>
<div>  <?php		
      require_once('_App/classes/tc_calendar.php');			
      $date3_default = "";
      $date4_default = "";

	  $myCalendar = new tc_calendar("date3", true, false);
	  $myCalendar->setIcon("_App/calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setDateFormat('d-m-Y');
	  $myCalendar->setPath("_App/calendar/");
	  $myCalendar->setYearInterval(1970, 2020);
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->setDatePair('date3', 'date4', $date4_default);
	  $myCalendar->writeScript();	
	 ?></div>
	 
  <td>
  <div style="float: left; padding-left: 3px; padding-right: 3px; line-height: 18px;"> To: </div>
  <div><?php
	  $myCalendar = new tc_calendar("date4", true, false);
	  $myCalendar->setIcon("_App/calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setDateFormat('d-m-Y');	   
	  $myCalendar->setPath("_App/calendar/");
	  $myCalendar->setYearInterval(1970, 2020);
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->setDatePair('date3', 'date4', $date3_default);
	  $myCalendar->writeScript(); ?>
   </div>
</td>
</tr>
</table></fieldset>
</DIV>
<td colspan="" align="center">
<input type="submit" class="myButton" value="Search" name="Search" class="button"/>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--input type="submit" value="Create" name="Create" class="button" onClick="windows.location.href='insertvms.php'"/-->
	  
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--<input type="button" value="Print_VisitorPass" class="button" onClick="location.href='_App/display.php'"/>-->
</td>
</tr>
</table>
<!--table align="center" width="900">
<tr>
<td valign="top">
<fieldset>
<legend><h3><font color="#990000">History</font></h3></legend>
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
$q = "select * from Master_visitor";
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
<tr><td></td></tr>
</table></fieldset-->
<center><div class="refresh"><?php require('_App/refresh.php'); 
//$_SESSION['contno']=$_POST['contno']; 
?></div></center>
<!--div id="fotter">
         <p>Copyright &copy; 2013 Median IT Solutions Pvt. Ltd All rights reserved.
         </p>
    </div-->
</form>
</body>
</html>

<?php session_start(); 
  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ID_Card_Print</title>

<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="css/style1.css" />
<link href="_App/calendar/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.1.min.js">
<script language="javascript" src="_App/calendar/calendar.js"></script>



<link rel="stylesheet" href="_App/jquery-ui.css" />
<script src="_App/jquery-1.9.1.js"></script>
<script src="_App/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="_App/jsDatePick_ltr.min.css" />
<link type="text/css" href="_App/css/ui-lightness/jquery-ui-1.8.6.custom.css" rel="stylesheet" />
<script language="javascript" src="_App/calendar.js"></script>

<script type="text/javascript" src="_App/jquery.1.4.2.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="_App/jquery.autocomplete.css" />
<link rel="stylesheet" href="_App/jquery-ui.css" />
<script type="text/javascript" src="_App/jquery.js"></script>
<script type="text/javascript" src="_App/jquery.autocomplete.js"></script>

<!--<script>
$(document).ready(function(){
$("#contno").autocomplete("_App/autocomplete.php", {
		selectFirst:true
	});
});
</script>
<script>
$(document).ready(function(){
$("#sname").autocomplete("_App/sname.php", {
		selectFirst:true
	});
});
</script>

<script>
$(document).ready(function(){
$("#fname").autocomplete("_App/fname.php", {
		selectFirst:true
	});
});
</script>

<script>
$(document).ready(function(){
$("#lname").autocomplete("_App/lname.php", {
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

<body bgcolor="#d0e4fe">

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
color:blue;
padding:0.2em 0.6em;
}
li {display:inline;}
</style>
<ul>
<li><a href="logout.php" title="logout"><h3>Logout</h3></a></li>
<li><a href="index.php" title="Home"><h3>Home</h3></a></li>
</ul>

<form method="POST" enctype="multipart/form-data" > 
<table align="center"  width="900">
<div align="center"><h2>--------Visitor_Form---------</h2>
</div>
<!--<form name="visitor" id="visitor" method="POST">-->
<tr>                                                      
<td width="270" valign="top" rowspan="2">
<DIV>
<fieldset>
<legend><h3>PersonalInfo</h3></legend>
<table>
<tr><td>Mobile No:</td>
<td><input type="search" name="search"/><br><input name="contno" type="text" id="contno" size="20" placeholder="Enter Here....." autofocus required autocomplete="on"/>
</td></tr>
<tr><td>Surname:</td>
<td><input name="sname" type="text" id="sname" size="20" autocomplete="on" placeholder="Enter Here....."/></td></tr>

<tr><td>First Name:</td>
<td><input name="fname" type="text" id="fname" size="20" autocomplete="on" placeholder="Enter Here....."/></td></tr>
    
<tr><td>Last Name:</td>
<td><input name="lname" type="text" id="lname" size="20" autocomplete="on" placeholder="Enter Here....."/></td></tr>
</table></fieldset>
</DIV>
<br />

<DIV>
<fieldset><legend><h3>Visiting_TO</h3></legend>
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
<legend><h3>Visitor_CompanyInfo</h3></legend>
<table>
<tr><td>Company_Name:</td><td><input name="compnm" type="text" id="compnm" size="20" onBlur="fillcompanydetails(this.value);" placeholder="Enter Here....." /></td></tr>
<tr><td>Address:</td><td><textarea name="compadd" id="compadd" rows="3" cols="15" style="width:120" placeholder="Enter Here....." ></textarea></td></tr>
<tr><td>Contact_no.:</td><td><input name="compcont" id="compcont"type="text" size="15" style="width:120" placeholder="Enter Here....." /></td></tr>
</table></fieldset>
</DIV>
<br />
<DIV>
<fieldset>
<legend><h3>Visit</h3></legend>
<table>
<tr><td><input id="offcl" name="reason" type="radio" value="Official" checked="checked"/>Official</td>
<td><input id="prsnl" name="reason" type="radio" value="Personal"/>Personal</td></tr>
<tr><td valign="middle">for: <td colspan="2" valign="top"><textarea id="for" name="for" row="3" placeholder="Enter Here....." ></textarea></td></tr>
</table>
</fieldset>
</DIV>
</td>

<td width="270" valign="top" rowspan="3">
<fieldset>
<legend><h3>Photo</h3></legend>
<table>
<tr><td valign=top>
<!-- First, include the JPEGCam JavaScript Library -->
	<script type="text/javascript" src="_App/webcam.js"></script>
	
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
        <input type="file" name="image" id="image" />
	
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
<legend><h3>Card_Validity</h3></legend>
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
<input type="submit" value="Save" name="Save" class="button" onClick="<?php insert(); ?>"/>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="PrintIDCard" class="button" onClick="location.href='_App/display.php'"/>
</td>
</tr>
</table>
<table align="center" width="900">
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
?>
</div>
</td></tr>
</td></tr>
</table></fieldset>
</form>
</body>
</html>
<?php
function insert()
{// Check for post data.
if ($_POST && !empty($_FILES)) {
	$formOk = true;

	//Assign Variables
	$sname=$_POST['sname'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$contno=$_POST['contno'];
	$dept=$_POST['dept'];
	$tomeet=$_POST['tomeet'];
	$vcompid="select vcompid from visitor_company where compname='".$_POST['compnm']."'";
	$vcompnm=$_POST['compnm'];
	$vcompadd=$_POST['compadd'];
    $vcompcont=$_POST['compcont'];
	$vreason=$_POST['reason'];
	$vfor=$_POST['for'];
//	$d1=$_POST['date3'];
//	$d2=$_POST['date4'];
	$path=$_FILES['image']['tmp_name'];
	$type = $_FILES['image']['type'];
	if ($_FILES['image']['error'] || !is_uploaded_file($path)) {
		$formOk = false;
		echo "Error: Error in uploading file. Please try again.";
	}

	//check file extension
	if ($formOk && !in_array($type, array('image/png', 'image/x-png', 'image/jpeg', 'image/pjpeg', 'image/gif'))) {
		$formOk = false;
		echo "Error: Unsupported file extension. Supported extensions are JPG / PNG.";
	}
	// check for file size.
	if ($formOk && filesize($path) > 500000) {
		$formOk = false;
		echo "Error: File size must be less than 500 KB.";
	}

	if ($formOk) {
		// read file contents
		$content = file_get_contents($path);
       
		//connect to mysql database
		if ($conn = mysqli_connect('localhost', 'root', '', 'visitor'))
		 {	$content = mysqli_real_escape_string($conn, $content);
			
		    $sql = "insert into master_visitor (sname, fname, lname, cont_no, reason, for, vcompid, image) values ('{$sname}','{$fname}', '{$lname}', '{$contno}', '{$vreason}, '{$vfor}', '{$vcomp}', '{$content}')";
			$vcompid=mysql_query($conn, $vcompid);
		    $vcomp=$vcompid['vcompid'];
			$sql = "insert into master_visitor (vcompid) values ('{$vcompid}')";
		$row=	mysqli_query($conn, $sql);
				if($row>0){
				$uploadOk = true;
				$imageId = mysqli_insert_id($conn);
			} else {
				echo "Error: Could not save the data to mysql database. Please try again.";
			}
//            $q="select v_id from master_visitor wehere cont_no='".$contno."'";
//			$r= mysql_query($q);
//            $sql= " insert into validitydate (cont_no,frmdate,todate) values ('{$contno}','{$d1}','{$d2}')";            
//			$row= mysql_query($sql,$con);
			mysqli_close($conn);
		} else {
			echo "Error: Could not connect to mysql database. Please try again.";
		}
	}
}
 }
 
 function fillcompanydetails($str){
 
 
 
 if ($conn = mysqli_connect('localhost', 'root', '', 'visitor'))
 {
    $sql="select * from visitor_company where vcompname='".$str."'"; 
    $row=	mysqli_query($conn, $sql);
	echo "</td></tr>
<tr><td>Address:</td><td><textarea name='compadd' id='compadd' rows='3' cols='15' style='width:120' placeholder='Enter Here.....' >".$row['vcompadd']."</textarea></td></tr>
<tr><td>Contact_no.:</td><td><input name='compcont' id='compcont' type='text' size='15' style='width:120'".$row['vcompcont']." placeholder='Enter Here.....' /></td></tr>";
mysqli_close($conn);
	
 }
 }
                                       
?>

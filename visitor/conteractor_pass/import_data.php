<?php
  session_start();
  
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/but.css" />
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript">
</script>
<body>
<form action="put_ex_file.php" method="post" enctype="multipart/form-data" >
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
			<div class="toplinks1" style="width:100%; height:30px; "><a href="#" ><b><center>--Welcome <?php echo $_SESSION['UNAME'];?>--</center></a></b></div>			
	</div>
	
	<center>
	<div style="width:90%; border:0px solid;">
	<table width="100%" height="100%" border="0px" class="toplinks">
	<tr valign="top">
	<td width="16%" valign="top"><a href="vmsreport.php" title="Home"><h3>Home</h3></a></td>
	<td width="84%" align="right"><a href="../logout.php" title="logout" target="_top" ><h3><?php echo $_SESSION['UNAME'];?>&nbsp;&nbsp;Logout</h3></a></td>
	</tr>
	</table>
		<br>
<center><b><font size="4px">Format of Excel sheet to upload a bulk data of contractor pass</font></b></center>
<br>
<table>
<tr><td></td></tr>
<tr><td>1.Create excel file in <b>1997 and 2000 format</b>(compulsory)<font color="#FF0000">*</font></td></tr>
<tr><td>2.Field name should be as same as shown below<font color="#FF0000">*</font></td></tr>
<tr><td>3.Date format should be as same as below<font color="#FF0000">*</font></td></tr>
</table>
<br>
<table>
<tr><td><img width="800px" src="../visitorimage/xl_reoprt_advance_cont1.bmp" /></td></tr>
<tr><td align="center"><img width="425px" src="../visitorimage/xl_reoprt_advance_cont2.bmp" /></td></tr>
</table>
<br>
<!--center><b><font size="2px">OR</font></b></center>
<br>
<table>
<tr><td><b>Click below link to get demo excel sheet and make necessary changes<b></td></tr>
<tr align="center"><td><a href="demo_xl_sheel.php"><img src="../visitorimage/xl.png" width="30px" height="30px" /></a></td></tr>
</table-->
<br><br><br><br>
<table>
<tr><td><b>Attech Excel file and Upload</b></td></tr>
<tr align="center"><td>
<b>Select file:</b></font><input name="bulk" type="file"/>
</td><td><input type="submit" class="myButton" value="Upload Data"/></td></tr>
</table>


	</div>
	</center>
  
  
    <!--fotter section start-->
   <br><br><br>
	<?php include('../fotter.php');?>
	</div>
</div>
</form>
</body>
</html>

	

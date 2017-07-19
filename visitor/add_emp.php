<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>add_emp</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/but.css" />
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>

<body >

<form action="employee/add_data.php" method="post">
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
			<div class="toplinks1" style="width:100%; height:30px; "><a href="#" ><b><center>--Add Employee details--</center></a></b></div>			
	</div>
	
	<center>
	
	<table width="90%" height="100%" border="0px" class="toplinks">
	<tr valign="top">
	<td width="10%" valign="top"><a href="index.php" style="float:left" title="Home" ><h3>Home</font></h3></a></td>
	<td width="90%" align="right"><a href="logout.php" title="logout" target="_top" ><h3><?php echo $_SESSION['UNAME'];?>&nbsp;&nbsp;Logout</font></h3></a></td>
	</tr>
	</table>

      
         <table align="center" style="background-image:url(visitorimage/log2.jpg); background-position:top" class="login_box">
              <tr><td colspan="2" id="errorMessage"></td></tr>
				         
			  <tr>
                 <td><font ><b>Type:</font></td>
                 <!--td><input type="text" name="code" id="code" autofocus required></td-->
                 <td><select name="code" style="width:145px">
				 	<option value="1">Admin</option>
					<option value="2">Reseptionist</option>
					<option value="3">Employee</option>
					</select>
					</td>
              </tr>
			  <tr>
                 <td><font ><b>UserName</font></td>
                 <td><input type="text" name="uname" id="uname" autofocus required></td>
              </tr>
              <tr>
                 <td><font ><b>Password</font></td>
                 <td><input type="password" name="password" id="password"></td>
              </tr>
			  <tr>
                 <td><font ><b>Mobile_Number</font></td>
                 <td><input type="text" name="mob_no" id="mob_no"></td>
              </tr>
              <tr id="button_box">
                 <td>&nbsp</td>
                 <td><input type="submit" class="myButton" value="submit" /></td>
              </tr>
              <tr><td colspan="2" id="flash"></td></tr>
         </table>


    <!--fotter section start-->
     <br><br><br>    <br><br><br>
	<?php include('fotter.php')?>

</div>
</form>
</body>

</html>

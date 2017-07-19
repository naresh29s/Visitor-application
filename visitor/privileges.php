<?php
  session_start();
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><img src="visitorimage/logo1.bmp"></img>jo</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/but.css" />
<script type="text/javascript" >
 function show_but()
  {
         jQuery('#span_submit').show();
  }
  function hide_but()
  {
       jQuery('#span_submit').hide();
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
		<div id="right"><img src="visitorimage/log2.jpg" style="height:100px; width:100%;"/></img>
		</div>
	</div>
	<div  class="heading">
			<div class="toplinks1" style="width:100%; height:30px; "><a href="#" ><b><center>Set privileges</center></a></b></div>			
	</div>
<body >
<table width="90%" align="center" height="90%" class="toplinks">
	<tr valign="top">
	<td width="10%"  align="left"><a href="index.php" title="home"><h3>home</h3></a></a></td>
	<td width="90%" align="right"><a href="logout.php" title="logout" target="_top" ><h3><?php echo $_SESSION['UNAME'];?>&nbsp;&nbsp;Logout</font></h3></a></td>
	</tr>
	</table>

<form action="employee/add_approval.php" method="post">
	 			<?php
	 			 $con=mysql_connect("localhost","root","");
				 if (!$con)
				 {
  					die('Could not connect:' . mysql_error());
  				 }
				mysql_select_db("visitor", $con);
				$q13 = "select * from preference";
				$rs3 = mysql_query($q13);
				$row3=mysql_fetch_array($rs3);
				$a=$row3['sent_sms'];
				$msge=$row3['sms'];
				 ?>
   
        <div id="wrapper" style="height:350px">
         <table width="353" height="190px" align="center" style="background-image:url(visitorimage/logo3.JPG); background-position:center; background-repeat:no-repeat" class="login_box">
              <tr><td colspan="2" id="errorMessage"></td></tr>
				         
			  <tr>
                 <td width="149"><b>Need user approval</td>
                 <!--td><input type="text" name="code" id="code" autofocus required></td-->
                 <td width="192"><select name="app" style="width:145px">
				 	<option value="YES">YES</option>
					<option value="NO">NO</option>
					</select>				</td>
              </tr>
			  <tr>
                <td height="36"><b>Send SMS </td>
                 <!--td><input type="text" name="code" id="code" autofocus required></td-->
                 <td><select name="sms" style="width:145px">
				 	<option value="YES">YES</option>
					<option value="NO">NO</option>
					</select></td>
              </tr>
			  <tr>
			   <td colspan="2"> 
				 <center><b>----Message----</center>
				  </td>
              </tr>
			  <tr>
                 <td colspan="2"> 
				 <center>
  				   <textarea name="msg" id="msg" rows="0" cols="20" style="width:280px" placeholder="" ><?php echo $msge;?></textarea>
  				  </center>
				  </td>
              </tr>
              <tr id="button_box">
                 <td colspan="2"><center><input type="submit" value="submit" class="myButton" style=" color:#990000"  /></center></td>
              </tr>
              <tr><td colspan="2" id="flash"></td></tr>
         </table>
    </div>
</form>
    <!--fotter section start-->
    <br><br><br>
	<?php include('fotter.php')?>
	</div>
</div>
</body>
</html>

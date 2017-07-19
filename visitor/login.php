<?php
  session_start();
  
  if(isset($_SESSION['LOGIN_STATUS']) && !empty($_SESSION['LOGIN_STATUS'])){
      header('location:index.php');
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/but.css" />
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript">
function validLogin(){
      var uname=$('#uname').val();
      var password=$('#password').val();

      var dataString = 'uname='+ uname + '&password='+ password;
      $("#flash").show();
      $("#flash").fadeIn(400).html('<img src="image/loading.gif" />');
      $.ajax({
      type: "POST",
      url: "processed.php",
      data: dataString,
      cache: false,
      success: function(result){
               var result=trim(result);
               $("#flash").hide();
               if(result=='1'){
                     window.location='admin.php';
               }
			   else if (result=='2'){
                     window.location='user.php';
               }
			   else if (result=='3'){
                     window.location='employee.php';
               }
			   else{
                     $("#errorMessage").html(result);
               }
      }
      });
}

function trim(str){
     var str=str.replace(/^\s+|\s+$/,'');
     return str;
}
</script>
</head>
<body >

<div id="container">
    <!--top section start-->
	
	
	<div id="header">
		<div id="left">
			<div id="logo">
				<div class="name"><b>Visitor Management System</b></div>
				<div class="tag"><b>Median IT Solutions pvt.ltd</b> </div>
			</div>	
		</div>
		<div id="right"><img src="visitorimage/log2.jpg" style="height:100px; width:100%;"/></img>
		</div>
	</div>
	<div class="heading">
			<div class="toplinks1" style="width:100%; height:30px; "><a href="#" ><center>--Login Details--</center></a></div>			
	</div>
        <div id="wrapper">
		<center>
		 <br><br><br> <br><br><br>
         <table align="center" style="background-image:url(visitorimage/log2.jpg); background-position:top" class="login_box">
              <tr><td colspan="2" id="errorMessage"></td></tr>
              <tr>
                 <td><b>UserName</b></td>
                 <td><input type="text" name="uname" id="uname" autofocus required></td>
              </tr>
              <tr>
                 <td><b>Password</b></td>
                 <td><input type="password" name="password" id="password"></td>
              </tr>
              <tr id="button_box">
                 <td>&nbsp</td>
                 <td><input type="button" name="submit" class="myButton" value="Login" onclick="validLogin()"/>				 </td>
              </tr>
              <tr><td colspan="2" id="flash"></td></tr>
         </table>
		 <br><br><br> <br><br><br> <br><br><br>
		 </center>
    </div>

    <!--fotter section start-->
   <?php
	include('fotter.php');
	?>
</form>
</body>

</html>

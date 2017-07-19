<?php 
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dashboard</title>

<link rel="stylesheet" type="text/css" href="../css/style1.css" />

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
			  url: "refresh.php",
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
<!--
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".refreshdashboard").everyTime(60000,function(i){
			j.ajax({
			  url: "refreshdashboard.php",
			  cache: false,
			  success: function(html){
				j(".refreshdashboard").html(html);
			  }
			})
		})
	});
   j('.refreshdashboard');
});
</script>-->
</head>

<body bgcolor="#e1e1e1" >
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

<table align="center"  width="900" id="tutorialHead">
<tr><td colspan=2><div><img height="100" width="893" src="../visitorimage/visitor-management-software.jpg"/></div></td></tr>
<tr><td></td>
<td><ul>
<li><a href="../logout.php" title="logout"><h3>Logout</h3></a></li>
<li><a href="vmsreport.php" title="report"><h3>Report</h3></a></li>
<li><a href="validate_visitor.php" title="validate"><h3>Update_visitor</h3></a></li>
<li><a href="../index.php" title="Home"><h3>Home</h3></a></li>

</ul>
</td></tr></table>
<div id="title" align="center"><h2>Visitor_Today's_Detail</h2></div>
<table align="center"  width="900" >
<tr><td>
<div><?php require ('refreshdashboard.php'); ?></div>
</td></tr>
</table>
<center><div class="refresh"><?php require('refresh.php'); ?></div>
<div id="fotter">
         <p>Copyright &copy; 2012 
              <label style="color:red">Median IT Solutions Pvt. Ltd.</label>
              All rights reserved.
         </p>
    </div>
</center>
</body>
</html>

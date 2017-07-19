<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<title></title>
</head>

<body bgcolor="#FFFFFF">
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
		<div id="right"><img src="../../visitorimage/log2.jpg" style="height:100px; width:100%;"/></img>
		</div>
	</div>
	<div  class="heading">
			<div class="toplinks1" style="width:100%; height:30px; "><a href="#" ><b><center>--Name wise Report--</center></a></b></div>			
	</div>
	
	<center>
	
	<table width="90%" height="100%" border="0px" class="toplinks">
	<tr valign="top">
	<td width="10%" valign="top"><a href="../../index.php" style="float:left" title="Home" ><h3>Home</font></h3></a></td>
	<td width="90%" align="right"><a href="../../logout.php" title="logout" target="_top" ><h3><?php echo $_SESSION['UNAME'];?>&nbsp;&nbsp;Logout</font></h3></a></td>
	</tr>
	</table>


<fieldset style="width:80%">
<legend><h3>Name wise Records</h3></legend>
<div style= "overflow-y:auto; width:100%;height:300px; background:#FFFFFF">
<table width="100%" bgcolor="white" style="width:900px;" > 
<tr>
<th width="82" >Pass_ID</th>
<th width="46">Start_date</th>
<th width="46">End_date</th>
<th width="46">Name</th>
<th width="58" >Mobile_No</th>
<th width="46">site</th>
<th width="103">DeptName</th>
<th width="129">Designattion</th>
<th width="93">cmpny_name</th>
<th width="65">cmpny_no</th>
<th width="89">image </th>
</tr>   
<?php 

$p=$_SESSION['cmpny_name'];
$da=date('Y-m-d');
include('../../inc/dbConnect.inc.php');
$q = "select * from  conteractor_pass_information where v_comp_name LIKE '%$p%' and  start_date<='".date('Y-m-d')."' and end_date>='".date('Y-m-d')."' order by start_date";
$result = mysql_query($q);
$row_num = mysql_num_rows($result);
 while($row1 = mysql_fetch_array($result)) {
  echo "<tr><td width='50' align='center'>".$row1['cont_v_id']."</td>";
 echo "<td width='200' align='center'>".$row1['start_date']."</td>";
 echo "<td width='200' align='center'>".$row1['end_date']."</td>";
  echo "<td width='200' align='center'>".$row1['sname']." ".$row1['fname']." ".$row1['lname']."</td>";
 echo "<td width='200' align='center'>".$row1['cont_no']."</td>";
 echo "<td width='100' align='center'>".$row1['v_site']."</td>";
 echo "<td width='100' align='center'>".$row1['dept']."</td>";
 echo "<td width='200' align='center'>".$row1['designattion']."</td>";
 echo "<td width='200' align='center'>".$row1['v_comp_name']."</td>";
 echo "<td width='200' align='center'>".$row1['v_comp_cont']."</td>";
 
 $contno=$row1['cont_no'];
 echo "<td width='200' align='center'>" ?>  
  <img width="100"  height="70" src="getImage.php?contno='<?php echo $contno; ?>'"/> 
  <?php "</td>";
 } 
 echo "<script> alert('$row_num records are found')</script>"
?>    
</table></div>
</fieldset> 

<b><font size="2" color="#333333" style="float:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Record: <?php  echo $row_num;?></font></b>
<br><br><br><br><br><br><br><br>
	<?php include('../../fotter.php');?>	
	</div>
</div>
</body>
</html>

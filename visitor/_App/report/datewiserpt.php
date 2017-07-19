<?php
session_start();

$rpt=$_SESSION['d1'];
$rpt2=$_SESSION['d2'];
$_SESSION['rpt']=$rpt;
$_SESSION['d1']=$rpt;
$_SESSION['d2']=$rpt2;
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
		<div id="right"><img src="visitorimage/log2.jpg" style="height:100px; width:100%;"/></img>
		</div>
	</div>
	<div  class="heading">
			<div class="toplinks1" style="width:100%; height:30px; "><a href="#" ><b><center>--DateWise_Report--</center></a></b></div>			
	</div>
	
	<center>
	
	<table width="90%" height="100%" border="0px" class="toplinks">
	<tr valign="top">
	<td width="10%" valign="top"><a href="../../index.php" style="float:left" title="Home" ><h3>Home</font></h3></a></td>
	<td width="90%" align="right"><a href="../../logout.php" title="logout" target="_top" ><h3><?php echo $_SESSION['UNAME'];?>&nbsp;&nbsp;Logout</font></h3></a></td>
	</tr>
	</table>


<fieldset style="width:80%">
<legend><h3>DateWise</h3></legend>
<div style= "overflow-y:auto; width:100%;height:300px; background:#FFFFFF">
<table width="100%" bgcolor="white" style="width:900px;" > 
<tr>
<th width="82" >Pass_ID</th>
<th width="46">Date</th>
<th width="46">Time_in</th>
<th width="46">Time_out</th>
<th width="58" >Name</th>
<th width="103">Mobile_No</th>
<th width="103">DeptName</th>
<th width="129">Cont_Person</th>
<th width="93">Company</th>
<th width="65">Status</th>
<th width="89">image </th>
<th width="88">Action</th>
</tr>                                              

<?php 

include('../../db_con.php');
//$q = "select * from visiting_details where visiting_date between '".$rpt."' and '".$rpt2."' order by visiting_date";

$q = "SELECT *
FROM visiting_details a, master_visitor b
WHERE a.cont_no = b.cont_no
AND visiting_date
BETWEEN '".$rpt."'
AND '".$rpt2."'
ORDER BY visiting_date
LIMIT 0 , 30";
$result = mysql_query($q);
$row_num = mysql_num_rows($result);
 while($row1 = mysql_fetch_array($result)) {
 echo "<tr><td width='50' align='center'>".$row1['v_id']."</td>";
 echo "<td width='200' align='center'>".$row1['visiting_date']."</td>";
 echo "<td width='200' align='center'>".$row1['visiting_time']."</td>";
  echo "<td width='200' align='center'>".$row1['out_time']."</td>";
 echo "<td width='200' align='center'>".$row1['vname']."</td>";
 echo "<td width='100' align='center'>".$row1['cont_no']."</td>";
 echo "<td width='100' align='center'>".$row1['deptname']."</td>";
 echo "<td width='200' align='center'>".$row1['cont_person']."</td>";
 echo "<td width='200' align='center'>".$row1['vcompname']."</td>";
 echo "<td width='200' align='center'>".$row1['status']."</td>";
 
 $contno=$row1['cont_no'];
 echo "<td width='200' align='center'>" ?>  
  <img width="100"  height="70" src="getImage.php?contno='<?php echo $contno; ?>'"/> 
  <?php "</td>";
 echo "<td> <a href='edit.php?id=".$row1['Barcode']."'>EDIT</a></td></tr>";
 } 
?>    
</table></div>
</fieldset> 

<b><font size="2" color="#333333" style="float:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Record: <?php  echo $row_num;?></font></b>
<a href="date_print.php" title="Report" style="float:right" class="toplinks"><b><font size="2" color="#333333"><img height="20" width="20" src="../../image/xl.png"/>Get Record</font></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<br><br><br><br><br><br><br><br>
	<?php include('../../fotter.php')?>
	</div>
</div>
</body>
</html>

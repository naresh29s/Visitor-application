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
<div id="container">
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
	<div class="heading">
			<div class="toplinks1" style="width:100%; height:30px; "><a href="#" ><center>--DateWise_Report--</center></a></div>			
	</div>
	<center>
	<table width="90%" height="100%" border="0px" class="toplinks">
	<tr valign="top">
	<td width="76%" align="left"><a href="../../employee.php">&nbsp;&nbsp;&nbsp;Home</a></td>
	<td width="14%" align="right"><a href="../../logout.php"><?php echo $_SESSION['UNAME'];?>_Logout</a></td>
	</tr>
	</table>
	</center>
	



<!--div style="width:900px; height:12px; margin:auto"><a href="../vmsreport.php"><h3>Back</h3></a></div-->


<table width="962" height="369" border="0" align="center" bordercolordark="#990000">
<tr>
<td>
<fieldset>
<legend><h3><b>DateWise</b></h3></legend>
<div style= "overflow-y:auto; width:950px;height:300px; background:#FFFFFF">
<table bgcolor="white" style="width:900px;" align="center" > 
<tr align="center">
<th width="61" >Pass_ID</th>
<th width="83">Date</th>
<th width="40">Time</th>
<th width="70" >Name</th>
<th width="79">Mobile_No</th>
<th width="87">DeptName</th>
<th width="83">Cont_Person</th>
<th width="68">Company</th>
<th width="99">Status</th>
<th width="112">image </th>
<th width="70">Action</th>
</tr>                                              

<?php 

include('../../db_con.php');
//$q = "select * from visiting_details where visiting_date between '".$rpt."' and '".$rpt2."' order by visiting_date";
$name_emp=$_SESSION['UNAME'];
//echo $name_emp;
$q = "SELECT *
FROM visiting_details a, master_visitor b
WHERE a.cont_person='".$name_emp."' 
AND a.cont_no = b.cont_no
AND visiting_date
BETWEEN '".$rpt."'
AND '".$rpt2."'
ORDER BY visiting_date
LIMIT 0 , 30";
$result = mysql_query($q);
$row_num = mysql_num_rows($result);
 while($row1 = mysql_fetch_array($result)) {
 echo "<tr align='center'><td  align='center'>".$row1['v_id']."</td>";
 echo "<td align='center'>".$row1['visiting_date']."</td>";
 echo "<td  align='center'>".$row1['visiting_time']."</td>";
 echo "<td  align='center'>".$row1['vname']."</td>";
 echo "<td align='center'>".$row1['cont_no']."</td>";
 echo "<td  align='center'>".$row1['deptname']."</td>";
 echo "<td  align='center'>".$row1['cont_person']."</td>";
 echo "<td align='center'>".$row1['vcompname']."</td>";
 echo "<td align='center'>".$row1['status']."</td>";
 
 $contno=$row1['cont_no'];
 echo "<td  align='center'>" ?>  
  <img width="100"  height="70" src="getImage.php?contno='<?php echo $contno; ?>'"/> 
  </td>
  <td><a href="update.php?bc=<?php echo $row1['Barcode']?>&page=datewiserpt&date=<?php echo $row1['visiting_date'];?>&status=IN&name=<?php echo $row1['vname']?>&cont_no=<?php echo $row1['cont_no'];?>"><img title="Allow" src="../../visitorimage/url39.jpg" height="20px" width="20px" /></a>
  &nbsp;
  <a href="update.php?bc=<?php echo $row1['Barcode']?>&page=datewiserpt&date=<?php echo $row1['visiting_date'];?>&status=Dont_allow&name=<?php echo $row1['vname']?>&cont_no=<?php echo $row1['cont_no'];?>"><img title="Do not Allow" src="../../visitorimage/DeleteRed.png" height="20px" width="20px" />
  </td>
 </tr>
 <?php
 } 
?>    
</table></div>
</fieldset> 
</td></tr>
<table width="90%" align="center">
<tr><td align="left">
<b><font size="2">Total Record: <?php  echo $row_num;?></font></b></td>
<td align="right"><a href="../vmsreport.php" style="float:right"><img src="../../visitorimage/back.gif" width="40px" height="30px" /></a></td></tr>
</table>
</td></tr></table>

<?php
//code for popup...............................................................
$count=0;
$p=0;
mysql_select_db($dbid) or die("unable to connect");

$name=$_SESSION['UNAME'];

$data = mysql_query("select * from popup_at_emp where cont_person='$name'");

while ($row = mysql_fetch_assoc($data))
{

$name1 = $row['name'];
$no = $row['mob_no'];
$st=$row['status'];
$count++;
$p++;
}
if($p>0)
{
echo "<script type='text/javascript'>alert('$count person is waiting for you ....visit dashbord' );</script>";
echo "<script> 
</script>";
}
$sql2="DELETE FROM popup_at_emp where cont_person='$name' ";

$retval1 = mysql_query( $sql2);
if(! $retval1 )
{
  die('Could not enter data: ' . mysql_error());
}

header("Refresh:600");
?>

<br><br><br><br><br><br><br>
			<?php include('../../fotter.php')?>

</div>
</body>
</html>

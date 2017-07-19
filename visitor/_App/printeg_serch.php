<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  
session_start();
date_default_timezone_set('Asia/Kolkata');
echo "<html> <head></head>";
 include 'config.php';
  $v= $_SESSION['barcode'];
 $sq="Select * from visiting_details where `Barcode`='".$v."'";
 $rs = mysql_query($sq);
 $row = mysql_fetch_array($rs);
 $_SESSION['contno']=$row['cont_no'];
 
/* $sql2="select * from validitydate where cont_no='".$v."'";
 $rs2=mysql_query($sql2);
 $row2=mysql_fetch_array($rs2);
 //echo "<form method='GET'>";*/
 ?>
<HTML lang="en"><HEAD>

<TITLE>Print Visitor card </TITLE>
<META content=IE=7 http-equiv=X-UA-Compatible>
<META content="text/html; charset=Windows-1252" http-equiv=Content-Type>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="cardstyle.css" />
<link rel="stylesheet" type="text/css" href="barcode_font.css" />
<!--<script type="text/javascript">
function hidestuffandprint(){
document.getElementById('header').style.display='none';
document.getElementById('footer').style.display='none';
setTimeout("print()",1000);
}

</script>-->

<script type="text/javascript">
	function printF(printable) {
	var DocumentContainer = document.getElementById(printable);
    /*var WindowObject = window.open('', "PrintWindow", "width=800,height=600,top=200,left=200,toolbars=no,scrollbars=no,status=no,resizable=no");*/
	var WindowObject = window.open('', 'PrintWindow', 'width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes');
    WindowObject.document.writeln(DocumentContainer.innerHTML);
    WindowObject.document.close();
    WindowObject.focus();
    WindowObject.print();
    WindowObject.close();
}
</script>

<!--	<script type="text/javascript">
function printF(printable)
{
var a = window.open ('', '',"status=1,scrollbars=1, width=760,height=800");
a.document.write(document.getElementById(printable).innerHTML);
a.document.close();
a.focus();
a.print();
a.close();
}
</script>-->

<!--<style>
@media print{
.noprint { display:none}
}
</style>-->
<style>
FONT
{
 font-size:small;
}

label
{
font-size:11px;
}
#span1
{ 
background-color: #DDD; width: 25px; float: right; height:100%; 
}
#rotate {
     -moz-transform: rotate(90.0deg);  /* FF3.5+ */
       -o-transform: rotate(90.0deg);  /* Opera 10.5 */
  -webkit-transform: rotate(90.0deg);  /* Saf3.1+, Chrome */
             filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
         -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
</style>

<META name=GENERATOR content="MSHTML 9.00.8112.16446">
<style type="text/css">
.verticaltext{
font: bold 13px Arial;
width: 15px;
writing-mode: tb-rl;
}
</style>
</HEAD>
<BODY class="Extravaganza page-view2" >

<div id="printable">
<TABLE>
 <TR>
  <TD><DIV style="padding: 10px; text-align:left; margin:10px; width:350px; font-size: 1.0em; top:10%; 1left:10%; border:1px solid #d1d1d1" >
   <TABLE style="border-collapse:collapse; border: 0px solid black;">
    <TR>
     <TD align=center colspan="2">
     <DIV id=hgt_abv_back style="float:inherit; height:18px; width:350px;margin:auto;"><strong><font size="3">AXIS BANK</font></strong></DIV> 
	 </TD>
    </TR>
    <TR>
     <TD align="left" valign="top" width="200px">
	 
	 <TABLE>
	 <TR><TD width="50px"><FONT style="font-size:11px;"><B>Visitor_ID:  </B></FONT></TD>
	     <TD width="150px"><FONT style="font-size:11px;"><?php  echo $row['v_id'];//printf("%04d",$row['v_id']);?></FONT></TD></TR>
	 <TR><TD><FONT style="font-size:11px;"><B>Name: </B></FONT></TD>
	     <TD><FONT style="font-size:11px;"><?php echo $row['vname'];?></FONT></TD></TR>
     <TR><TD><FONT style="font-size:11px;"><B>Mobile_No: </B></FONT></TD>
	     <TD><FONT style="font-size:11px;"><?php echo $row['cont_no'];?></FONT></TD></TR>
	 <TR><TD><FONT style="font-size:11px;"><B>Dept: </B></FONT></TD>
	     <TD><FONT style="font-size:11px;"><?php echo $row['deptname'];?></FONT></TD></TR>
	 <TR><TD valign="top"><FONT style="font-size:11px;"><B>Person: </B></FONT></TD>
	     <TD><FONT style="font-size:11px;"><?php echo $row['cont_person'];?></FONT></TD></TR>
	 <TR><TD><FONT style="font-size:11px;"><B>Purpose: </B></FONT></TD>
	     <TD><FONT style="font-size:11px;"><?php echo $row['reason'];?></FONT></TD></TR>
	 </TABLE>
	 </TD>
	 <TD valign="top" width="150px"><div style="vertical-align:top; margin-bottom:3px;">
	 <img width="95px"  height="63px" src="getImage.php?contno='<?php echo $row['cont_no']; ?>'"/>
	 </div>
	 <div style="vertical-align:top; margin-bottom:3px">
	 <FONT style="font-size:11px;"><B>Valid_upto:</B></FONT>
	 <FONT style="font-size:11px;"><?php
	 
	echo $v1=$row['cont_no'];
	 	$sq1="Select todate from validitydate where `cont_no`='".$v1."'";
 $rs1 = mysql_query($sq1);
$row1 = mysql_fetch_array($rs1);
$date_up_to=$row1['todate'];
 $date_up_to=$row1["todate"];
echo $date_up_to;
	 
	 
//	$q1 = "select * from preference where cont";
	//$rs = mysql_query($q1);
	//$row=mysql_fetch_array($rs);
	//$a=$row['need_user_approval'];
	 	 	//$dateTime = new DateTime($row['visiting_date']);
	  		//$date = date_format($dateTime,"d/m/Y");
	  		 //echo $date;?></FONT></div>
	 <div style="vertical-align:top;text-align:left;"><font style="font-size:10px;">
	 <FONT style="font-size:11px;"><B>Print: </B></FONT>
	 <FONT style="font-size:11px;"><?php //echo date('d/m/y H:i');
	 echo date('H:i:s');?></FONT></div>
	 </TD>
	 </TR>
	 <TR><TD valign="top" colspan="2">
	 <FONT style="font-size:11px;">&nbsp;<B>Company: </B></FONT>
	 <FONT style="font-size:11px;">&nbsp;&nbsp;<?php echo $row['vcompname'];?></FONT></TD></TR>
	 <TR>
	   <TD height="57" class="logo" colspan="2" align="center" >&nbsp;&nbsp;&nbsp;&nbsp;*<?php echo $row['Barcode']?>*
	 </TD>
	 </TR>
  </TABLE>
 </DIV>
  
  </TD>
 </TR>
 
</TABLE>


</div>
</DIV>

  <center></center>
<?php echo "</form></html> "?>
<br />
<br />
<br />
<br />
<div class="noprint">

<table width="265" height="124" id=outer>
 <tr><td width="119" align="left" valign="top">
   <a href="../vms.php".php"><img src="../visitorimage/B_butt.png" width="115" height="31" ></a></td>
  <?php 
 
  $_SESSION['contno']= $row['cont_no']; ?>
  <td width="0"></td>
  <td width="36" align="right" valign="top">
<a href="#"  onClick="printF('printable')"><img src="print-icon.png"></a>  </td>
  <td width="0"></td>
  <td width="117" align="right" valign="top">
  <a href="../_App/validate_visitor.php"><img src="../visitorimage/validat.png" width="115" height="31" ></a>
</td>
 </tr>
</table>
</div>
 
</BODY>
</HTML>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  
session_start();
date_default_timezone_set('Asia/Kolkata');
echo "<html> <head></head>";
 include('../db_con.php');
  $v= $_SESSION['cont_barcode'];
 $sq="Select * from conteractor_pass_information where `Barcode`='".$v."'";
 $rs = mysql_query($sq);
 $row = mysql_fetch_array($rs);
 $_SESSION['contno']=$row['cont_no'];
 $v1=$row['cont_no'];
 ?>
 <?php $_SESSION['contno']=$row['cont_no']; ?>
<HTML lang="en"><HEAD>
<TITLE>contractor pass</TITLE>
<META content=IE=7 http-equiv=X-UA-Compatible>
<META content="text/html; charset=Windows-1252" http-equiv=Content-Type>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet"  type="text/css">
<script type="text/javascript">
	function printF(printable) {
	var DocumentContainer = document.getElementById(printable);
	var WindowObject = window.open('', 'PrintWindow','width=550,height=250,location=yes');
    WindowObject.document.writeln(DocumentContainer.innerHTML);
   //WindowObject.document.close();
    //WindowObject.focus();
    //WindowObject.print();
    //WindowObject.close();
}
</script>
<META name=GENERATOR content="MSHTML 9.00.8112.16446">
</HEAD>
<BODY class="Extravaganza page-view2" >
<div id="printable">
<table width="274"  style="margin-top:-15px; margin-left:-10px; font-size:12px;font:Arial, Helvetica, sans-serif">
<tr><td width="79" rowspan="3"><img width="79"  height="58" src="getImage.php?contno='<?php echo $row['cont_no']; ?>'"/></td>
<td width="185" height="20" colspan="3"><b><?php echo $row['v_comp_name'];?></b></td>
</tr>
<tr><td height="20" colspan="3"><?php echo $row['v_comp_add'];?></td>
</tr>
<tr><td height="20" colspan="3"><?php echo $row['v_comp_cont'];?></td>
</tr>
</table>
<table width="275" border="0px" style="margin-left:-10px; font-size:8px; font-size:11px;font:Arial, Helvetica, sans-serif">
<tr><td colspan="4"><b>Name:&nbsp;</b><?php echo "".$row['sname']." ".$row['fname']." ".$row['lname']."";?></td></tr>
<tr><td width="43" ><b>Design:</b></td>
<td width="60"><?php echo $row['designattion'];?></td>
<td width="76"><b>Id:</b></td>
<td width="78"><?php echo $row['cont_v_id'];?></td>
</tr>
<tr><td ><b>DOB:</b></td><td><?php echo $row['dob'];?></td><td><b>No:</b></td><td><?php echo $row['cont_no'];?></td></tr>
<tr><td colspan="1"><b>Site:</b></td><td colspan="3"><?php echo $row['v_site'];?></td></tr>
<tr><td height="20" ><b>Dept:</b></td>
<td><?php echo $row['dept'];?></td><td><b>V_Upto:</b></td><td width="78"><?php echo date('d/m/Y',strtotime($row['end_date']));?></td>
</tr>
</table>
<br><br>
<br><br>
<table border="0px" width="276" style="margin-left:-10px;font-size:8px; font-size:11px;font:Arial, Helvetica, sans-serif">
<tr><td width="125"><b>Resi Address:</td>
<td width="141"><?php echo $row['resi_add'];?></td>
</tr>
<tr><td><b>Narive Address:</td><td><?php echo $row['native_add'];?></td></tr>
<tr><td><b>Phone No:</td><td><?php echo $row['tel_no'];?></td></tr>
<tr><td><b>Emergency Cont Name:</td><td><?php echo $row['emr_cont_per'];?></td></tr>
<tr><td><b>Emergency Cont No:</td><td><?php echo $row['emr_cont_no'];?></td></tr>
</table>
</div>
</DIV>
  <center></center>
<?php echo "</form></html> "?>
<br />
<br />
<br />

<div class="noprint">
<table width="265" height="124" id=outer>
 <tr><td width="119" align="left" valign="top">
   <a href="vms_cont.php"><img src="../visitorimage/B_butt.png" width="115" height="31" ></a></td>
  <td width="0"></td>
  <td width="36" align="right" valign="top">
<a href="#"  onClick="printF('printable')"><img src="../_App/print-icon.png"></a>  </td>
  <td width="0"></td>
  <td width="117" align="right" valign="top">
  <a href="#"><img src="../visitorimage/validat.png" width="115" height="31" ></a>
</td>
 </tr>
</table>
</div>
 
</BODY>
</HTML>

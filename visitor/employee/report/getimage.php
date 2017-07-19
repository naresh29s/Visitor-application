<?php
//session_start();
//$contno = $_SESSION['contno'];
// do some validation here to ensure id is safe
//echo $contno;
$contno = $_GET['contno'];
$link = mysql_connect("localhost", "root", "");
mysql_select_db("visitor");
$sql = "SELECT image FROM master_visitor WHERE cont_no=$contno";
$result = mysql_query("$sql");
$row = mysql_fetch_assoc($result);
mysql_close($link);

header("Content-type: image/jpeg");
echo base64_decode($row['image']);

?>
<?php
session_start();
$contno = $_SESSION['contno'];
// do some validation here to ensure id is safe
//include('../db_con.php');
$link = mysql_connect("localhost", "root", "");
mysql_select_db("visitor");
$sql = "SELECT * FROM conteractor_pass_information WHERE cont_no='$contno'";
$result = mysql_query("$sql");
$row = mysql_fetch_assoc($result);
//mysql_close($link);
header("Content-type: image/jpeg");
echo base64_decode($row['image']);
//echo $row['cont_v_id'];

?>
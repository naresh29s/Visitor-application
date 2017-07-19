<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect("localhost", "root", "")or die("cannot connect"); 
mysql_select_db('visitor')or die("can not select data base");
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$sql2="DELETE FROM preference";
$retval1 = mysql_query( $sql2);
if(! $retval1 )
{
  die('Could not enter data: ' . mysql_error());
}
 $r=$_POST['app'];
 $g=$_POST['sms'];
 $msg=$_POST['msg'];
//$sql="INSERT INTO employee (name,password)VALUES('$_POST[uname]','$_POST[password]')";
$sql="INSERT INTO preference(need_user_approval,sent_sms,sms)VALUES('{$r}','{$g}','{$msg}')";
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
mysql_close($conn);
echo "<script> alert('Privalages has change to....... approval:$r and sent_sms:$g ');
window.location.href='../privileges.php';
</script>";
mysql_close($conn);

?>
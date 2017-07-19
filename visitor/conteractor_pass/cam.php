<?php
session_start();
//include 'connection.php';
include('../db_con.php');
?>
<?php

if(isset($_SESSION['myvarname']))
  {
 	$a=$_SESSION['myvarname'];
	$_SESSION['myvarname']=$_SESSION['myvarname']+1;
  }
  else{
  $_SESSION['myvarname']=1;
  }
?>
<?php
$resep= $_SESSION['UNAME'];
//$name =naresh.$a;
$date = date('YmdHis');
$name=$resep.$date;
$newname="images/".$name.".jpg";
$file = file_put_contents( $newname, file_get_contents('php://input') );
if (!$file) {
	print "ERROR: Failed to write data to $filename, check permissions\n";
	exit();
}

//deleate data........................................................


$sql2="DELETE FROM img where name like '$resep%'";

$retval1 = mysql_query( $sql2, $conn );
if(! $retval1 )
{
  die('Could not enter data: ' . mysql_error());
}
//add image data..........................................................

$b=1;
$img = chunk_split(base64_encode(file_get_contents("C:\\wamp\\www\\visitor\\conteractor_pass\\images\\".$name.".jpg")));
$sql = "insert into img (`id`,`name`,`image`) values ('{$b}','{$name}','{$img}')";

$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}



$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $newname;
print "$url\n";

?>

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

//echo $_POST[code];
$name=$_POST['uname'];
//$sql="INSERT INTO employee (name,password)VALUES('$_POST[uname]','$_POST[password]')";
//echo $_POST[mob_no];
$sql="INSERT INTO user (aa_id,uname,pswd,mob_no)VALUES('$_POST[code]','$_POST[uname]','$_POST[password]','$_POST[mob_no]')";


$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}


/*$sql2="CREATE TABLE IF NOT EXISTS `$_POST[uname]` (
  `visiting_id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `v_id` tinyint(4) unsigned zerofill DEFAULT NULL,
  `vname` varchar(45) DEFAULT NULL,
  `cont_no` decimal(12,0) DEFAULT NULL,
  `deptname` varchar(30) DEFAULT NULL,
  `cont_person` varchar(30) DEFAULT NULL,
  `visiting_date` date DEFAULT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `vcompname` varchar(30) DEFAULT NULL,
  `Barcode` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`visiting_id`),
  KEY `cont_no` (`cont_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26" ;
$retval2 = mysql_query( $sql2, $conn );
if(! $retval2 )
{
  die('Could not create table: ' . mysql_error());
}*/


echo "<script> alert('1 record of $name is Added');
window.location.href='..//add_emp.php';
</script>";
mysql_close($conn);
//header("Location: http:..//add_emp.php");

?> 
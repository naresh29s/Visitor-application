<?php 
session_start(); 
?>
<?php $con=mysql_connect("localhost","root","");

if (!$con){
  die('Could not connect:' . mysql_error());
  }
mysql_select_db("visitor", $con);
$q = mysql_query('SELECT MAX(v_id) as v_id from `master_visitor`');
$row = mysql_fetch_assoc($q);
$h=$row['v_id'];
$vid = $row['v_id'] + 1;
mysql_close($con);
?>


<?php

date_default_timezone_set('Asia/Kolkata');

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="visitor"; // Database name
$tbl_name="master_visitor"; // Table name

//Connect to server and select database.

mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
/*
 $data = mysql_query("SELECT * FROM img") or die(mysql_error());  
$info = mysql_fetch_array( $data );
$id=$info['id'];
$name= $info['name'];

*/
//echo $name;

//if ($_POST && !empty($_FILES)) {
	$formOk = true;
     
	//Assign Variables
	$_SESSION['contno']=$_POST['contno'];
	//$vid=$_POST['vid'];
	$sname=$_POST['sname'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$contno=$_POST['contno'];
	$dept=$_POST['dept'];
	$tomeet=$_SESSION['UNAME'];
	$vcompnm=$_POST['compnm'];
	$vcompadd=$_POST['compadd'];
    $vcompcont=$_POST['compcont'];
	$vreason=$_POST['reason'];
	//$vfor=$_POST['for'];
	$date=date('dmy'.$_POST['vid'].'Gis');
	$_SESSION['barcode']=$date;
	$d1=$_POST['date3'];
	$time=$_POST['time'];
	$_SESSION['time_of_apint']=$time;
	$_SESSION['date_of_apint']=$d1;
	$e_id=$_POST['e_id']; 
	$date;
	$name='DELETE';
	$img = chunk_split(base64_encode(file_get_contents("C:\\wamp\\www\\visitor\\image\\".$name.".PNG")));
	
	/*$path=$_FILES['image']['tmp_name'];
	echo $path;
	$type = $_FILES['image']['type'];
	
	if ($_FILES['image']['error'] )
	 {
		$formOk = false;
		echo "Error: Error in uploading file..";
	}
	if(!is_uploaded_file($path))
	{
		$formOk = false;
		echo "Error: Error in uploading file. Please try again.";
	}
	//check file extension
	if ($formOk && !in_array($type, array('image/png', 'image/x-png', 'image/jpeg', 'image/pjpeg', 'image/gif'))) {
		$formOk = false;
		echo "Error: Unsupported file extension. Supported extensions are JPG / PNG.";
	}
	// check for file size.
	if ($formOk && filesize($path) > 500000) {
		$formOk = false;
		echo "Error: File size must be less than 500 KB.";
	}*/

	if ($formOk) 
	{
		// read file contents
		//$content = file_get_contents($path);
       
		//connect to mysql database
		if ($conn = mysqli_connect('localhost', 'root', '', 'visitor'))
		{	
			$c=0;		
		 //$content = mysqli_real_escape_string($conn, $content);
			$q1 = "select * from advance_visitor";
			$rs = mysql_query($q1);
	
			while($row=mysql_fetch_array($rs))
			{
			$a=$row['cont_no'];
			//echo $a;
				if($a==$contno)
				{
				$c++;
				//echo $a;
				}
			}
			if($c>0)
			{
			$sq1 = "update advance_visitor set v_id='$vid',sname='$sname',fname='$fname',lname='$lname',e_id='$e_id',cont_no='$contno',deptname='$dept',cont_person='$tomeet',frmdate='$d1',time='$time',vcompname='$vcompnm',vcomadd='$vcompadd',cont_no_person='$vcompcont',reason='$vreason',barcode='$date',image='img' where cont_no=$contno";
			$row1=mysql_query($sq1);
			 //echo 'MySQL Error: ' . mysql_error();
				if(! $row1 )
					{
			 		echo 'MySQL Error: ' . mysql_error();
  					die(mysql_error());
					}
			}
			else
			{		
			$sq = "insert into advance_visitor (v_id,sname,fname,lname,e_id,cont_no,deptname,cont_person,frmdate,time,vcompname,vcomadd,cont_no_person,reason,barcode,image) values ('{$vid}','{$sname}','{$fname}', '{$lname}','{$e_id}', '{$contno}', '{$dept}', '{$tomeet}', '{$d1}', '{$time}', '{$vcompnm}', '{$vcompadd}', '{$vcompcont}', '{$vreason}', '{$date}','{img}')";
			$row=mysql_query($sq);
			 //echo 'MySQL Error: ' . mysql_error();
			if(! $row )
			{
			 echo 'MySQL Error: ' . mysql_error();
  			die(mysql_error());
			}
			}
			
			
	}
}

?>

<?php
//}
$_SESSION['contno']=$_POST['contno'];
//$_SESSION['barcode']= $date;

echo "<script> alert('1 record Added');
window.location.href='advance_pass.php';
</script>";


// close connection
mysql_close();
 ?>
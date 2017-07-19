<?php 
session_start(); 
include('db_con.php');
$con=$link;
$q = mysql_query('SELECT MAX(v_id) as v_id from `master_visitor`');
$row = mysql_fetch_assoc($q);
$vid = $row['v_id'] + 1;

$data = mysql_query("SELECT * FROM img") or die(mysql_error());  
$info = mysql_fetch_array( $data );
$id=$info['id'];
$name= $info['name'];

//echo $name;

if ($_POST) {
	$formOk = true;
     
	//Assign Variables
	$_SESSION['contno']=$_POST['contno'];
	//$vid=$_POST['vid'];
	$sname=$_POST['sname'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$contno=$_POST['contno'];
	$dept=$_POST['dept'];
	$tomeet=$_POST['emp'];
	$vcompnm=$_POST['compnm'];
	$vcompadd=$_POST['compadd'];
    $vcompcont=$_POST['compcont'];
	$vreason=$_POST['reason'];

	//$vfor=$_POST['for'];
	$date=date('dmy'.$_POST['vid'].'Gis');
	$_SESSION['barcode']= $date;
	 $d1=$_POST['date3'];
	 $d2=$_POST['date4'];
	$time=date('H:i:s');
	
	//$name=naresh1;
	//$img = chunk_split(base64_encode(file_get_contents("C:\\wamp\\www\\images\\".$name.".jpg")));
	//....................get image data............................................................................
	$name=$_SESSION['UNAME'];
	$sql = "SELECT * FROM img WHERE name like '$name%'";
	$result = mysql_query("$sql");
	$row = mysql_fetch_assoc($result);
	$img=$row['image'];
	//$img=addslashes(@file_get_contents($row['image']));
	//echo $img;
	
	if(! $row )
	{
  	die('Could not enter data: ' . mysql_error());
	}
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
		if ($con)
		 {	
		 //$content = mysqli_real_escape_string($conn, $content);
			
		    $sql1 = "insert into master_visitor (`v_id`,`sname`,`fname`,`lname`,`cont_no`,`passid_issue_date`,`image`) values ('{$vid}','{$sname}','{$fname}', '{$lname}', '{$contno}', '{$d1}', '{$img}')";
			
					
		$row=	mysql_query($sql1);
				if($row>0)
				{
				$uploadOk = true;
				//$imageId = mysql_insert_id($con);
				} 
				else 
				{
				echo "Error: Could not save the data to mysql database. Please try again.". mysql_error();
				}
			/*$sql3 = " insert into visitor_company (vcompname, vcompadd, vcompcont, cont_no, for) values ('{$vcompnm}','{$vcompadd}','{$vcompcont}', '{$contno}','{$vfor}')";
			$row3=	mysqli_query($conn,$sql3);*/
			
            $sql2= " insert into validitydate (`cont_no`,`frmdate`,`todate`,`deptname`,cont_person) values ('{$contno}','{$d1}','{$d2}','{$dept}','{$tomeet}')";
			$row2= mysql_query($sql2);
		
		     $sql3="INSERT INTO `visitor_company` (`vcompname`,`vcompadd`,`vcompcont`,`cont_no`,`reason`)VALUES ('{$vcompnm}','{$vcompadd}','{$vcompcont}','{$contno}','{$vreason}')";
			/*$sql= " insert into visitor_company (vcompname,vcompadd,vcompcont,cont_no,reason,for) values ('{$vcompnm}','{$vcompadd}','{$vcompcont}','{$contno}','{$vfor}')";*/
			 $row3= mysql_query($sql3);
			
			
	$q1 = "select * from preference";
	$rs = mysql_query($q1);
	$row=mysql_fetch_array($rs);
	$a=$row['need_user_approval'];
	//echo $a;
			if($a=='YES')
			{
	$sql4 = "insert into visiting_details (`v_id`,`vname`,`cont_no`,`deptname`,`cont_person`,`reason`,`vcompname`,`visiting_date`,`visiting_time`,`Barcode`,`status`) values ('{$vid}','".$sname." ".$fname." ".$lname."','{$contno}', '{$dept}', '{$tomeet}', '{$vreason}','".$vcompnm.", ".$vcompadd."', '{$d1}','{$time}','".$date."','WAITING')";
		$row4=	mysql_query($sql4)or die(mysql_error());	
		$sql6 = "insert into popup_at_emp(`name`,`mob_no`,`status`,`cont_person`) 
		values ('".$sname." ".$fname." ".$lname."','{$contno}','WAITING','{$tomeet}')";
		$row6=	mysql_query($sql6);
			}
			else
			{
	$sql4 = "insert into visiting_details (`v_id`,`vname`,`cont_no`,`deptname`,`cont_person`,`reason`,`vcompname`,`visiting_date`,`visiting_time`,`Barcode`,`status`) values ('{$vid}','".$sname." ".$fname." ".$lname."','{$contno}', '{$dept}', '{$tomeet}', '{$vreason}','".$vcompnm.", ".$vcompadd."', '{$d1}','{$time}','".$date."','IN')";
		$row4=	mysql_query($sql4);	
			}
			 
		
		//ata adding to the individual employee table..............................................................
		/*$sql5 = "insert into $tomeet(`v_id`,`vname`,`cont_no`,`deptname`,`cont_person`,`reason`,`vcompname`,`visiting_date`,`Barcode`,`status`) values ('{$vid}','".$sname." ".$fname." ".$lname."','{$contno}', '{$dept}', '{$tomeet}', '{$vreason}','".$vcompnm.", ".$vcompadd."', '{$d1}','".$date."','WAITING')";
		$row5=	mysqli_query($conn,$sql5);
		*/
		
		
		//..........................................sms code................................................................................
	$q13 = "select * from preference";
	$rs3 = mysql_query($q13);
	$row3=mysql_fetch_array($rs3);
	$a=$row3['sent_sms'];
	$msge=$row3['sms'];
	
	$rep = ' ';
	$by   = '+';
	$in   = $msge;
	$msg1  = str_replace($rep, $by, $in);
	$rep1 = '$name';
	$by1   = '+'.$sname.'+'.$fname.'+'.$lname.'+';
	$in1   = $msg1;
	$msg2  = str_replace($rep1, $by1, $in1);
	$rep2 = '$contect';
	$by2   = '+'.$contno.'+';
	$in2   = $msg2;
	$msg  = str_replace($rep2, $by2, $in2);
	
	echo "<script> alert($msg $a);</script>";

	
			if($a=='YES')
			{
	$q12 = "select * from user where uname='$tomeet'";
	$rs2 = mysql_query($q12);
	$row1=mysql_fetch_array($rs2);
	$no=$row1['mob_no'];
		
	//$no='9821268164';
	//$msg='+'.$sname.'+'.$fname.'+'.$lname.'+is+waiting+to+see+you';
	$url = 		"http://vas.mobilogi.com/API/WebSMS/Http/v1.0a/index.php?username=naresh29sanodariya&password=naresh123&sender=KMESEM&to=9821268164&message=hitoallS&reqid=1&format={json|text}&route_id=25&callback=<Any Callback URL>&unique=0&sendondate=21-09-2013T11:17:11 ";
	$ch = curl_init($url);
	//to chek curl seting just go to ini configuration file and remove ';' in front of the curl and enabal from menue by clicking in wamp buttoun and php/php extention
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION , 1); // TRUE
	curl_setopt($ch, CURLOPT_HEADER ,0); // DO NOT RETURN HTTP HEADERS
	curl_setopt($ch, CURLOPT_RETURNTRANSFER ,1); // RETURN THE CONTENTS OF THE CALL
	$results = curl_exec($ch);	
			}
			
		
		
		} 
		else 
		{
			echo "Error: Could not connect to mysql database. Please try again.";
		}
	}
}
$_SESSION['contno']=$_POST['contno'];



 
 ?>
 
 
 
 
 <?php

function deleteDir($dir) {
   // open the directory
   $dhandle = opendir($dir);

   if ($dhandle) {
      // loop through it
      while (false !== ($fname = readdir($dhandle))) {
         // if the element is a directory, and
         // does not start with a '.' or '..'
         // we call deleteDir function recursively
         // passing this element as a parameter
         if (is_dir( "{$dir}/{$fname}" )) {
            if (($fname != '.') && ($fname != '..')) {
               //echo "<u>Deleting Files in the Directory</u>: {$dir}/{$fname} <br />";
               //deleteDir("$dir/$fname");
            }
         // the element is a file, so we delete it
         } else {
            //echo "Deleting File: {$dir}/{$fname} <br />";
            unlink("{$dir}/{$fname}");
         }
      }
      closedir($dhandle);
    }
   // now directory is empty, so we can use
   // the rmdir() function to delete it
   //echo "<u>Deleting Directory</u>: {$dir} <br />";
  // rmdir($dir);
}


deleteDir("images");

echo "<script> alert('1 record Added');
window.location.href='_App/printeg_add.php';
</script>";
?>
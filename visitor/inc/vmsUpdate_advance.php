<?php 
include('../db_con.php');
$q = mysql_query('SELECT MAX(v_id) as v_id from `master_visitor`');
//$q1 = mysql_query('SELECT MAX(v_id) as v_id from `advance_visitor`');
$row = mysql_fetch_assoc($q);
//$row1 = mysql_fetch_assoc($q1);
//if($row['v_id']>$row1['v_id'])
//$next_auto_inc = $row['v_id'] + 1;
//else
$v_id= $row['v_id'] + 1;
//printf("%04d", $next_auto_inc);

?>



<?php 
session_start();
date_default_timezone_set('Asia/Kolkata');
$_SESSION['contno']=$_POST['contno'];


$data = mysql_query("SELECT * FROM img") or die(mysql_error());  
$info = mysql_fetch_array( $data );
$id=$info['id'];
$name= $info['name'];

	$vid=$v_id;
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
	$d1=$_POST['date3'];
	$d2=$_POST['date4'];
	$time=date('H:i:s');
	//$path=$_FILES['image']['tmp_name'];
	//$type = $_FILES['image']['type'];
	     
		 //$img = chunk_split(base64_encode(file_get_contents("C:\\wamp\\www\\images\\".$name.".jpg")));
		 //....................get image data............................................................................
		$name=$_SESSION['UNAME'];
		$sql = "SELECT * FROM img WHERE name like '$name%'";
		$result = mysql_query("$sql");
		$row = mysql_fetch_assoc($result);
		$img=$row['image'];
	
		//connect to mysql database
		if ($conn = mysqli_connect('127.0.0.1', 'root', '', 'visitor'))
		 {	
		 
		 $full=$sname." ".$fname." ".$lname;
		 $add_com=$vcompnm." , ".$vcompadd;
	
		  //$sql1 = "insert into visiting_details (v_id,vname,cont_no,deptname,cont_person,reason,vcompname,visiting_date,Barcode,status) values ('{$vid}','{$full}','{$contno}', '{$dept}', '{$tomeet}', '{$vreason}','{$add_com}', '{$d1}','".$date."','WAITING')";
		 
		 
		 
		 $q1 = "select * from preference";
	$rs = mysql_query($q1);
	$row=mysql_fetch_array($rs);
	$a=$row['need_user_approval'];
	echo $a;
			if($a=='YES')
			{
	$sql4 = "insert into visiting_details (`v_id`,`vname`,`cont_no`,`deptname`,`cont_person`,`reason`,`vcompname`,`visiting_date`,`visiting_time`,`Barcode`,`status`) values ('{$vid}','".$sname." ".$fname." ".$lname."','{$contno}', '{$dept}', '{$tomeet}', '{$vreason}','".$vcompnm.", ".$vcompadd."', '{$d1}','{$time}','".$date."','WAITING')";
		$row4=	mysqli_query($conn,$sql4);	
		$sql6 = "insert into popup_at_emp(`name`,`mob_no`,`status`,`cont_person`) 
		values ('".$sname." ".$fname." ".$lname."','{$contno}','WAITING','{$tomeet}')";
		$row6=	mysqli_query($conn,$sql6);
			}
			else
			{
	$sql4 = "insert into visiting_details (`v_id`,`vname`,`cont_no`,`deptname`,`cont_person`,`reason`,`vcompname`,`visiting_date`,`visiting_time`,`Barcode`,`status`) values ('{$vid}','".$sname." ".$fname." ".$lname."','{$contno}', '{$dept}', '{$tomeet}', '{$vreason}','".$vcompnm.", ".$vcompadd."', '{$d1}','{$time}','".$date."','IN')";
		$row4=	mysqli_query($conn,$sql4);	
			}

		 
		 
		 $q1 = "select * from master_visitor where cont_no='$contno'";
	$rs = mysql_query($q1);
	$row=mysql_fetch_array($rs);
	$a1=$row['v_id'];
	echo $a1;
		 
		 //$sql1 = "update visiting_details set v_id='$vid',vname='$full' ,cont_no='$contno',deptname='$dept',cont_person='$tomeet',reason='$vreason',vcompname='$add_com',visiting_date='$d1',Barcode='$date',status='WAITING' where cont_no='$contno'" ;
		 
		
if($a1>0)
{
$sq22 = "update master_visitor set sname='$sname', fname='$fname', lname='$lname', cont_no='$contno', passid_issue_date='$d1',image='$img' where cont_no='$contno'";
$row22=	mysql_query($sq22);
		if(! $row22 )
			{
  			die('Could not update data2222: ' . mysql_error());
			}
}
else
{
 $sql = "insert into master_visitor (v_id,sname,fname,lname,cont_no,passid_issue_date,image)values('{$vid}','{$sname}','{$fname}','{$lname}','{$contno}','{$d1}','{$img}')";
			
		$row=	mysql_query($sql);
		if(! $row )
			{
  			die('Could not update data2222: ' . mysql_error());
			}
}			
		   //$sql = "update master_visitor set sname='$sname', fname='$fname', lname='$lname', cont_no='$contno', passid_issue_date='$d1',image='$img' where cont_no='$contno'";
	
			
			 $sql2= " insert into validitydate (`cont_no`,`frmdate`,`todate`,`deptname`,cont_person) values ('{$contno}','{$d1}','{$d2}','{$dept}','{$tomeet}')";
			$row2= mysqli_query($conn,$sql2);
		if(! $row2 )
			{
  			die('Could not update data21212121: ' . mysql_error());
			}
		     $sql3="INSERT INTO `visitor_company` (`vcompname`,`vcompadd`,`vcompcont`,`cont_no`,`reason`)VALUES ('{$vcompnm}','{$vcompadd}','{$vcompcont}','{$contno}','{$vreason}')";
			/*$sql= " insert into visitor_company (vcompname,vcompadd,vcompcont,cont_no,reason,for) values ('{$vcompnm}','{$vcompadd}','{$vcompcont}','{$contno}','{$vfor}')";*/
			 $row3= mysqli_query($conn,$sql3);
			if(! $row3 )
			{
  			die('Could not update data3333: ' . mysql_error());
			}
			
			
			/*$sql4 = "insert into $tomeet(`v_id`,`vname`,`cont_no`,`deptname`,`cont_person`,`reason`,`vcompname`,`visiting_date`,`Barcode`,`status`) values ('{$vid}','".$sname." ".$fname." ".$lname."','{$contno}', '{$dept}', '{$tomeet}', '{$vreason}','".$vcompnm.", ".$vcompadd."', '{$d1}','".$date."','WAITING')";	
			$row4=	mysqli_query($conn, $sql4);
		if(! $row4 )
			{
  			die('Could not update data2222: ' . mysql_error());
			}
			*/
		
			
			$sql2="DELETE FROM advance_visitor where cont_no='$contno' ";

			$retval1 = mysql_query( $sql2);
		if(! $retval1 )
			{
  			die('Could not enter data: ' . mysql_error());
			}
			
			
			
		//..........................................sms_code................................................................................
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
	
	
	
			if($a=='YES')
			{
	$q12 = "select * from user where uname='$tomeet'";
	$rs2 = mysql_query($q12);
	$row1=mysql_fetch_array($rs2);
	$no=$row1['mob_no'];
			
	//$no='9821268164';
	//$msg='+'.$sname.'+'.$fname.'+'.$lname.'+is+waiting+to+see+you';
	$url = 		"http://vas.mobilogi.com/API/WebSMS/Http/v1.0a/index.php?username=faisal&password=pass1234&sender=KMESEM&to=$no&message=$msg&reqid=1&format={json|text}&route_id=25&callback=<Any Callback URL>&unique=0&sendondate=21-09-2013T11:17:11 ";
	$ch = curl_init($url);
	//to chek curl seting just go to ini configuration file and remove ';' in front of the curl and enabal from menue by clicking in wamp buttoun and php/php extention
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION , 1); // TRUE
	curl_setopt($ch, CURLOPT_HEADER ,0); // DO NOT RETURN HTTP HEADERS
	curl_setopt($ch, CURLOPT_RETURNTRANSFER ,1); // RETURN THE CONTENTS OF THE CALL
	$results = curl_exec($ch);	
			}
			
			
			

			
			//	if($row1>0){
				//$uploadOk = true;
				
       // $sql= " update validitydate set cont_no='".$contno."',frmdate='".$d1."',todate='".$d2."' where cont_no='".$contno."'";            
		//	$row= mysqli_query($conn,$sql);
			
		
							//} 
							//else
							 //{
			//echo "Error: Could not connect to mysql database. Please try again.";
							//}
	
 }
  $_SESSION['barcode']=$date; 
 echo " <script> window.location.href='../_App/printeg_add.php';alert('1 record updated');</script>";
                                        
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


deleteDir("..//images");

?>
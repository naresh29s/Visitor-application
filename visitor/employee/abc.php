<?php session_start(); 
  $contno=$_SESSION['contno'];
  
  ?>
<?php
include('../db_con.php');
$q1 = "select * from advance_visitor where cont_no='$contno' ";
	$rs = mysql_query($q1);
	$row=mysql_fetch_array($rs);
	$e_id_of_arival=$row['e_id'];
	
// Set local PHP vars from the POST vars sent from our form using the array
// of data that the $_FILES global variable contains for this uploaded file
 $fileName = $_FILES["f"]["name"]; // The file name
 $fileTmpLoc = $_FILES["f"]["tmp_name"]; // File in the PHP tmp folder
 $fileType = $_FILES["f"]["type"]; // The type of file it is
 $fileSize = $_FILES["f"]["size"]; // File size in bytes
 $fileErrorMsg = $_FILES["f"]["error"]; // 0 for false... and 1 for true

// Specific Error Handling if you need to run error checking
if (!$fileTmpLoc) { // if file not chosen
    echo  "<script> alert('ERROR: Please browse for a file before clicking the sent_maile.');window.location.href='advance_pass.php'</script>";
    exit();
} else if($fileSize > 50000) { // if file is larger than we want to allow
    echo "ERROR: Your file was larger than 50kb in file size.";
    unlink($fileTmpLoc);
    exit();
} else if (!preg_match("/.(doc|pdf|xls)$/i", $fileName) ) {
     // This condition is only if you wish to allow uploading of specific file types    
    echo  "<script> alert('Your file was not .doc formale');</script>";
     unlink($fileTmpLoc);
     exit();
}
// Place it into your "uploads" folder mow using the move_uploaded_file() function
move_uploaded_file($fileTmpLoc, "naresh/$fileName");
// Check to make sure the uploaded file is in place where you want it
if (!file_exists("naresh/$fileName")) {
    echo "ERROR: File not uploaded<br /><br />";
    echo "Check folder permissions on the target uploads folder is 0755 or looser.<br /><br />";
    echo "Check that your php.ini settings are set to allow over 2 MB files, they are 2MB by default.";
    exit();
}
/* Display things to the page so you can see what is happening for testing purposes
echo "The file named <strong>$fileName</strong> uploaded successfuly.<br /><br />";
echo "It is <strong>$fileSize</strong> bytes in size.<br /><br />";
echo "It is a <strong>$fileType</strong> type of file.<br /><br />";
echo "The Error Message output for this upload is: <br />$fileErrorMsg";

//move_uploaded_file ($_FILES["file1"] ["tmp_name"],"C:\\wamp\\www\\snapshort\\maile1\\{$_FILES['file1'] ['name']}");

//$content = file_get_contents($path,FILE_USE_INCLUDE_PATH);
//$content = mysqli_real_escape_string($conn, $content);
 */
 
 
 // if u r uploding to domail then turn on this........................................................................
 //start
 
 
 /*
        //The form has been submitted, prep a nice thank you fullname
      
        //Set the form flag to no display (cheap way!)
        $flags = 'style="display:none;"';

        //Deal with the email
        $to = $e_id_of_arival;
        $conent="you have advance appointment on this date:".$date." at ".$time." ";
		$subject="Visitor Managment Syaytem";
        $fullname = strip_tags($conent);
        $tel = strip_tags($_POST['tel']);

        $attachment = chunk_split(base64_encode(file_get_contents($_FILES['f']['tmp_name'])));
        $filename = $_FILES['f']['name'];

        $boundary =md5(date('r', time())); 

        $headers = "From: naresh29sanodariya@gmail.com\r\nReply-To: webmaster@example.com";
        $headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"_1_$boundary\"";

        $fullname="This is a multi-part fullname in MIME format.

--_1_$boundary
Content-Type: multipart/alternative; boundary=\"_2_$boundary\"

--_2_$boundary
Content-Type: text/plain; charset=\"iso-8859-1\"
Content-Transfer-Encoding: 7bit

$fullname

--_2_$boundary--
--_1_$boundary
Content-Type: application/octet-stream; name=\"$filename\" 
Content-Transfer-Encoding: base64 
Content-Disposition: attachment 

$attachment
--_1_$boundary--";



        mail($to, $subject, $fullname, $headers);
*/
 //end.....................................................................................................................
  
 //end remove this................................................................
 
require_once 'Emaile/lib/swift_required.php';

if(filter_var($e_id_of_arival, FILTER_VALIDATE_EMAIL))
  {
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  ->setUsername('naresh.s@medianitsolutions.com')
  ->setPassword('naresh123');

$mailer = Swift_Mailer::newInstance($transport);
$time=$_SESSION['time_of_apint'];
$date=$_SESSION['date_of_apint'];
$body="you have advance appointment on this date:".$date." at ".$time." ";
$message = Swift_Message::newInstance('Visitor Management System')
  ->setFrom(array('naresh.s@medianitsolutions.com' => 'Visitor managment System'))
  ->setTo(array($e_id_of_arival))
  ->setBody($body)
	->attach(Swift_Attachment::fromPath("naresh/".$fileName.""));
$result = $mailer->send($message);
}
else
{
}
echo "<script> alert('your pass hace been mailed');
window.location.href='vms_emp.php';
</script>";

?>
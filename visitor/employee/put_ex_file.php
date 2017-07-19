<?php

//include('../db_con.php');
	
// Set local PHP vars from the POST vars sent from our form using the array
// of data that the $_FILES global variable contains for this uploaded file
 $fileName = $_FILES["bulk"]["name"]; // The file name
 $fileTmpLoc = $_FILES["bulk"]["tmp_name"]; // File in the PHP tmp folder
 $fileType = $_FILES["bulk"]["type"]; // The type of file it is
 $fileSize = $_FILES["bulk"]["size"]; // File size in bytes
 $fileErrorMsg = $_FILES["bulk"]["error"]; // 0 for false... and 1 for true

// Specific Error Handling if you need to run error checking
if (!$fileTmpLoc) { // if file not chosen
    echo  "<script> alert('ERROR: Please browse for a file before clicking the sent_maile.');window.location.href='upload_bulk_data.php'</script>";
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
move_uploaded_file($fileTmpLoc, "bulk_report/$fileName");
// Check to make sure the uploaded file is in place where you want it
if (!file_exists("bulk_report/$fileName")) {
    echo "ERROR: File not uploaded<br /><br />";
    echo "Check folder permissions on the target uploads folder is 0755 or looser.<br /><br />";
    echo "Check that your php.ini settings are set to allow over 2 MB files, they are 2MB by default.";
    exit();
}
?>
<?php 
echo "<script>window.location.href='bulk_report/b_report.php?name=$fileName';
</script>";

?>
<?php
echo $number=$_POST['number'];
echo $message=$_POST['message'];
	$sender=$_POST['from'];


header("Location:http://vas.mobilogi.com/API/WebSMS/Http/v1.0a/index.php?username=faisal&password=pass1234&sender=KMESEM&to=$number&message=Hello+Test+Message&reqid=1&format={json|text}&route_id=25&callback=<Any Callback URL>&unique=0&sendondate=21-09-2013T11:17:11");
die("Message Sent");
?>

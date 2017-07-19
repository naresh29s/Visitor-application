<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
header("Content-type: image/png");
$file = "images/barcode.png"; // path to base png image
$im = imagecreatefrompng($file); // open the blank image
$string = $_GET['code']; // get the code from URL
imagealphablending($im, true); // set alpha blending on
imagesavealpha($im, true); // save alphablending setting (important)

$black = imagecolorallocate($im, 0, 0, 0); // colour of barcode

$font_height=40; // barcode font size. anything smaller and it will appear jumbled and will not be able to be read by scanners

$newwidth=((strlen($string)*20)+41); // allocate width of barcode. each character is 20px across, plus add in the asterisk's
$thumb = imagecreatetruecolor($newwidth, 40); // generate a new image with correct dimensions

imagecopyresized($thumb, $im, 0, 0, 0, 0, $newwidth, 40, 10, 10); // copy image to thumb
imagettftext($thumb, $font_height, 0, 1, 40, $black, 'c:\windows\fonts\free3of9.ttf', '*'.$string.'*'); // add text to image

//show the image
imagepng($thumb);
imagedestroy($thumb);

?>
<body>
</body>
</html>

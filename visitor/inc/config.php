<?php
 
      $con=mysql_connect("localhost","root","");
        // Check connection
         if (!$con){
           die('Could not connect: ' . mysql_error());}
          mysql_select_db("visitor",$con)or die ("could not open db".mysql_error());
   
?>

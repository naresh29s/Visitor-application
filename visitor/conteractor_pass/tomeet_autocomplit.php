<?php
include('../db_con.php');

        $q=$_GET['q'];
	$my_data=mysql_real_escape_string($q);
  $sql="SELECT DISTINCT tomeet FROM conteractor_pass_information WHERE tomeet LIKE '%$my_data%' ";
	$result = mysql_query($sql) or die(mysql_error());
	
	if($result)
	{
		while($row=mysql_fetch_array($result))
		{
			echo $row['tomeet']."\n";
		}
                  
                                               
	}
	?>
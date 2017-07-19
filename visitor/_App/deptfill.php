<?php
	
        $q=$_GET['q'];
	$my_data=mysql_real_escape_string($q);
	$mysqli=mysqli_connect('localhost','root','','visitor') or die("Database Error");
	
        $sql="SELECT * FROM dept WHERE DeptName LIKE '%$my_data%' ORDER BY DeptName";
	$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
	
	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{
			echo $row['DeptName']."\n";
			//echo $row['DeptName']."\n";

		}
                  
                                               
	}
       
?>
<html>
  <head>
    <style type="text/css">
    table {
    	border-collapse: collapse;
    }        
    td {
    	border: 1px solid black;
    	padding: 0 0.5em;
    }        
    </style>
  </head>
  <body>
  <?php
 
 include('../../db_con.php');
 $name=$_REQUEST['name'];
	include 'reader.php';
    $excel = new Spreadsheet_Excel_Reader();
if(isset($_REQUEST['type']))
{

	$x=2;$y=1;
	$count=0;
	//echo isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][$y] : '';
    $excel->read($name);    

      $y=1;
      while($x<=$excel->sheets[0]['numRows']) 
	  {
	  
	  //echo isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][$y] : '';
        $fname = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][1] : '';
		$lname = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][2] : '';
	 	$sname = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][3] : '';
	 	$mobile_no = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][4] : '';
	 	$site = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][5] : '';
	 	$deptname  = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][6] : '';
	 	$designation= isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][7] : '';
	 	$dob= isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][8] : '';
		$resi_add= isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][9] : '';
	 	$native_add = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][10] : '';
	 	$tel_no = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][11] : '';
	 	$e_name = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][12] : '';
	 	$e_no = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][13] : '';
	 	$cmpny_name= isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][14] : '';
	 	$cmpny_add= isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][15] : '';
	 	$cmpny_no= isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][16] : '';
		$c=0;		
		 //$content = mysqli_real_escape_string($conn, $content);
			$q1 = "select * from advance_conteractor_pass";
			$rs = mysql_query($q1);
	
			while($row=mysql_fetch_array($rs))
			{
			$a=$row['cont_no'];
			//echo $a;
				if($a==$mobile_no)
				{
				$c++;
				//echo $a;
				}
			}
		
		if($c>0)
			{
			$Querry="UPDATE advance_conteractor_pass SET  `sname` = '$sname' , `fname` = '$fname' , `lname` = '$lname' , `cont_no` = '$mobile_no' , `dob` = '$dob', `dept` = '$deptname' , `designattion` = '$designation' , `resi_add` = '$resi_add' , `native_add` = '$native_add' , `tel_no` = '$tel_no' , `v_site` = '$site' , `emr_cont_per` = '$e_name' , `emr_cont_no` = '$e_no' , `v_comp_name` = '$cmpny_name' , `v_comp_add` = '$cmpny_add' , `v_comp_cont` = '$cmpny_no' WHERE `cont_no` = '$mobile_no' ";
	$row=mysql_query($Querry);	
			$count++;
			 //echo 'MySQL Error: ' . mysql_error();
				if(! $row )
					{
			 		echo 'MySQL Error: ' . mysql_error();
  					die(mysql_error());
					}
			}
			else
			{		
			$Querry= "INSERT INTO advance_conteractor_pass (`sname`, `fname`, `lname`, `cont_no`, `dob`, `designattion`, `resi_add`, `native_add`, `tel_no`, `v_site`, `dept`,`emr_cont_per`, `emr_cont_no`, `v_comp_name`, `v_comp_add`, `v_comp_cont`) VALUES ( '$sname', '$fname', '$lname', '$mobile_no', '$dob', '$designation', '$resi_add', '$native_add', '$tel_no', '$site','$deptname','$e_name', '$e_no', '$cmpny_name', '$cmpny_add', '$cmpny_no')";
$row1=mysql_query($Querry);	
			$count++;
			 //echo 'MySQL Error: ' . mysql_error();
			if(! $row1 )
			{
			 echo 'MySQL Error: ' . mysql_error();
  			die(mysql_error());
			}
			}
		
		//echo "\t\t<td>$cell</td>\n";  
        $y++;
		$x++;
		 echo "</br>";
      }  
    
      //$x++;
    //}
	
	echo "<script> alert(' $count record uploaded'); window.location.href='../../conteractor_pass/import_data.php';</script>";
}//if over for type
 else
{
 ?> 

    <?php
	$x=2;$y=1;
	$count=0;
	//echo isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][$y] : '';
    $excel->read($name);    

      $y=1;
      while($x<=$excel->sheets[0]['numRows']) 
	  {
	  
	  //echo isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][$y] : '';
      	$vid = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][1] : '';
		$sname = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][2] : '';
	 	$fname = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][3] : '';
	 	$lname = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][4] : '';
	 	$contno = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][5] : '';
	 	$dept  = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][6] : '';
	 	$tomeet= isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][7] : '';
	 	$d1= isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][8] : '';
		$d2 = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][9] : '';
	 	$vcompnm = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][10] : '';
	 	$vcompadd = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][11] : '';
	 	$vcompcont = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][12] : '';
	 	$vreason = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][13] : '';
	//echo 	$date= isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][14] : '';
	//echo 	$img = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][15] : '';
        
		
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
			$sq1 = "update advance_visitor set v_id='$vid',sname='$sname',fname='$fname',lname='$lname',cont_no='$contno',deptname='$dept',cont_person='$tomeet',frmdate='$d1',todate='$d2',vcompname='$vcompnm',vcomadd='$vcompadd',cont_no_person='$vcompcont',reason='$vreason' where cont_no=$contno";
			$row1=mysql_query($sq1);
			$count++;
			 //echo 'MySQL Error: ' . mysql_error();
				if(! $row1 )
					{
			 		echo 'MySQL Error: ' . mysql_error();
  					die(mysql_error());
					}
			}
			else
			{		
			$sq = "insert into advance_visitor (v_id,sname,fname,lname,cont_no,deptname,cont_person,frmdate,todate,vcompname,vcomadd,cont_no_person,reason) values ('{$vid}','{$sname}','{$fname}', '{$lname}', '{$contno}', '{$dept}', '{$tomeet}', '{$d1}', '{$d2}', '{$vcompnm}', '{$vcompadd}', '{$vcompcont}', '{$vreason}')";
			$row=mysql_query($sq);
			$count++;
			 //echo 'MySQL Error: ' . mysql_error();
			if(! $row )
			{
			 echo 'MySQL Error: ' . mysql_error();
  			die(mysql_error());
			}
			}
		
		//echo "\t\t<td>$cell</td>\n";  
        $y++;
		$x++;
		 echo "</br>";
      }  
    
      //$x++;
    //}
	
	echo "<script> alert(' $count record uploaded'); 
 window.location.href='../upload_bulk_data.php';</script>";
}//if over for type
    ?>   
    
	
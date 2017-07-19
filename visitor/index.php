<?php
  session_start();
 
  if(!isset($_SESSION['LOGIN_STATUS'])){
      header('location:login.php');
  }
  else
  {
        if($_SESSION['aa_id']=='1'){
		echo "<script>window.location.href='admin.php'</script>";
		}
		else if($_SESSION['aa_id']=='2'){
		echo "<script>window.location.href='user.php'</script>";
		}
		else if($_SESSION['aa_id']=='3'){
		echo "<script>window.location.href='employee.php'</script>";
		}
		else{
		header('location:login.php');
		}
		
  }
?>

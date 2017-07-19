<?php 
//include('../db_con.php');
$q = mysql_query('SELECT MAX(v_id) as v_id from `master_visitor`');
//$q1 = mysql_query('SELECT MAX(v_id) as v_id from `advance_visitor`');
$row = mysql_fetch_assoc($q);
//$row1 = mysql_fetch_assoc($q1);
//if($row['v_id']>$row1['v_id'])
//$next_auto_inc = $row['v_id'] + 1;
//else
$next_auto_inc = $row['v_id'] + 1;
printf("%04d", $next_auto_inc);

?>

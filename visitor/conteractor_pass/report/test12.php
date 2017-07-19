<?php
$q = intval($_GET['q']);

include('../../db_con.php');
$q = "SELECT * FROM conteractor_pass_information WHERE cont_v_id='$q' ";
$result = mysql_query($q);
$row_num = mysql_num_rows($result);

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";

while($row1 = mysql_fetch_array($result))
  {
  echo "<tr>";
   echo "<td width='50' align='center'>".$row1['cont_v_id']."</td>";
 echo "<td width='200' align='center'>".$row1['start_date']."</td>";
 echo "<td width='200' align='center'>".$row1['end_date']."</td>";
  echo "<td width='200' align='center'>".$row1['sname']." ".$row1['fname']." ".$row1['lname']."</td>";
  echo "</tr>";
  }
echo "</table>";

?> 
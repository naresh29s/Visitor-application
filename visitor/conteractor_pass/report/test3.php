<script>

function validate(user) {
window.location="test.php?no=" + user;
//alert(user);
 //http.abort();
//http.open("GET", "no_exist.php?no=" + user, true);
/*	update();
  http.abort();
  alert(user);
 http.open("GET", "no_exist.php?no=" + user, true);
  http.onreadystatechange=function()
  			 {
    if(http.readyState == 4) 
						{
      document.getElementById('alert').innerHTML = http.responseText;
 					   }
  			}
  http.send(null);

*/}
</script>
<html>
<body>
<table>
<tr><td>Mobile No:</td>
<td><input name="contno" type="text" id="contno" size="20" placeholder="Enter Here....." onBlur="javascript:validate(this.value)" required autocomplete="on"/>
</td></tr>
<tr><td>add:</td>
<td><input name="contno" type="text" id="contno" size="20" placeholder="Enter Here....." onBlur="" required autocomplete="on"/>
</td></tr>
<tr><td>cntno:</td>
<td><input name="contno" type="text" id="contno" size="20" placeholder="Enter Here....." onBlur="" required autocomplete="on"/>
</td></tr>
</table>
</body>
</html>
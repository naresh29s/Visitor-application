<html>
<head>
<script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","test12.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>

<form>
<input type="text" onBlur="showUser(this.value)">
<select name="users" onchange="showUser(this.value)">
<option value="">Select a person:</option>
<option value="12">Peter Griffin</option>
<option value="13">Lois Griffin</option>
<option value="14">Glenn Quagmire</option>
<option value="15">Joseph Swanson</option>
</select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here........</b></div>
<textarea id="txtHint"></textarea>
<input type="txtHint" id="txtHint"/>
</body>
</html> 
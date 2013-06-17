<?php
require "dbconfig.php";
function castvote()
{

  if(!isset($_POST['phone']) || empty

($_POST['phone']) || empty($_POST

['radiobutton'])) 
	{
	   die ("Please enter phone and vote <a 

href='javascript:history.go(-1);'>Back</a>");
	}
	else 
	{
		$checknum = mysql_fetch_array

(mysql_query("SELECT COUNT(*) total FROM 

members WHERE phone = '$_POST[phone]'")) or 

die(mysql_error());
//		echo $checknum['total'];
		if ($checknum['total'] == 1)
		{
		$insqry = mysql_query("INSERT 

INTO votes (phone, vote) VALUES ('$_POST

[phone]', '$_POST[radiobutton]')") or die

(mysql_error());

		return $insqry;
		}
	}

}

if(isset($_POST['btnVote']))
{
	if(castvote() > 0) echo "Casted 

Successfully";
	else echo "Invalid Vote";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 

Transitional//EN" 

"http://www.w3.org/TR/xhtml1/DTD/xhtml1-

transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" 

content="text/html; charset=iso-8859-1" />
<title>Cast your vote</title>
</head>

<body>
<h2>Cast your vote here</h2>
<form id="form1" name="form1" method="post" 

action="">
  <table width="261" border="1">
    <tr>
      <td width="251">Number: 
        <label>
        <input name="phone" type="text" 

id="phone" />
      </label></td>
    </tr>
    <tr>
      <td><label>
        <input name="radiobutton" type="radio" 

value="A" />
      A</label></td>
    </tr>
    <tr>
      <td><label>
        <input name="radiobutton" type="radio" 

value="B" />
      B</label></td>
    </tr>
    <tr>
      <td><label>
        <input name="radiobutton" type="radio" 

value="C" />
      C</label></td>
    </tr>
  </table>
  <label>
  <input name="btnVote" type="submit" 

id="btnVote" value="Vote" />
  </label>
</form>
<p>&nbsp;</p>
</body>
</html>

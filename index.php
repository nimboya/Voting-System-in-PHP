<?php 
require "dbconfig.php";
$totalinvalid = mysql_fetch_array(mysql_query("SELECT COUNT(*) total FROM votes WHERE vote = ''")) or die(mysql_error());
$total = mysql_fetch_array(mysql_query("SELECT COUNT(*) total FROM votes")) or die(mysql_error());
$adata = mysql_fetch_array(mysql_query("SELECT COUNT(*) total FROM votes WHERE vote = 'A'")) or die(mysql_error());
$bdata = mysql_fetch_array(mysql_query("SELECT COUNT(*) total FROM votes WHERE vote = 'B'")) or die(mysql_error());
$cdata = mysql_fetch_array(mysql_query("SELECT COUNT(*) total FROM votes WHERE vote = 'C'")) or die(mysql_error());
$getwinner = mysql_fetch_array(mysql_query("SELECT * FROM voteconfig ORDER BY total DESC")) or die(mysql_error());
$instotala = mysql_query("UPDATE voteconfig SET total = '$adata[total]' WHERE votekey = 'A'") or die(mysql_error());
$instotalb = mysql_query("UPDATE voteconfig SET total = '$bdata[total]' WHERE votekey = 'B'") or die(mysql_error());
$instotalc = mysql_query("UPDATE voteconfig SET total = '$cdata[total]' WHERE votekey = 'C'") or die(mysql_error());

$a = $adata['total'];
$b = $bdata['total'];
$c = $cdata['total'];

$datastring = "[ ['A',  $a], ['B',  $b], ['C', $c] ]";
//$a = mt_rand(1,10);
//$b = mt_rand(1,10);
//$c = mt_rand(1,10);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>SMS Voting Platform Results</title>
	<meta http-equiv="refresh" content="3"> 

	<link href="examples.css" rel="stylesheet" type="text/css">
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="excanvas.min.js"></script><![endif]-->
	<script language="javascript" type="text/javascript" src="jquery.js"></script>
	<script language="javascript" type="text/javascript" src="jquery.flot.js"></script>
	<script language="javascript" type="text/javascript" src="jquery.flot.categories.js"></script>
	<script type="text/javascript">
	// jQ Auto Refresh
	//var auto_refresh = setInterval(
//	function()
//	{
//	$('#wholepage').load('index.php');
//	} , 10000); 
	</script>

</head>
<body>

<div id="wholepage">
<script type="text/javascript">

	$(function() {

		var data = <?php echo $datastring; ?> ;

		$.plot("#placeholder", [ data ], {
			series: {
				bars: {
					show: true,
					barWidth: 0.6,
					align: "center"
				}
			},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
		});

		// Add the Flot version string to the footer

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
<div id="header">
		<h2>Voting Results</h2>
	</div>
	
	

<div id="content">
  <div class="demo-container">
			<div id="placeholder" class="demo-placeholder"></div>
  </div>
	    <p><strong>Voting Details</strong> </p>
	    <table width="413" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="298" align="right">Total Number of Votes </td>
            <td width="113" align="center"><?php echo $total['total']; ?></td>
          </tr>
          <tr>
            <td align="right">Total Valid Votes </td>
            <td align="center"><?php echo $total['total']; ?></td>
          </tr>
          <tr>
            <td align="right">Total Invalid Votes</td>
            <td align="center"><?php echo $totalinvalid['total']; ?></td>
          </tr>
          <tr>
            <td height="26" align="right"><strong>Winner</strong></td>
            <td align="center"><?php echo $getwinner['votekey']; ?></td>
          </tr>
        </table>
	    <p>&nbsp;</p>
</div>
</div>
	<center>Copyright &copy; 2013 </center>

</body>
</html>

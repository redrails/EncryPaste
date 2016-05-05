<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<style>

	html, body {
		height: 100%;
	}
	.wrapper {
		min-height: 100%;
		height: auto !important;
		height: 100%;
		margin: 0 auto -50px; /* the bottom margin is the negative value of the footer's height */
	}
	footer, .push {
		height: 50px; /* '.push' must be the same height as 'footer' */
	}

</style>
<div class="wrapper">


	<center>
	<a href="index.php"><img src="style/logo.png" height="150"  /></a>
	<br><hr />
	<a href="index.php">Encrypt</a> | <a href="retrieve.php">Decrypt</a> | <a href="listing.php">List Index</a>
	<br><hr />
	
<?php

include("includes/encrypaste.class.php");

$enc = new EncryPaste;
$output = $enc->viewAll();
?>

	<h2>Listing of all EncryPastes</h2><hr /><br>
	<div id="box">
	<table align="center">
	<?php foreach($output as $items) {
		echo "<tr>";
		echo "<th align='left'><a href='retrieve.php?id=". $items['pID'] ."'>". $items['pID'] ."</a></th>";
		echo "<th align='left'> @ ". $items['date'] ."</th>";
		echo "</tr>";

	}?>
	</table>
	</div>
	<div class="footer">
		Created by <a href="http://www.ihtasham.com/">Ihtasham</a>
	</div>
 </html>
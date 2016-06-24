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

if(isset($_POST['submit'])){

	if(!empty($_POST['data']) && !empty($_POST['pass'])){
	
		$enc = new EncryPaste;
		
		$enc->executeEncry($_POST['data'], $_POST['pass']);
	
	}

}

?>

	<h2>EncryPaste your data!</h2><hr /><br>
	<div id="box">
	<form action="#" method="post">

		<textarea style="width:100%;height:90%" name="data"></textarea> <br><br>

		<input type="text" name="pass" placeholder="Password"> <br>
	</div>
	<br>
		<input type="submit" class="button" name="submit" value="ENCRYPASTE">

	</form>
	
	</center>
	<br><hr /><br><br>
	<div class="push"></div>
	</div>
	<div class="footer">
		Created by <a href="http://www.ihtasham.com/">Ihtasham</a>
	</div>
 </html>
 

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<center>

	<a href="index.php"><img src="style/logo.png" height="150"  /></a>
	<br><hr />
	<a href="index.php">Encrypt</a> | <a href="retrieve.php">Decrypt</a>
	<br><hr />
	
<?php

if(isset($_POST['view'])){
	if(!empty($_POST['id'])){
		 header("location: ?id=". $_POST['id']);
			
	}
}

include("includes/encrypaste.class.php");

$enc = new EncryPaste;

if(isset($_GET['id'])){

	$output =  $enc->viewPaste($_GET['id']);
	
?>



	<h2>Decrypt/dEncryPaste data!</h2>
	<h2>Viewing <font color="red"><?php echo $_GET['id']; ?></font> </h2>EncryPasted on: <?php echo $output['date']; ?>
	<hr /><br>
	<div id="box">
	<form action="#" method="post">

		<textarea style="width:100%;height:90%" name="data">

	<?php 
	
		if(!isset($_POST['pass'])){

			echo (empty($output['paste']) ? $_GET['id']. " - is an invalid Paste ID, try again.":$output['paste']); 

		} elseif(isset($_POST['pass'])){

			$decrypted = $enc->decrypt($output['paste'], $_POST['pass']);
			
			echo $decrypted;

		}

	?>


		</textarea> <br><br>

		Enter password to decrypt this paste: <input type="text" name="pass" placeholder="Password" autocomplete="off"> <br>
		</div><br>
		<input type="submit" class="button" name="submit" value="Decrypt Paste">


	</form>
</center>

<br><hr /><br><br>
<div class="push"></div>
</div>
<div class="footer">Created by <a href="http://www.ihtasham.com/">Ihtasham</a></div>
<?php

} else {
?>
	<div class="centered">
	Enter the ID of the paste you want to view: <br><br>
	<form action="#" method="post">
		<input type="text" name="id" autocomplete="off" placeholder="Enter Paste ID"> <input type="submit" name="view" value="View">
	</form>
	</div>
<?php
}
?>
</html>

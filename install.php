<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<center>

	<a href="index.php"><img src="style/logo.png" height="150"  /></a>
	<br><hr />
	

<h2>Welcome to the EncryPaste installer.</h2><br>
<p> This script will install EncryPaste tables for you and you'll be able to use EncryPaste.</p>
<p>In order for you to install these tables you will need to setup some database parameters in ./includes/config.inc.php.
It's fairly simple, just set up a database, make sure it has a user with priveleges for reading and writing and when
you're ready, just hit that install button below & maybe <a href="">buy me a coffee</a>!! (Don't click more than once)</p>
<br><font color="red"><b>MAKE SURE TO DELETE THIS FILE ONCE YOU'RE DONE!!!</b></font><br><hr /><br>
<form method="post" action="#"> <font color="red" size="5">==> </font><input type="submit" name="install" value="CLICL ME TO INSTALL ENCRYPASTE!"></input><font color="red" size="5"> <==</font </form>
<?php

if(isset($_POST['install'])){

	include("includes/config.inc.php");
	
	$host   = DB_HOST;
	$user   = DB_USER;
	$pass   = DB_PASS;
	$dbname = DB_NAME;
	
	$table = "pastes";
	
	$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
	
	try{
		$db = new PDO($dsn, $user, $pass);
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
		$sql ="CREATE table $table(
			`ID` varchar(32) NOT NULL,
			`paste` mediumtext NOT NULL,
			`insertIP` varchar(10) NOT NULL,
			`date` varchar(20) NOT NULL);";
		$db->exec($sql);
		echo "EncryPaste tables have been successfully installed, click <a href='index.php'>here to get started</a>";

		} catch(PDOException $e) {
			echo "Oops, something went wrong. <br><br>";
			echo $e->getMessage();//Remove or change message in production code
		
	}
	
	

}

?>



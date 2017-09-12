<?php
extract($_POST);
$link = mysqli_connect('localhost', 'root', '', 'forums');
session_start();
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
if(isset($login))
{	
	$sql    = "SELECT uname FROM users WHERE uname='$username' and pwd='$password'"	;
	$result = mysqli_query($link,$sql);
	$rows = mysqli_num_rows($result);
	if ($rows == 1) {
	$_SESSION['login_user']=$username;// Initializing Session
	header("location: forums.php"); // Redirecting To Other Page
	} else {
	echo '<script language=\"javascript\">';
	echo 'alert("Username or Password is invalid")';
	echo '</script>';
	//header("location: login.php");
	//echo $_SESSION['login_user'];
	}
	mysqli_close($link); // Closing Connection
	}
else if(isset($register))
{
	$sql    = "INSERT INTO users (uname, pwd, email) VALUES ('$rusername', '$rpassword', '$remail')" ;
	$result = mysqli_query($link,$sql);
	if (!$result) {
		echo "<script type=\"text/javascript\">
			alert (\"Registration unsucessful\");
		</script>";
	}
	else
	{
		echo "<script type=\"text/javascript\">
			alert (\"Registration sucessful\");
		</script>";
		header("Location:login.php");
		exit;
	}
}
?>
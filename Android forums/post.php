<?php
include("session.php");
extract($_GET);
$link = mysqli_connect('localhost', 'root', '', 'forums');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
	$sql="INSERT INTO posts (post,user) VALUES('$post','$puser')";
	$result = mysqli_query($link,$sql);
?>
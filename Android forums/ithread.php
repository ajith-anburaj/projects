<?php
extract($_GET);
$link = mysqli_connect('localhost', 'root', '', 'forums');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
	$sql="INSERT INTO `thread` (`name`, `post`, `user`, `time1`) VALUES ('$name', '$posts', '$user', '$time')";
	$result = mysqli_query($link,$sql);
?>
<?php
	$link = mysqli_connect('localhost', 'root', '', 'forums');
    if (!$link) {
    die('Could not connect: ' . mysql_error());
    }
    $sql    = "SELECT * FROM threads" ;
    $result = mysqli_query($link,$sql);
    $rows = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
    echo "<script type='text/javascript'>vthread('$row[1]','$row[2]','$row[3]','$row[4]');</script>";
    }
?>
<?php 
function flushHard() 
 { 
  // echo an extra 256 byte to the browswer - Fix for IE. 
  for($i=1;$i<=256;++$i) 
   { 
    echo ' '; 
   } 
  flush(); 
  ob_flush(); 
 }
 

set_time_limit(0); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
flushHard();
$link = mysqli_connect('localhost', 'root', '', 'forums');
    if (!$link) {
    die('Could not connect: ' . mysql_error());
    }
    $sql    = "SELECT * FROM posts" ;
    $result = mysqli_query($link,$sql);
    $rows = mysqli_num_rows($result);
	$count=rows;
$x = 0; 
while(1) 
 {
  $sql    = "SELECT * FROM posts" ;
    $result = mysqli_query($link,$sql);
    $rows = mysqli_num_rows($result);
	$count1=$rows;
   if($count1 > $count) 
   { 
    echo '<script type="text/javascript">parent.comet.timer("'.$rows.'");</script>'."\n"; 
	$count=$count1;
   } 
   echo $rows;
  flushHard(); 
  sleep(2); 
 }
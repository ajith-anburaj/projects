<?php
$link = mysqli_connect('localhost', 'root', '', 'forums');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$flag=0;
$sql="SELECT name,post,user,time1 from thread";
$result = mysqli_query($link,$sql);
$rows = mysqli_num_rows($result); 
while($row = $result->fetch_assoc()) {
//if($flag==0){
$temp = '<hr><section class="row panel-body" id="head">
            <section class="col-md-6">
              <h4> <a href="a1.php">'.$row["name"].'</a></h4>    
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled" id="count">Posts:'.$row["post"].' </li>
              </ul>
            </section>
            <section class="col-md-3">
              <i class="glyphicon glyphicon-user">'.$row["user"].'</i><br>
              <a href="#"><i class="glyphicon glyphicon-calendar">'.$row["time1"].'</i>    
            </section>      
          </section>
     </section>';

echo $temp;
}
//else
//{$flag=0;}
//}
?>
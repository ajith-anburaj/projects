<?php
$link = mysqli_connect('localhost', 'root', '', 'forums');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$flag=0;
$sql="SELECT user,post from posts";
$result = mysqli_query($link,$sql);
$rows = mysqli_num_rows($result); 
while($row = $result->fetch_assoc()) {
if($flag==0){
$temp ='<section class="row clearfix">
        <section class="col-md-12 column">
          
          <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="panel panel-default">
                <section class="row panel-body">
                    <section class="col-md-9">
                      <h2> <i class="fa fa-smile-o"></i> </h2>
                      <hr>'.$row["post"].
                  '</section>
                  
                  <section id="user-description" class="col-md-3 ">
                        <section class="well">
                          <figure>
                            <img class="img-rounded img-responsive" src="src/user.png" alt="Forum moderator">
                            <figcaption class="text-center">'.$row["user"].'<br><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i> </figcaption>
                          </figure>
                        </section>
                  </section>
                  
                </section>        
                </div>
               </div>
            </div>
        </div>
    </div>  
        </section>
    </section>
</section>';$flag=1;

echo $temp;
}
else
{$flag=0;}
}
?>
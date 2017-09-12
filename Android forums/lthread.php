<?php
include('session.php');
?>  
<!DOCTYPE html>
<html>
<head>
	<title>forums</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="js/jquery.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.js"></script>
    <title>Login</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
    window.onload = function () {
comet.load();
};
         var comet = 
         { 
            load: function() 
           { 
            $("#comet_frame").html('<iframe id="comet_iframe" src="rathread.php"></iframe>'); 
            },
             timer: function(result) 
              { 
                var result1="posts:"+result;
               document.getElementById("count").innerHTML=result1;
              } 
          }
        function cthread() {
            var d = new Date();
            var i=0;
            var title=document.getElementById("tname").value;
            var user="<?php echo $_SESSION['login_user']?>";
            var html = '<hr><section class="row panel-body">'+
                                '<section class="col-md-6">'+
              '<h4> <a href="lthread.php">'+title+'</a></h4>'+    
            '</section>'+
            '<section class="col-md-2">'+
              '<ul id="post-topic">'+
                '<li class="list-unstyled"> Posts:'+i+'</li>'+
              '</ul>'+
            '</section>'+
            '<section class="col-md-3">'+
              '<i class="glyphicon glyphicon-user">'+user+'</i><br>'+
              '<a href="#"><i class="glyphicon glyphicon-calendar"></i>'+d+'</a>'+
            '</section>'+          
          '</section>';
          $(html).insertAfter( "#head" );
          $( "#mclose" ).click();
          alert("Thread created");
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
          }
          };
          xhttp.open("GET", "ithread.php?name="+title+"&posts="+0+"&user="+user+"&time="+d, true);
          xhttp.send();
          }
        function vthread(title,i,user,d)
        {
           var print = '<hr><section class="row panel-body">'+
                                '<section class="col-md-6">'+
              '<h4> <a href="lthread.php">'+title+'</a></h4>'+    
            '</section>'+
            '<section class="col-md-2">'+
              '<ul id="post-topic">'+
                '<li class="list-unstyled"> Posts:'+i+'</li>'+
              '</ul>'+
            '</section>'+
            '<section class="col-md-3">'+
              '<i class="glyphicon glyphicon-user">'+user+'</i><br>'+
              '<a href="#"><i class="glyphicon glyphicon-calendar"></i>'+d+'</a>'+
            '</section>'+          
          '</section>'+'<hr>';
          $(print).insertAfter( "#head" );
        }
    </script>
    <!-- Custom CSS -->
</head>
<body>

<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b><font size="10">Android forums</font></b></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a id="about-us" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_user']?><span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="about-us">
                        <li><a href="logout.php" id="log">Logout</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


<button type="button" style="margin-top:70px;margin-left:100px;margin-bottom:10px" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#largeShoes">
Create thread
</button>
<div id="comet_frame" style="display:none;visablity:invisable;"></div>
<!-- The modal -->
<div class="modal fade" id="largeShoes" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge" aria-hidden="true" >
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title" id="modalLabelLarge">Title</h4>
</div>

<div class="modal-body">
<input type="text" name="title" id="tname" class="form-control"></input>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="mclose">Close</button>
        <button type="button" class="btn btn-primary" onclick="cthread()">Submit</button>
      </div>
</div>
</div>
</div>
<div class="container">
    <div class="row">
        <section class="panel panel-info">
          <header class="panel-heading">
            <h3>ANDROID GENERAL</h3>
          </header>
          <section class="row panel-body" id="head">
            <section class="col-md-6">
              <h4> <a href="a1.php">Welcome to the forum! (A message from the moderators) </a></h4>    
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li id="count" class="list-unstyled">posts:</li>
              </ul>
            </section>
            <section class="col-md-3">
              <i class="glyphicon glyphicon-user">Moderator</i><br>
              <a href="#"><i class="glyphicon glyphicon-calendar">Sat Apr 08 2017 18:33:56 GMT+0530 (India Standard Time)</i>    
            </section>      
          </section> 
          <hr>
          <section class="row panel-body">
            <section class="col-md-6">
              <h4> <a href="lthread.php">Alcatel OneTouch Pixi 3 (8) WIfi [Model 8070 mt8127] - Custom Recovery [TWRP 3.0.2.0]</a></h4>    
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled"> Posts:3 </li>
              </ul>
            </section>
            <section class="col-md-3">
              <a href="#"><i class="glyphicon glyphicon-user"></i> Moderator</a><br>
              <a href="#"><i class="glyphicon glyphicon-calendar"></i> 2017-04-06 7:57 AM  </a>
            </section>
           
          </section>
          
          <hr>
          <section class="row panel-body">
            <section class="col-md-6">
              <h4> <a href="lthread.php">MIUI 7 for Lenovo a536 custom rom </a></h4>    
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled"> Posts:78 </li>
              </ul>
            </section>
            <section class="col-md-3">
              <a href="#"><i class="glyphicon glyphicon-user"></i> Moderator</a><br>
              <a href="#"><i class="glyphicon glyphicon-calendar"></i> 2017-04-06 7:57 AM  </a>
            </section>
           
          </section>
          
          <hr>
          <section class="row panel-body">
            <section class="col-md-6">
              <h4> <a href="lthread.php">[ROM][7.0][AOSP] Android N for MeMOPAD 10 FHD LTE</a></h4>    
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled"> Posts:47 </li>
              </ul>
            </section>
            <section class="col-md-3">
              <a href="#"><i class="glyphicon glyphicon-user"></i> Moderator</a><br>
              <a href="#"><i class="glyphicon glyphicon-calendar"></i> 2017-04-06 7:57 AM  </a>
            </section>
           
          </section>
          
          <hr>
          <section class="row panel-body">
            <section class="col-md-6">
              <h4> <a href="lthread.php">[HOW-TO] Remove the superuser indicator in CM13/CM14.x/a></h4>    
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled"> Posts:10 </li>
              </ul>
            </section>
            <section class="col-md-3">
              <a href="#"><i class="glyphicon glyphicon-user"></i> Moderator</a><br>
              <a href="#"><i class="glyphicon glyphicon-calendar"></i> 2017-04-06 7:57 AM </a>
            </section>
           
          </section>
          
          <hr>
          <section class="row panel-body">
            <section class="col-md-6">
              <h4> <a href="lthread.php"> ✭[GUIDE][26-07-2016]Extreme Battery Life Thread(Greenify+Amplify+Power Nap)✭ </a></h4>    
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled"> Posts:4 </li>
              </ul>
            </section>
            <section class="col-md-3">
              <a href="#"><i class="glyphicon glyphicon-user"></i> Moderator</a><br>
              <a href="#"><i class="glyphicon glyphicon-calendar"></i> 2017-04-06 7:57 AM  </a>
            </section>
           
          </section>
          
          <hr>
          <section class="row panel-body">
            <section class="col-md-6">
              <h4> <a href="lthread.php">Lenovo A5000 (Recovery, Root, ROMs, etc.) [REFERENCE/ARCHIVE]</a></h4>    
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled"> Posts:11 </li>
              </ul>
            </section>
            <section class="col-md-3">
              <a href="#"><i class="glyphicon glyphicon-user"></i> Moderator</a><br>
              <a href="#"><i class="glyphicon glyphicon-calendar"></i> 2017-04-06 7:57 AM  </a>
            </section>
           
          </section>
          
          <hr>
          <section class="row panel-body">
            <section class="col-md-6">
              <h4> <a href="lthread.php">[SOURCES] Android ROMS highly compressed once again</a></h4>    
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled"> Posts:14 </li>
              </ul>
            </section>
            <section class="col-md-3">
              <a href="#"><i class="glyphicon glyphicon-user"></i> Moderator</a><br>
              <a href="#"><i class="glyphicon glyphicon-calendar"></i> 2017-04-06 7:57 AM  </a>
            </section>
           
          </section>
     </section>
          
  </div>
<script>
        $(document).ready(function(){
         var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      $(this.responseText).insertAfter( "#head" );
    }
    };
    xhttp.open("GET", "vthread.php", true);
    xhttp.send();
        });
    </script>
</div>
</body>
</html>>
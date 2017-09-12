<?php
include("session.php");
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

    <!-- Custom CSS -->
    <link href="css/post.css" rel="stylesheet">
    <script type="text/javascript">
        function refresh(t)
        {
            setTimeout("location.reload(true);",t);
        }
function cpost() {
           var rval=document.getElementById("rval").value;
           var user="<?php echo $_SESSION['login_user']?>";
            var reply = '<section class="row clearfix">'+
        '<section class="col-md-12 column">'+
         '<div class="row clearfix">'+
        '<div class="col-md-12 column">'+
            '<div class="panel panel-default">'+
                '<section class="row panel-body">'+
                    '<section class="col-md-9">'+
                      '<h2>'+' <i class="fa fa-smile-o">'+'</i>'+ '</h2>'+
                      '<hr>'+ rval+ 
                  '</section>'+
                  '<section id="user-description" class="col-md-3 ">'+
                        '<section class="well">'+
                          '<figure>'+
                            '<img class="img-rounded img-responsive" src="src/user.png" alt="Forum moderator">'+
                            '<figcaption class="text-center">'+user+' <br><i class="fa fa-star">'+'</i><i class="fa fa-star"></i><i class="fa fa-star">'+'</i>'+'<i class="fa fa-star">'+'</i>'+'<i class="fa fa-star-half">'+'</i>'+ '</figcaption>'+
                         '</figure>'+
                        '</section>'+
                 ' </section>'+
                  
                '</section>'+        
                '</div>'+
               '</div>'+
            '</div>'+
        '</div>'+
    '</div>'+    
        '</section>'+
    '</section>'+
'</section>';
          $("#append").append(reply);
          $( "#mclose" ).click();
          alert("Reply successful");
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
		}
		};
		xhttp.open("GET", "post.php?puser="+user+"&post="+rval, true);
		xhttp.send();
        }
    </script>
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
    <section class="container" style="margin-top: 80px">
    <section class="row clearfix">
        <section class="col-md-12 column">
          
          <ol class="breadcrumb">
                <li><a href="forums.php">Forums</a></li>
                <li><a href="lthread.php">ANDROID GENERAL</a></li>
                 <li class="active">Welcome to the forum! (A message from the moderators)   </li>
        </ol>
        </section>
    </section>
<button type="button" style="margin-bottom:20px" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#largeShoes">
Post reply
</button>

<!-- The modal -->
<div class="modal fade" id="largeShoes" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge" aria-hidden="true" >
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title" id="modalLabelLarge">Post reply</h4>
</div>

<div class="modal-body">
<textarea class="form-control" rows="3" id="rval"></textarea>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="mclose">Close</button>
        <button type="button" class="btn btn-primary" onclick="cpost()">Submit</button>
      </div>
</div>
</div>
</div>
<div id="append">
<script>
        $(document).ready(function(){
         var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      $("#append").append(this.responseText);
    }
    };
    xhttp.open("GET", "temp.php", true);
    xhttp.send();
        });
    </script>
</div>
</body>
</html>

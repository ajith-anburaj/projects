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
    <script type="text/javascript">
    function timedRefresh(timeoutPeriod) {
    setTimeout("location.reload(true);",timeoutPeriod);
    }</script>
    </head>
    <title>Login</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
</head>
<body onload="JavaScript:timedRefresh(3000);">
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
<div class="container" style="margin-top:70px">
	<div class="row">
  		<section class="panel panel-info">
          <header class="panel-heading">
            <h3>ANDROID DEVELOPMENT</h3>
          </header>
          <section class="row panel-body">
            <section class="col-md-6">
              <h4> <a href="lthread.php"><i class="glyphicon glyphicon-th-list"> </i> Android General	</a></h4> <hr>
              <h6>Android root tutorials, one-click root tools, ROMs and other Android modifications can be found in this forum for devices from Huawei, Elephone, Lenovo, ZTE, and others.</h6>
              
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled"> Topics:9 </li>
                <li class="list-unstyled"> Posts:2 </li>
              </ul>
            </section>
            <section class="col-md-3">
              <h4> <a href="#"><i class="glyphicon glyphicon-link"> </i> Last Post Goes from here! </a></h4> <hr>
              <a href="#"><i class="glyphicon glyphicon-user"></i> Moderator</a><br>
              <a href="#"><i class="glyphicon glyphicon-calendar"></i> 2017-04-06 7:57 AM  </a>
            </section>
           
          </section>
          <section class="row panel-body">
            <section class="col-md-6">
               <h4> <a href="#"><i class="glyphicon glyphicon-th-list"> </i> Android Q&A, Help & Troubleshooting</a></h4> <hr>
              <h6>This forum is for all of your questions about Android Development and Hacking. If you need help troubleshooting a problem, please be as specific as possible by describing your software configuration, including the ROM, kernel, and any modifications you've done.</h6>
              
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled"> Topics:0 </li>
                <li class="list-unstyled"> Posts:0 </li>
              </ul>
            </section>
            <section class="col-md-3">
              <h4> <a href="#"><i class="glyphicon glyphicon-link"> </i> Last Post Goes from here! </a></h4> <hr>
              <a href="#"><i class="glyphicon glyphicon-user"></i> Moderator</a><br>
              <a href="#"><i class="glyphicon glyphicon-calendar"></i> 2017-04-06 7:57 AM  </a>
            </section>
           
          </section>
          <section class="row panel-body">
            <section class="col-md-6">
               <h4> <a href="#"><i class="glyphicon glyphicon-th-list"> </i>Android Software and Hacking General [Developers Only]</a></h4> <hr>
              <h6>Technical discussion of Android development and hacking. No noobs please. Device-specific releases should go under appropriate device forum.</h6>
              
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled"> Topics:0 </li>
                <li class="list-unstyled"> Posts:0 </li>
              </ul>
            </section>
            <section class="col-md-3">
              <h4> <a href="#"><i class="glyphicon glyphicon-link"> </i> Last Post Goes from here! </a></h4> <hr>
              <a href="#"><i class="glyphicon glyphicon-user"></i> Moderator</a><br>
              <a href="#"><i class="glyphicon glyphicon-calendar"></i> 2017-04-06 7:57 AM  </a>
            </section>
           
          </section>
          <section class="row panel-body">
            <section class="col-md-6">
               <h4> <a href="#"><i class="glyphicon glyphicon-th-list"> </i> Android Software Development</a></h4> <hr>
              <h6>Discussion about Android-specific software development</h6>
              
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled"> Topics:0 </li>
                <li class="list-unstyled"> Posts:0 </li>
              </ul>
            </section>
            <section class="col-md-3">
              <h4> <a href="#"><i class="glyphicon glyphicon-link"> </i> Last Post Goes from here! </a></h4> <hr>
              <a href="#"><i class="glyphicon glyphicon-user"></i> Moderator</a><br>
              <a href="#"><i class="glyphicon glyphicon-calendar"></i> 2017-04-06 7:57 AM  </a>
            </section>
           
          </section>
          <section class="row panel-body">
            <section class="col-md-6">
               <h4> <a href="#"><i class="glyphicon glyphicon-th-list"> </i> Miscellaneous Android Development</a></h4> <hr>
              <h6>For ROMs, kernels, tools and scripts only </h6>
              
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled"> Topics:0 </li>
                <li class="list-unstyled"> Posts:0 </li>
              </ul>
            </section>
            <section class="col-md-3">
              <h4> <a href="#"><i class="glyphicon glyphicon-link"> </i> Last Post Goes from here! </a></h4> <hr>
              <a href="#"><i class="glyphicon glyphicon-user"></i> Moderator</a><br>
              <a href="#"><i class="glyphicon glyphicon-calendar"></i> 2017-04-06 7:57 AM  </a>
            </section>
           
          </section>
          <section class="row panel-body">
            <section class="col-md-6">
               <h4> <a href="#"><i class="glyphicon glyphicon-th-list"> </i> Android Themes</a></h4> <hr>
              <h6>Themes and skins for Android devices</h6>
              
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled"> Topics:0 </li>
                <li class="list-unstyled"> Posts:0 </li>
              </ul>
            </section>
            <section class="col-md-3">
              <h4> <a href="#"><i class="glyphicon glyphicon-link"> </i> Last Post Goes from here! </a></h4> <hr>
              <a href="#"><i class="glyphicon glyphicon-user"></i> Moderator</a><br>
              <a href="#"><i class="glyphicon glyphicon-calendar"></i> 2017-04-06 7:57 AM  </a>
            </section>
           
          </section>
          <section class="row panel-body">
            <section class="col-md-6">
               <h4> <a href="#"><i class="glyphicon glyphicon-th-list"> </i> Android Apps and Games</a></h4> <hr>
              <h6>Applications and games created by xda-developers users for use on Android. No commercial apps/games allowed.</h6>
              
            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled"> Topics:0 </li>
                <li class="list-unstyled"> Posts:0 </li>
              </ul>
            </section>
            <section class="col-md-3">
              <h4> <a href="#"><i class="glyphicon glyphicon-link"> </i> Last Post Goes from here! </a></h4> <hr>
              <a href="#"><i class="glyphicon glyphicon-user"></i> Moderator</a><br>
              <a href="#"><i class="glyphicon glyphicon-calendar"></i> 2017-04-06 7:57 AM  </a>
            </section>
           
          </section>

          
          
          
      </section>
          
  </div>
</div>
</body>
</html>>
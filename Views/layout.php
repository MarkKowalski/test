<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student</title>
    <script src="/public/js/jquery2.2.1.js"></script>
    <script src="/public/js/jquery-ui.min.js"></script>
    <script src="/public/js/jquery.slides.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>
    <script src="/Public/js/main.js"></script>
    

    <link href="../Public/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/public/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/main.css">
</head>
<body>


  
    
    
    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <h4>Hello, <?php if(!empty($_SESSION['email'])){ echo $_SESSION['email'];}else{echo 'student.';}  ?> </h4>
                <p>
                    <a class="btn btn-primary btn-sm" href="#" role="button">Learn more</a>
                </p>
            </div>
        </div>
        <!--nav test-->
        <div class="row">
            <nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/">Welcome</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/entertaintment">Entertaintment</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="/accomodation">Accomodation<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>
        <li><a href="/transport">Transport</a></li>
        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="/colleges">Colleges<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">College 1-1</a></li>
            <li><a href="#">College 1-2</a></li>
            <li><a href="#">College 1-3</a></li>
          </ul>
        </li>
          <li><a href="/courses">Courses</a></li>
          <li><a href="/contact">Contact</a></li>
      </ul>
  
           <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a type="button" class="btn btn-outline-danger" href="/user/signup">
                                <span class="glyphicon glyphicon-user"></span>
                                SignUp
                            </a>
                        </li>
               <li>
               
               </li>
                        <li>
                            <a type="button" class="btn btn-outline-success" href="/user/login">
                                <span class="glyphicon glyphicon-log-in"></span>
                                LogIn
                            </a>
                        </li>
                    
                    </ul>
        
        
        
        
        
        
        
    </div>
  </div>
</nav>
        </div><!-- row end-->
        <!--nav testend-->
        
<!--Modal Signup/Login start-->

<!--Modal Signup/Login end-->
        <div class="row">
            <div class="col-lg-12">
                Here could go the breadcrumbs

            </div>
        </div>

        <div class="row">

            <?php echo $content ?>




        </div>

        <footer class="row footer" id="footer">




            <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                <h3> Site Info </h3>
                <ul>
                    <li> <a href="#"> Security </a> </li>
                    <li> <a href="#"> Privacy </a> </li>
                    <li> <a href="#"> Legal </a> </li>
                    <li> <a href="#"> Information </a> </li>
                </ul>
            </div>
            <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                <h3> Shortcuts </h3>
                <ul>
                    <li> <a href="#"> Home </a> </li>
                    <li> <a href="#"> Colleges </a> </li>
                    <li> <a href="#"> Courses </a> </li>
                    <li> <a href="#"> Contact </a> </li>
                </ul>
            </div>
            <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                <h3> Social Media </h3>
                <ul>
                    <li> <a href="#"> Facebook </a> </li>
                    <li> <a href="#"> Twitter </a> </li>
                    <li> <a href="#"> Pintrest </a> </li>
                    <li> <a href="#"> YouTube </a> </li>
                </ul>
            </div>

            <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                <h3> Social again </h3>
                <ul>
                    <li>
                        <div class="input-append newsletter-box text-center">
                            <input type="text" class="full text-center" placeholder="Email ">
                            <button class="btn  bg-gray" type="button"> Lorem ipsum <i class="fa fa-long-arrow-right"> </i> </button>
                        </div>
                    </li>
                </ul>
                <ul class="social">

                    <li>
                        <a href="#"> <i class="fa fa-facebook">   </i> </a>
                    </li>
                    <li>
                        <a href="#"> <i class="fa fa-twitter">   </i> </a>
                    </li>
                    <li>
                        <a href="#"> <i class="fa fa-pinterest">   </i> </a>
                    </li>
                    <li>
                        <a href="#"> <i class="fa fa-youtube">   </i> </a>
                    </li>
                </ul>
            </div>

            <!--/.row-->

            <!--/.container-->

            <!--/.footer-->

            <!--/.footer-bottom-->
        </footer>
    </div>


</body>

</html>
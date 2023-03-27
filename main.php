<?php
session_start();
include ('assets/php/connection.php');
include ('assets/php/admin/details.php');
include ('assets/php/admin/badge.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>srms</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <div>
        <div class="header-dark" style="background-image: url(&quot;assets/img/students.jpg&quot;);">
            <nav class="navbar navbar-dark navbar-expand-lg sticky-top navigation-clean-search">
                <div class="container">
                    <a class="navbar-brand" href="#profile"><?php echo $Name; ?></a>
                    <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <form class="form-inline mr-auto" method="POST" action="search.php">
                            <div class="form-group"><label for="search-field">
                                <i class="fa fa-search"></i></label>
                                <input class="form-control search-field" type="search" id="search-field" name="search">
                            </div>
                        </form>
                        <span class="navbar-text">
                            <ul class="nav navbar-nav">
                                <li class="nav-item" role="presentation"><a class="nav-link" href="main.php">Home</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="adminprofile.php">Profile</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="students.php">Students</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="dorms.php">Rooms <span class="badge badge-info"><?php echo $badges; ?></span></a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="converse.php">Forum</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="message.php">Messages</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="notices.php">Notices</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="assets/php/logout.php">Log Out</a></li>
                            </ul>
                        </span>
                    </div>
                </div>
            </nav>
            <div class="container text-center hero" style="padding-top: 60px;">
                <i class="fas fa-home" style="color: rgb(255,255,255);font-size: 80px;"></i>
                <h1 class="text-uppercase">Welcome back</h1>
                <a class="btn btn-outline-info btn-lg" role="button" href="students.php">Get Started</a>
            </div>
        </div>
    </div>
    <section class="text-center" id="privacy" style="padding-top: 200px;padding-bottom: 180px;">
        <div class="container"><i class="fas fa-unlock-alt" style="font-size: 80px;"></i>
            <h1 style="font-size: 60px;">Privacy</h1>
            <p style="font-size: 26px;">Our privacy policy covers every detail and information that is processed and collected within this system. We will not divulge any sensistive information for student privacy. Dully know that we will not be heald accountable for any dataspillage
                which are out of our jurisdiction.</p>
        </div>
    </section>
    <section class="text-center" id="dashboard" style="padding-top: 80px;">
        <div class="jumbotron" style="background-image: url(&quot;assets/img/lecture.jpg&quot;);color: rgb(255,255,255);background-repeat: no-repeat;background-size: cover;background-position: top;background-attachment: fixed;"><i class="fas fa-tachometer-alt" style="font-size: 80px;padding-top: 20px;"></i>
            <h1 style="font-size: 60px;">Dashboard</h1>
            <p>This is a small section where you can check up on what you need to know<br></p><a class="btn btn-info" role="button">Learn more</a></div>
    </section>
    <section id="statistics">
        <div class="jumbotron text-center" style="font-family: Montserrat, sans-serif;background-attachment: fixed;color: rgb(33,37,41);background-color: rgb(255,255,255);"><i class="fas fa-project-diagram" style="font-size: 80px;"></i>
            <h1>Statistics</h1>
            <p style="font-size: 26px;">This section shows the talley of the students in the database.</p>
            <div><canvas data-bs-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Students&quot;,&quot;Rooms&quot;,&quot;Boys&quot;,&quot;Girls&quot;,&quot;Leavers&quot;,&quot;Roomless&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Activity&quot;,&quot;backgroundColor&quot;:[&quot;rgba(69,43,142,0.89)&quot;,&quot;rgba(30,30,30,0.76)&quot;,&quot;rgba(64,134,240,0.82)&quot;,&quot;rgba(251,255,38,0.79)&quot;,&quot;rgba(255,60,48,0.78)&quot;,&quot;rgba(255,102,16,0.9)&quot;],&quot;borderColor&quot;:[&quot;rgba(0,0,0,0.1)&quot;,&quot;rgba(0,0,0,0.1)&quot;,&quot;rgba(0,0,0,0.1)&quot;,&quot;rgba(0,0,0,0.1)&quot;,&quot;rgba(0,0,0,0.1)&quot;,&quot;rgba(0,0,0,0.1)&quot;],&quot;data&quot;:[&quot;10&quot;,&quot;8&quot;,&quot;5&quot;,&quot;5&quot;,&quot;1&quot;,&quot;1&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:true,&quot;legend&quot;:{&quot;display&quot;:true,&quot;position&quot;:&quot;top&quot;},&quot;title&quot;:{&quot;text&quot;:&quot;&quot;}}}"></canvas></div>
        </div>
    </section>
    <div class="footer-dark">
        <footer style="padding-top: 80px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Features</h3>
                        <ul>
                            <li><a href="#">Room Request</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Profile</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Nacit</a></li>
                            <li><a href="#">Tech Support</a></li>
                            <li><a href="#">SRMS</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>NACIT</h3>
                        <p><strong>National Collage Of Information And Technology is a well equipt technical collage that will raise up the next generation of tech experts to the industry and Nations globally.</strong><br><br></p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">NACIT Malawi © 2020 All Rights Reserved LCC Licence</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
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
    <link rel="stylesheet" href="assets/css/profile.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/profile.js"></script>
</head>

<body>
<!--- Landing -->
    <div>
        <div class="header-dark">
            <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search">
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
            <!--- title -->
            <div class="container text-center hero" style="padding-top: 160px;"><i class="fas fa-user-edit text-white" style="font-size: 80px;"></i>
                <h1 class="text-uppercase">Profile Management</h1>
            </div>
        </div> <!-- header dark -->
    </div>
<!--- profile -->
    <section id="profile" style="padding-top: 200px;padding-bottom: 200px">
        <div class="container">
            <!-- username -->
            <form class="row" method="post" action="assets/php/admin/updateUsername.php">
                <div class="form-group col-md-4 offset-md-4">
                    <h4>Update username</h4>
                    <label for="username">Current Username: <?php echo $Name; ?></label>
                    <input class="form-control" type="text" name="username" required="">
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <button class="btn btn-info form-control" type="submit" name="updateUsername">Update</button>
                </div>
            </form>
            <div class="form-group col-md-4 offset-md-4">
                <hr>
            </div>
            <!-- password -->
            <form class="row" method="post" action="assets/php/admin/updatepassword.php">
                <div class="form-group col-md-4 offset-md-4">
                     <h4>Update password</h4>
                    <label for="password">Current Password</label>
                    <input class="form-control" type="password" name="password" required="">
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <label for="password">New Password</label>
                    <input class="form-control" type="password" name="newpassword" required="">
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <label for="password">Confirm New Password</label>
                    <input class="form-control" type="password" name="confirmpassword" required="">
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <button class="btn btn-info form-control" type="submit" name="updatepassword">Update</button>
                </div>
            </form>
        </div>
    </section>
    <!--- footer -->
    <?php include ('footer.php'); ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
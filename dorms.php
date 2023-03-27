<?php
session_start();
include ('assets/php/connection.php');
include ('assets/php/admin/details.php');
include ('assets/php/admin/studentrooms.php');
include ('assets/php/admin/requests.php');
include ('assets/php/admin/badge.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dorm management</title>
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
            <div class="container text-center hero" style="padding-top: 160px;">
                <i class="fas fa-bed text-white" style="font-size: 80px;"></i>
                <h1 class="text-uppercase">Room Management</h1>
            </div>
        </div> <!-- header dark -->
    </div>
<!-- Student rooms -->
    <section class="text-center" id="studentrooms" style="padding-top: 180px;padding-bottom: 180px;">
        <div class="container">
            <h1 style="font-size: 40px;">Student Rooms</h1>
            <div class="table-responsive table-borderless">
                <table class="table table-striped table-bordered table-hover table-light">
                    <thead>
                        <tr>
                            <th>Room#</th>
                            <th>Room Name</th>
                            <th>Student Name</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($resultStudentRoom)) { 
                    while($rowStudentRoom = $resultStudentRoom -> fetch_assoc()){
                    ?>
                        <tr>
                            <td><?php echo $rowStudentRoom['RoomID']; ?></td>
                            <td><?php echo $rowStudentRoom['Name']; ?></td>
                            <td><?php echo $rowStudentRoom['FirstName'] ." ". $rowStudentRoom['LastName'] ; ?></td>
                            <td><?php echo $rowStudentRoom['Gender']; ?></td>
                        </tr>
                    <?php 
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<!-- Banner room request -->
    <div class="jumbotron text-center" style="background-image: url(&quot;assets/img/admin.jpg&quot;);color: rgb(255,255,255);background-repeat: no-repeat;background-size: cover;background-position: top;background-attachment: fixed;padding-bottom: 260px;">
        <i class="fas fa-clipboard-list" style="font-size: 80px;padding-top: 160px;"></i>
        <h1 style="font-size: 60px;">Room Requests</h1>
        <p>This section manages allocation of students to rooms.</p>
    </div> 
<!-- Request room -->
    <section class="text-center" id="roomRequests" style="padding-top: 180px;padding-bottom: 180px;">
        <div class="container">
            <h1 style="font-size: 40px;">Rooms Requests</h1>
            <div class="table-responsive table-borderless">
                <table class="table table-striped table-bordered table-hover table-light">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($resultRequests)) { 
                    while($rowRequests = $resultRequests -> fetch_assoc()){
                    ?>
                        <tr>
                            <td><?php echo $rowRequests['FirstName'] ." ". $rowRequests['LastName'] ; ?></td>
                            <td><?php echo $rowRequests['Gender']; ?></td>
                            <td><?php echo $rowRequests['Date']; ?></td>
                        </tr>
                    <?php 
                        }
                    } else {
                    ?>
                    <p><li class="fas fa-exclamation-triangle" style="color:red;"></li> No room requests available</p>
                    <?php 
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<!-- Banner swap student room -->
    <div class="jumbotron text-center" style="background-image: url(&quot;assets/img/admin.jpg&quot;);color: rgb(255,255,255);background-repeat: no-repeat;background-size: cover;background-position: top;background-attachment: fixed;padding-bottom: 260px;">
        <i class="fas fa-recycle" style="font-size: 80px;padding-top: 200px;"></i>
        <h1 style="font-size: 60px;">Swap Students</h1>
        <p>This section enables editing of student details in the database</p>
    </div>
<!-- swap student Room -->
    <section id="swapstudentroom" style="padding-top: 120px;padding-bottom: 180px;">
        <h1 class="text-center">Student Room Swap</h1>
        <form class="form-horizontal" method="post" action="assets/php/admin/swapstudentroom.php">
            <div class="form-group col-md-4 offset-md-4">
                <label>Student ID</label>
                <input class="form-control" type="text" name="studentID" required="">
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <label>Room</label>
                <select class="form-control" name="roomID">
                    <optgroup label="Column">
                    <option value="1" selected="">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    </optgroup>
                </select>
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <button class="btn btn-info form-control" type="submit" name="swap">Swap</button>
            </div>
        </form>
        <?php if (!empty($_SESSION['swapstudentroom'])){ ?>
            <div class="form-group col-md-4 offset-md-4">
                <em class="form-control alert <?php echo $_SESSION['alert']; ?> "><?= $_SESSION['swapstudentroom']; ?></em>
            </div>
        <?php } unset($_SESSION['swapstudentroom']); ?>
        <p class="text-left col-md-4 offset-md-4" style="font-size: 16px;">Updates are live, students will see immidiate change.</p>
    </section>
<!-- Banner Delete student -->
    <div class="jumbotron text-center" style="background-image: url(&quot;assets/img/admin.jpg&quot;);color: rgb(255,255,255);background-repeat: no-repeat;background-size: cover;background-position: top;background-attachment: fixed;padding-bottom: 260px;">
        <i class="fas fa-user-slash" style="font-size: 80px;padding-top: 160px;"></i>
        <h1 style="font-size: 60px;">Evict Student</h1>
        <p>This section evicts a student from a room</p>
    </div>
<!-- Evict student -->
    <section id="evictstudent" style="padding-top: 180px;padding-bottom: 180px;">
        <form method="post" action="assets/php/admin/evictstudent.php">
            <h1 class="text-center">Eviction Form</h1>
            <div class="form-group col-md-4 offset-md-4">
                <label>Student ID</label>
                <input class="form-control" type="text" name="studentID" required="">
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <button class="btn btn-danger form-control" type="submit" name="evict">Evict Student</button>
            </div>
        </form>
        <?php if (!empty($_SESSION['evictstudent'])){ ?>
            <div class="form-group col-md-4 offset-md-4">
                <em class="form-control alert <?php echo $_SESSION['alert']; ?> "><?= $_SESSION['evictstudent']; ?></em>
            </div>
        <?php } unset($_SESSION['evictstudent']); ?>
        <hr class="col-md-4 offset-md-4">
        <p class="text-left col-md-4 offset-md-4" style="font-size: 16px;">Updates are live, students will see immidiate change.</p>
    </section>
    <!--- footer -->
    <?php include ('footer.php'); ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
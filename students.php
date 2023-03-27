<?php
session_start();
include ('assets/php/connection.php');
include ('assets/php/admin/details.php');
include ('assets/php/admin/students.php');
include ('assets/php/admin/badge.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Student management</title>
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
                            <li class="nav-item" role="presentation"><a class="nav-link" href="dorms.php">Rooms  <span class="badge badge-info"><?php echo $badges; ?></span></a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="converse.php">Forum</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="message.php">Messages</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="notices.php">Notices</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="assets/php/logout.php">Log Out</a></li>
                        </ul>
                    </span>
                </div>
            </div>
        </nav>
        <div class="container text-center hero" style="padding-top: 160px;"><i class="fas fa-users text-white" style="font-size: 80px;"></i>
            <h1 class="text-uppercase">Student Management</h1>
        </div>
    </div> 
<!-- Student List -->
    <section class="text-center" id="students" style="padding-top: 180px;padding-bottom: 200px;">
        <div class="container">
            <h1>Student List</h1>
            <div class="table-responsive table-borderless">
                <table class="table table-striped table-bordered table-hover table-light">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($resultStudents)) { 
                    while($rowStudents = $resultStudents -> fetch_assoc()){
                    ?>
                        <tr>
                            <td><?php echo $rowStudents['ID']; ?></td>
                            <td><?php echo $rowStudents['FirstName'] ." ". $rowStudents['LastName'] ; ?></td>
                            <td><?php echo $rowStudents['Gender']; ?></td>
                            <td><?php echo $rowStudents['Email']; ?></td>
                            <td><?php echo $rowStudents['Balance']; ?></td>
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
<!-- Banner Add students -->
    <div class="jumbotron text-center" style="background-image: url(&quot;assets/img/admin.jpg&quot;);color: rgb(255,255,255);background-repeat: no-repeat;background-size: cover;background-position: top;background-attachment: fixed;padding-bottom: 260px;">
        <i class="fas fa-user-plus" style="font-size: 80px;padding-top: 160px;"></i>
        <h1 style="font-size: 60px;">Add Student</h1>
        <p>This section enables addition of students in the database</p>
    </div> 
<!--  Add students -->
    <section id="addstudent" style="padding-top: 80px;padding-bottom: 80px;">
        <h1 class="text-center">Registration Form</h1>
        <form class="form-horizontal" method="post" action="assets/php/admin/addstudent.php">
            <div class="form-group col-md-4 offset-md-4">
                <label>First Name</label>
                <input class="form-control" type="text" name="FirstName" required="">
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <label>Last Name</label>
                <input class="form-control" type="text" name="LastName" required="">
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <label>Email</label>
                <input class="form-control" type="text" name="Email" required="">
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <label>Gender</label>
                <select class="form-control" name="Gender">
                    <optgroup label="Gender">
                        <option value="Male" selected="">Male</option>
                        <option value="Female">Female</option>
                    </optgroup>
                </select>
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <label>Username</label>
                <input class="form-control" type="text" name="Username" required="">
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <label>Password</label>
                <input class="form-control" type="password" name="Password" required="">
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <button class="btn btn-info form-control" type="submit" name="add">Add</button>
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <button class="btn btn-dark form-control" type="reset">Reset</button>
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <?php if (!empty($_SESSION['addstudent'])){ ?>
                    <div class="alert <?php echo $_SESSION['alert']; ?> form-control">
                        <em><?= $_SESSION['addstudent']; ?></em>
                    </div>
                <?php } unset($_SESSION['addstudent']); ?>
            </div>
        </form>
    </section>
<!-- Banner edit students -->
        <div class="jumbotron text-center" style="background-image: url(&quot;assets/img/admin.jpg&quot;);color: rgb(255,255,255);background-repeat: no-repeat;background-size: cover;background-position: top;background-attachment: fixed;padding-bottom: 260px;">
            <i class="fas fa-users-cog" style="font-size: 80px;padding-top: 160px;"></i>
            <h1 style="font-size: 60px;">Edit Students</h1>
            <p>This section enables editing of student details in the database</p>
        </div>
<!-- alter students -->
    <section id="alterstudent" style="padding-top: 120px;padding-bottom: 180px;">
        <h1 class="text-center">Edition Form</h1>
        <form class="form-horizontal" method="post" action="assets/php/admin/alterstudent.php">
            <div class="form-group col-md-4 offset-md-4">
                <label>Student ID</label>
                <input class="form-control" type="text" name="ID" required="">
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <label>Detail</label>
                <select class="form-control" name="Column">
                    <optgroup label="Column">
                    <option value="FirstName" selected="">Firstname</option>
                    <option value="LastName">Lastname</option>
                    <option value="Email">Email</option>
                    <option value="Gender">Gender</option>
                    <option value="Username">Username</option>
                    <option value="Password">Password</option>
                    </optgroup>
                </select>
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <label>Replacement</label>
                <input class="form-control" type="text" name="Replacement" required="">
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <button class="btn btn-info form-control" type="submit" name="Update">Update</button>
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <?php if (!empty($_SESSION['alterstudent'])){ ?>
                    <div class="alert <?php echo $_SESSION['alert']; ?> form-control">
                        <em><?= $_SESSION['alterstudent']; ?></em>
                    </div>
                <?php } unset($_SESSION['alterstudent']); ?>
            </div>
        </form>
        <p class="text-left col-md-4 offset-md-4" style="font-size: 26px;">Additions &amp; updates are live, students will see immidiate change.</p>
    </section>
<!-- Banner delete student -->
        <div class="jumbotron text-center" style="background-image: url(&quot;assets/img/admin.jpg&quot;);color: rgb(255,255,255);background-repeat: no-repeat;background-size: cover;background-position: top;background-attachment: fixed;padding-bottom: 260px;">
            <i class="fas fa-users-cog" style="font-size: 80px;padding-top: 160px;"></i>
            <h1 style="font-size: 60px;">Delete Student</h1>
            <p>This section deletes a student from the database</p>
        </div>
<!-- Delete student -->
    <section id="deletestudent" style="padding-top: 180px;padding-bottom: 180px;">
        <form method="post" action="assets/php/admin/deletestudent.php">
            <h1 class="text-center">Deletion Form</h1>
            <div class="form-group col-md-4 offset-md-4">
                <label>Student ID</label>
                <input class="form-control" type="text" name="ID" required="">
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <button class="btn btn-danger form-control" type="submit" name="delete">Delete</button>
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <?php if (!empty($_SESSION['deletestudent'])){ ?>
                    <div class="alert <?php echo $_SESSION['alert']; ?> form-control">
                        <em><?= $_SESSION['deletestudent']; ?></em>
                    </div>
                <?php } unset($_SESSION['deletestudent']); ?>
            </div>
        </form>
        <hr class="col-md-4 offset-md-4">
        <p class="text-left col-md-4 offset-md-4" style="font-size: 26px;">Additions &amp; updates are live, students will see immidiate change. Only Student ID is required to delete them.</p>
    </section>
<!-- footer -->
    <?php include ('footer.php'); ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
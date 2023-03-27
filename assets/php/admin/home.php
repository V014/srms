<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SRMS</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body data-spy="scroll" data-target="#menu">
<!--- Navigation -->
<nav class="navbar navbar-dark navbar-expand-md fixed-top container-fluid">
    <a class="navbar-brand" href="#profile"><?php include ('details.php') ?></a> <!--- Admin name -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ml-auto"> <!--- Floats text to right -->
          <li class="nav-item">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#profile">Profile</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="#dorms">Boards <span class="badge badge-pill badge-light"><?php include('badge.php'); ?></span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Rooms
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#studentlist">Student List</a>
              <a class="dropdown-item" href="#boysroom">Boys Room</a>
              <a class="dropdown-item" href="#girlsroom">Girls Room</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#requests">Room Requests</a>
              <a class="dropdown-item" href="#leaving">Leavers</a>
              <a class="dropdown-item" href="#statistics">Statistics</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="alert('Click get started, type in field to add to notice board, click auto allocate to assign students to rooms.')">Help?</a> 
          </li>
        </ul>
      </div>
</nav> 
<!--- Home Section -->
<div id="home">
<!--- Start Landing Page -->
    <div class="landing">
        <div class="home-wrap">
            <div class="home-inner">
            </div>
        </div>
    </div>
<!--- Start Landing Page caption -->
    <div class="caption center-block text-center">
      <h3>Student Residential Management System</h3>
      <p class="lead text-white">National Collage of Information and Technology</p>
      <a class="btn btn-outline-info" href="#dorms">Get started</a>
    </div>
</div> 
<!--- Start About Section -->
<div id="about">
  <div class="jumbotron">
    <h3 class="heading padding">About</h3>
    <div class="row">
      <div class="col-md-4 text-center">
         <i class="fa fa-desktop"></i>
        <h4>Full Screen Landing</h4>
        <p>Nest features a full screen, responsive landing page using Bootstrap.</p>
      </div>
      <div class="col-md-4 text-center">
        <i class="fa fa-mobile"></i>
        <h4>Smooth Scrolling</h4>
        <p>The Nest Bootstrap navigation menu features smooth scrolling links.</p>
      </div>
      <div class="col-md-4 text-center">
        <i class="fa fa-laptop"></i>
        <h4>Portability</h4>
        <p>The system is available when you need it and isn't limited to distance or devices.</p>
      </div>
      <div class="col-md-4 text-center">
        <i class="fa fa-question"></i>
        <h4>Dashboard</h4>
        <p>SRMS provides a minimal dashboard that shows you what you need to know.</p>
      </div>
      <div class="col-md-4 text-center">
        <i class="fa fa-info"></i>
        <h4>Notice Board</h4>
        <p>Post important information to all students, your dashboard will also display it.</p>
      </div>
      <div class="col-md-4 text-center">
        <i class="fa fa-street-view"></i>
        <h4>Allocate</h4>
        <p>An allocation button is inclusive with the system to assign students to rooms efficiently.</p>
      </div>
      <div class="col-md-4 text-center">
        <i class="fa fa-user"></i>
        <h4>Profile</h4>
        <p>If you'd like to update your cridentials, theres a small section where you can do so below.</p>
      </div>
      <div class="col-md-4 text-center">
        <i class="fa fa-book"></i>
        <h4>Student List</h4>
        <p>Theres a table that will display all students registed with their details to easily identify them.</p>
      </div>
      <div class="col-md-4 text-center">
        <i class="fa fa-pen"></i>
        <h4>Rooms & Requests</h4>
        <p>Theres a table that displays who requested a room, the tables below it show the specifit room allocation.</p>
      </div>
    </div> <!--- End Row -->
  </div> <!--- End Jumbotron -->
</div> 
<!--- End About Section -->

<!--- start Profile Section -->
<div id="profile">
  <div class="container-fluid padding">
    <h3 class="heading">Profile</h3>
      <div class="row no-padding">
          <div class="col-md-6">
            <img class="portfolio" src="../img/1.png">
          </div>
          <div class="col-md-6">
            <img class="portfolio" src="../img/3.png">
          </div>
      </div>
      <div class="col-md-12 offset-md-4">
        <form class="form form-horizontal padding" action="profile.php" method="POST">
          <div class="form-group col-md-4">
            <label for="username">Update User</label>
            <input type="text" class="form-control" placeholder="<?php echo $Name; ?>" name="Name">
          </div>
          <div class="form-group col-md-4">
              <label for="username">Update password</label>
              <input type="password" class="form-control" placeholder="Password" name="Password">
          </div>
          <div class="form-group col-md-2 offset-md-1">
            <input type="submit" class="form-control btn btn-dark" name="Update" value="Update">
          </div>
        </form>
      </div>
  </div> <!--- End Container Fluid -->
</div> 
<!--- End Profile Section -->

<!--- Start Dorms Section -->
<div id="dorms">
  <h3 class="heading">Dorm Management</h3>
    <div class="col-md-8 offset-md-2">
      <div class="card text-center">
        <img class="card-img-top" src="../img/5.png">
        <div class="card-body">
          <h4>Notice Board</h4>
          <p>Send students notices which appear on their dashboard.</p> 
          <form class="form form-horizontal" method="post" action="notification.php">
            <div class="form-group col-md-8 offset-md-2 col-sm-8 offset-sm-2">
                <input type="text" class="form-control" placeholder="Write to students" name="Notice">
            </div>
            <div class="form-group col-md-4 offset-md-4 col-sm-4 offset-sm-4">
                <Input type="submit" class="form-control btn btn-info" value="Send" name="Notify">
            </div>
            <div class="form-group col-md-4 offset-md-4 col-sm-4 offset-sm-4">
              <Input type="submit" class="form-control btn btn-danger" value="Delete" name="Delete">
            </div>
          </form>       
        </div>
      </div>
    </div>
    <div class="col-md-8 offset-md-2">
      <div class="card text-center">
        <img class="card-img-top" src="../img/6.png">
        <div class="card-body">
          <h4>Dashboard</h4>
          <p>This is a small section where you can check up on what you need to know</p>
          <strong><?php include ('dashboard.php'); ?></strong>
        </div>
      </div>
    </div>
</div> 
<!--- Allocation Section -->
<div id="allocation">
  <h3 class="heading">Room allocation</h3>
    <p class="lead col-12 text-center">Click 'auto allocate' to automatically allocate a student to an available room.</p>
  <form class="form form-horizontal" method="POST" action="allocation.php">
    <div class="form-group">
     <input type="submit" class="btn btn-dark col-md-2 offset-md-5 col-sm-4 offset-sm-4" value="Allocate" name="Auto"> 
    </div>
  </form>
</div>
<!--- Student Table -->
<div id="studentlist">
  <div class="col-md-12 table-responsive">
    <table class="table table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th colspan="10" class="text-center"><h2>Student List</h2></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="col">Student ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Gender</th>
          <th scope="col">Email</th>
          <th scope="col">Balance</th>
        </tr>
        <?php
          include ('tables.php');
          while($row = $result -> fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $row['ID']; ?></td>
          <td><?php echo $row['FirstName']; ?></td>
          <td><?php echo $row['LastName']; ?></td>
          <td><?php echo $row['Gender']; ?></td>
          <td><?php echo $row['Email']; ?></td>
          <td><?php echo $row['Balance']; ?></td>
        </tr>
        <?php
          }
        ?>
      <tbody>
    </table>
  </div>
</div>
<!--- Add Student -->
<div id="addstudent">
  <div class="jumbotron padding">
    <div class="text-center">
        <h3>Add Student</h3>
        <p class="text-center">This section enables you to add students to the list.</p>
    </div>
    <form class="form form-horizontal" method="POST" action="addstudent.php">
      <div class="form-group col-md-4 offset-md-4"> <!-- First Name -->
        <input type="text" class="form-control" placeholder="First Name" name="FirstName" required>
      </div>
      <div class="form-group col-md-4 offset-md-4"> <!-- Last Name -->
        <input type="text" class="form-control" placeholder="Last Name" name="LastName" required>
      </div>
      <div class="form-group col-md-4 offset-md-4"> <!-- Email -->
        <input type="email" class="form-control" placeholder="Email" name="Email" required>
      </div>
      <div class="form-group col-md-4 offset-md-4"> <!-- Gender -->
          <select class="form-control" name="Gender" id="Gender">
            <option>Male</option>
            <option>Female</option>
          </select>
      </div>
      <div class="form-group col-md-4 offset-md-4"> <!-- Username -->
          <input type="text" class="form-control" name="Username" placeholder="Username" required>
      </div>
      <div class="form-group col-md-4 offset-md-4"> <!-- Password -->
          <input type="password" class="form-control" name="Password" placeholder="Password" required>
      </div>
      <div class="col-md-4 offset-md-4 form-group">
          <input type="submit" class="btn btn-success form-control" name="Add" value="Add">
      </div>
      <div class="col-md-4 offset-md-4 form-group">
          <input type="reset" value="Reset" class="btn btn-danger form-control">
      </div>
    </form>
  </div>
</div>
<!--- Alter Students -->
<div id="alterstudent">
    <div class="padding">
        <div class="text-center">
            <h3>Alter Students</h3>
            <p>Update or delete student information in this section.</p>
        </div>
        <form class="form form-horizontal" method="POST" action="alterstudent.php">
            <div class="form-group col-md-4 offset-md-4">
                <input type="number" class="form-control" name="ID" placeholder="ID" required>
            </div>
            <div class="form-group col-md-4 offset-md-4"> <!-- Column -->
                <select class="form-control" name="Column" id="Column">
                    <option>FirstName</option>
                    <option>LastName</option>
                    <option>Email</option>
                    <option>Gender</option>
                    <option>Username</option>
                    <option>Password</option>
                    <option>Balance</option>
                    <option>Enrolled</option>
                </select>
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <input type="text" class="form-control" name="Replacement" placeholder="Replacement">
            </div>
            <div class="form-group col-md-4 offset-md-4 col-sm-4 offset-sm-4">
                <Input type="submit" class="form-control btn btn-info" value="Update" name="Update">
            </div>
            <div class="form-group col-md-4 offset-md-4 col-sm-4 offset-sm-4">
                <Input type="submit" class="form-control btn btn-danger" value="Delete" name="Delete">
            </div>
            <div class="form-group col-md-4 offset-md-4 col-sm-4 offset-sm-4">
              <Input type="Reset" class="form-control btn btn-dark" value="Reset" name="Reset">
            </div>
        </form>
    </div>
</div>
<!--- Requests Table -->
<div id="requests">
  <div class="col-md-12 table-responsive">
    <table class="table table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th colspan="10" class="text-center"><h2>Room Requests</h2></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="col">Student ID</th>
          <th scope="col">Fitst Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Gender</th>
        </tr>
        <?php
          include('tables.php');
          while($row2 = $result2 -> fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $row2['student_rooms.StudentID']; ?></td>
          <td><?php echo $row2['FirstName']; ?></td>
          <td><?php echo $row2['LastName']; ?></td>
          <td><?php echo $row2['Gender']; ?></td>
        </tr>
        <?php
          }
        ?>
      <tbody>
    </table>
  </div>
</div>
<!--- Boys Room Table -->
<div id="boysroom">
  <div class="col-md-12 table-responsive">
    <table class="table table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th colspan="10" class="text-center"><h2>Boys Room</h2></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="col">StudentID</th>
          <th scope="col">Room Number</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
        </tr>
        <?php
          include('tables.php');
          while($row3 = $result3 -> fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $row3['StudentID']; ?></td>
          <td><?php echo $row3['RoomID']; ?></td>
          <td><?php echo $row3['FirstName']; ?></td>
          <td><?php echo $row3['LastName']; ?></td>
        </tr>
        <?php
          }
        ?>
      <tbody>
    </table>
  </div>
</div>
<!--- Girls Room Table -->
<div id="girlsroom">
  <div class="col-md-12 table-responsive">
    <table class="table table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th colspan="10" class="text-center"><h2>Girls Room</h2></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="col">StudentID</th>
          <th scope="col">Room Number</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
        </tr>
        <?php
          include('tables.php');
          while($row4 = $result4 -> fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $row4['StudentID']; ?></td>
          <td><?php echo $row4['RoomID']; ?></td>
          <td><?php echo $row4['FirstName']; ?></td>
          <td><?php echo $row4['LastName']; ?></td>
        </tr>
        <?php
          }
        ?>
      <tbody>
    </table>
  </div>
</div>
<!--- Add Students to rooms -->
<div id="manualallocate">
    <div class="jumbotron padding">
        <div class="text-center container-fluid">
            <h3>Add Students to rooms</h3>
            <p>Incase students are not able to request, you can manually allocate them.</p>
        </div>
        <form class="form form-horizontal" method="POST" action="manualallocate.php">
            <div class="form-group col-md-4 offset-md-4">
                <input type="number" class="form-control" placeholder="ID" name="ID">
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <input type="submit" class="form-control btn btn-dark" name="Allocate" value="Allocate">
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <input type="submit" class="form-control btn btn-danger" name="Remove" value="Remove">
            </div>
        </form>
    </div>
</div>
<!--- Leaving Table -->
<div id="leaving">
  <div class="col-md-12 table-responsive">
    <table class="table table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th colspan="10" class="text-center"><h2>Leavers Table</h2></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="col">StudentID</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Reason</th>
          <th scope="col">Explanation</th>
        </tr>
        <?php
          include('tables.php');
          while($row5 = $result5 -> fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $row5['StudentID']; ?></td>
          <td><?php echo $row5['FirstName']; ?></td>
          <td><?php echo $row5['LastName']; ?></td>
          <td><?php echo $row5['Reason']; ?></td>
          <td><?php echo $row5['Explanation']; ?></td>
        </tr>
        <?php
          }
        ?>
      <tbody>
    </table>
  </div>
</div>
<!--- End Leaving Table -->

<!--- Start Graph Section -->
<div id="statistics">
  <div class="col-md-12 table-responsive">
    <table class="table table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th colspan="10" class="text-center"><h2>Statistics Table</h2></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="col">Students</th>
          <th scope="col">Boys</th>
          <th scope="col">Girls</th>
          <th scope="col">Requests</th>
          <th scope="col">Leaving</th>
        </tr>
        <?php
          include('tables.php');
          while($row6 = $result6 -> fetch_assoc()){
          while($row7 = $result7 -> fetch_assoc()){
          while($row8 = $result8 -> fetch_assoc()){
          while($row9 = $result9 -> fetch_assoc()){
          while($row10 = $result10 -> fetch_assoc()){
        ?>
        <tr>
          <td> <!-- Students -->
            <div class="progress">
              <div class="progress-bar" style="width:<?php echo $row6['COUNT(ID)']; ?>%">
                <?php echo $row6['COUNT(ID)']; ?>
              </div>
            </div>
          </td>
          <td> <!-- Boys -->
            <div class="progress">
              <div class="progress-bar bg-success" style="width:<?php echo $row7['COUNT(student_rooms.StudentID)']; ?>%">
                <?php echo $row7['COUNT(student_rooms.StudentID)']; ?>
              </div>
            </div>
          </td>
          <td> <!-- Girls -->
            <div class="progress">
            <div class="progress-bar bg-success" style="width:<?php echo $row8['COUNT(student_rooms.StudentID)']; ?>%">
                <?php echo $row8['COUNT(student_rooms.StudentID)']; ?>
              </div>
            </div>
          </td>
          <td> <!-- Requests -->
            <div class="progress">
              <div class="progress-bar bg-caution" style="width:<?php echo $row9['COUNT(ID)']; ?>%">
                <?php echo $row9['COUNT(ID)']; ?>
              </div>
            </div>
          </td>
          <td> <!-- Progress -->
            <div class="progress">
              <div class="progress-bar bg-danger" style="width:<?php echo $row10['COUNT(ID)']; ?>%">
                <?php echo $row10['COUNT(ID)']; ?>
              </div>
            </div>
          </td>
        </tr>
        <?php
          }// leaving
          }// requesting
          }// boys
          }// girls
          }// students
        ?>
      <tbody>
    </table>
  </div>
</div>
<!--- Feedback Table -->
<div id="feedback">
  <div class="col-md-12 table-responsive">
    <table class="table table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th colspan="10" class="text-center"><h2>Feedback</h2></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Feedback</th>
          <th scope="col">StudentID</th>
          <th scope="col">Response</th>
          <th scope="col">Received</th>
          <th scope="col">Sent</th>
        </tr>
        <?php
          include('tables.php');
          while($row11 = $result11 -> fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $row11['ID']; ?></td>
          <td><?php echo $row11['Feedback']; ?></td>
          <td><?php echo $row11['StudentID']; ?></td>
          <td><?php echo $row11['Response']; ?></td>
          <td><?php echo $row11['Received']; ?></td>
          <td><?php echo $row11['Sent']; ?></td>
        </tr>
        <?php
          }
        ?>
      <tbody>
    </table>
  </div>
</div>
<!--- Respond to feedback -->
<div id="response">
    <div class="text-center padding">
        <h2>Response</h2>
        <p>Respond to student's queries.</p>
    </div>
    <form class="form-horizontal" method="POST" action="response.php">
        <div class="form-group col-md-4 offset-md-4">
            <input type="number" class="form-control" placeholder="ID" name="ID">
        </div>
        <div class="form-group col-md-4 offset-md-4">
            <input type="text" class="form-control" placeholder="Response" name="Response">
        </div>
        <div class="form-group col-md-2 offset-md-5">
            <input type="submit" class="form-control btn btn-primary" name="Respond" value="Respond">
        </div>
        <div class="form-group col-md-2 offset-md-5">
            <input type="submit" class="form-control btn btn-danger" name="Delete" value="Delete">
        </div>
    </form>
</div>
<!-- Start Contact Section -->
<div class="footer" id="contact">
    <div class="row">
            <div class="col-md-4 text-center">
                <h2>SRMS</h2>
                <p>At our core is a collection of design and development solutions that represent everything your education needs to compete in the modern marketplace.</p>
            </div>
            <div class="col-md-4 text-center">
                <h2>Our Solution</h2>
                <p>Our solutions represent the market best practice to inspire those who want to develop the right way without parting from the best skills available.</p>
            </div>
            <div class="col-md-4 text-center">
                <h2>Mission</h2>
                <p>SRMS is a gate way to understanding user friendliness, functionality and fluid design, you will find inspiration from our solution.</p>
            </div>
            <div class="col-md-4 text-center">
                <strong>Our Location</strong>
                <p>Old Data-Center<br>Africa, Malawi<br>Blantyre, Chichiri 1</p>
            </div>
            <div class="col-md-4 text-center">
                <strong>Contact Info</strong>
                <p>(+265) 888-8888-888<br>(+265) 099-9999-222<br>srms@gmail.com</p>
            </div>
            <div class="col-md-4 text-center">
                <strong>Availability</strong>
                <p>From Monday: 8am - 5pm<br>Till Friday: 8am - 12pm<br>Weekend: Weekend Students</p>
            </div>        
    </div> <!-- End Row -->
</div>
<!--- End contact Section -->

<!--- Script Source Files -->
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/fontawesome.min.js"></script>
<script src="../js/all.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
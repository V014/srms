<?php
session_start();
$ID = $_SESSION['ID'];
include ('assets/php/connection.php');
include ('assets/php/details.php');
include ('assets/php/dashboard.php');
//include ('assets/php/responses.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Room management</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
<!--- Landing -->
    <div class="header-dark">
        <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search">
            <div class="container">
                <a class="navbar-brand" href="profile.php"><?php echo "$FirstName $LastName"; ?></a>
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
                            <li class="nav-item" role="presentation"><a class="nav-link" href="home.php">Home</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="profile.php">Profile</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="room.php">Room</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="forum.php">Forum</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="feedback.php">Feedback</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="assets/php/logout.php">Log Out</a></li>
                        </ul>
                    </span>
                </div>
            </div>
        </nav>
<!--- Room dashboard -->
        <section class="container text-center hero text-white">
            <i class="fas fa-bed" style="font-size: 80px;padding-top: 20px;"></i>
            <h1 style="font-size: 60px;">Room Management</h1>
            <div class="table-responsive">
                <table class="table table-striped table-dark col-md-6 offset-md-3 text-left">
                    <tbody>
                        <tr>
                            <td><i class="fas fa-bed" style="font-size: 20px;"></i> Room Number</td>
                            <td><?php echo $RoomID; ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-user-friends" style="font-size: 20px;"></i> Roommate</td>
                            <td><?php echo $Roommate; ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-user-plus" style="font-size: 20px;"></i> Room Request</td>
                            <td><?php echo $Request; ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-user-minus" style="font-size: 20px;"></i> Leave Request</td>
                            <td><?php echo $Leave; ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-user-times" style="font-size: 20px;"></i> Room Leave Request</td>
                            <td><?php echo $LeaveRoom; ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-user-check" style="font-size: 20px;"></i> Joined</td>
                            <td><?php echo $Joined; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>  
        </section>
    </div>
<!--- room Request -->
    <section id="request" style="padding-top: 200px;padding-bottom: 200px">
        <div class="container">
            <div class="text-center">
                <i class="fas fa-door-open" style="font-size: 80px;"></i>
                <h1 style="font-size: 60px;">Request Room</h1>       
            </div>

            <form id="rooms" method="post" action="assets/php/room_request.php">
                <div class="form-group col-md-4 offset-md-4">
                    <p>You will be notified when your room request has been approved.</p>
                </div>
                <div class="form-group col-md-2 col-md-4 offset-md-4">
                    <button class="btn btn-primary form-control" type="submit" name="request">Request room</button>
                </div>
            </form>
            <form id="rooms" method="post" action="assets/php/room_request.php">
                <div class="form-group col-md-2 col-md-4 offset-md-4">
                    <button class="btn btn-dark form-control" type="submit" name="cancel">Undo</button>
                </div>
            </form>
            <?php if (!empty($_SESSION['request'])){ ?>
                <div class="form-group col-md-4 offset-md-4">
                    <em class="form-control alert <?php echo $_SESSION['alert']; ?> "><?= $_SESSION['request']; ?></em>
                </div>
            <?php } unset($_SESSION['request']); ?>
        </div>
    </section>
<!--- Banner Request Leave -->
    <div class="jumbotron text-center" style="background-image: url(&quot;assets/img/admin.jpg&quot;);color: rgb(255,255,255);background-repeat: no-repeat;background-size: cover;background-position: top;background-attachment: fixed;padding-bottom: 260px;">
        <i class="fas fa-user-minus" style="font-size: 80px;padding-top: 200px;"></i>
        <h1 style="font-size: 60px;">Request Leave</h1>
        <p>Breifly leave for the weekend or short period.</p>
    </div> 
<!--- leave management -->
    <section id="man" style="padding-top: 200px;padding-bottom: 200px">
        <div class="container">
            <form method="post" action="assets/php/leave_request.php">
                <div class="form-group col-md-4 offset-md-4">
                    <h1>Leave Form</h1>
                    <label for="leaving">Leaving</label>
                    <input class="form-control" type="date" name="leaving">
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <label for="arriving">Arriving</label>
                    <input class="form-control" type="date" name="arriving">
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <label for="arriving">Reason</label>
                    <textarea class="form-control" name="reason" placeholder="Explanation here..." required=""></textarea>
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <p>You will be notified when your leave request has been approved.</p>
                </div>
                <div class="form-group col-md-2 col-md-4 offset-md-4">
                    <button class="btn btn-primary form-control" type="submit" name="leave">Leave</button>
                </div>
            </form>
            <form method="post" action="assets/php/leave_request.php">
                <div class="form-group col-md-2 col-md-4 offset-md-4">
                    <button class="btn btn-dark form-control" type="submit" name="cancel">Undo</button>
                </div>
            </form>
            <?php if (!empty($_SESSION['leave'])){ ?>
                <div class="form-group col-md-4 offset-md-4">
                    <em class="form-control alert <?php echo $_SESSION['alert']; ?> "><?= $_SESSION['leave']; ?></em>
                </div>
            <?php } unset($_SESSION['leave']); ?>
        </div>
    </section>
<!--- Banner Leave room -->
    <div class="jumbotron text-center" style="background-image: url(&quot;assets/img/admin.jpg&quot;);color: rgb(255,255,255);background-repeat: no-repeat;background-size: cover;background-position: top;background-attachment: fixed;padding-bottom: 260px;">
        <i class="fas fa-user-times" style="font-size: 80px;padding-top: 200px;"></i>
        <h1 style="font-size: 60px;">Leave Room</h1>
        <p>Leave or request an exchange of rooms.</p>
    </div> 
<!--- leave Room -->
    <section id="leaving" style="padding-top: 200px;padding-bottom: 200px">
        <div class="container">
            <form id="rooms" method="post" action="assets/php/leave_room.php">
                <div class="form-group col-md-4 offset-md-4">
                    <h1>Leave Room</h1>
                    <p>You will be notified when your leave request has been approved.</p>
                </div>
                <div class="form-group col-md-2 col-md-4 offset-md-4">
                    <button class="btn btn-primary form-control" type="submit" name="leave">Leave Room</button>
                </div>
            </form>
            <form id="rooms" method="post" action="assets/php/leave_room.php">
                <div class="form-group col-md-2 col-md-4 offset-md-4">
                    <button class="btn btn-dark form-control" type="submit" name="cancel">Undo</button>
                </div>
            </form>
            <?php if (!empty($_SESSION['leave-room'])){ ?>
                <div class="form-group col-md-4 offset-md-4">
                    <em class="form-control alert <?php echo $_SESSION['alert']; ?> "><?= $_SESSION['leave-room']; ?></em>
                </div>
            <?php } unset($_SESSION['leave-room']); ?>
        </div>
    </section>
<!--- footer -->
<?php include ('footer.php'); ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
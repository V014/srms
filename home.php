<?php
session_start();
include ('assets/php/connection.php');
include ('assets/php/utils.php');
include ('assets/php/details.php');
include ('assets/php/dashboard.php');
include ('assets/php/noticeboard.php');

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
<!--- Landing -->
    <div>
        <div class="header-dark">
            <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="profile.php"><?php echo "$FirstName $LastName"; ?></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
            <div class="container text-center hero" style="padding-top: 20px;"><i class="fas fa-tachometer-alt text-white" style="font-size: 80px;padding-top: 20px;"></i>
                <h1 class="text-uppercase">Dashboad</h1>
                <div class="table-responsive">
                <table class="table table-striped table-dark col-md-6 offset-md-3">
                    <tbody>
                        <tr>
                            <td>Student ID</td>
                            <td><?php echo $_SESSION['ID']; ?></td>
                        </tr>
                        <tr>
                            <td><a href="room.php" style="color: lightblue;">Room Number</a></td>
                            <td><?php echo $RoomID; ?></td>
                        </tr>
                        <tr>
                            <td><a href="profile.php" style="color: lightblue;">Roommate</a></td>
                            <td><?php echo $Roommate; ?></td>
                        </tr>
                        <tr>
                            <td>Balance</td>
                            <td><?php echo $Balance; ?></td>
                        </tr>
                        <tr>
                            <td>Last login</td>
                            <td>
                                <?php
                                $date = cleandate($LastEntry);
                                $time = cleantime($LastEntry);
                                echo $date . ", " . $time;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="profile.php" style="color: lightblue;">Forum</a></td>
                            <td><?php echo $Forum; ?></td>
                        </tr>
                        <tr>
                            <td><a href="room.php" style="color: lightblue;">Location</a></td>
                            <td><div id="location"></div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
<!--- Notice -->
    <section id="Notice" style="padding-top: 200px;padding-bottom: 200px">
        <div class="container">
            <div class="text-center">
                <i class="fas fa-chalkboard" style="font-size: 80px;"></i>
                <h1 class="text-uppercase">Notice Borad</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <p>
                        <?php 
                        $date = cleandate($Datetime);
                        $time = cleantime($Datetime);
                        echo $date . ", " . $time; 
                        ?>                
                    </p>
                    <h1><?= $Title; ?></h1>
                    <p style="font-size: 26px;"><?= $Notice; ?></p>
                    <em class="lead" style="font-size: 16px;">Public notice from boarding staff management</em>
                </div>
            </div>
        </div>
    </section>
<!--- footer -->
<?php include ('footer.php'); ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script>
        var x = document.getElementById("location");
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
        }
    </script>
</body>

</html>
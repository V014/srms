<?php
session_start();
$ID = $_SESSION['ID'];
include ('assets/php/connection.php');
include ('assets/php/details.php');
include ('assets/php/utils.php');

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
<!--- Bio -->
            <section class="hero" id="bio">
                <div class="container">
                    <form class="row text-white" method="post" action="assets/php/profile.php" enctype="multipart/form-data">
                        <div class="form-group col-md-4 offset-md-4">
                            <div class="text-center">
                                <?php if (!empty($Imagedir)) { ?>
                                    <img src="assets/profile/<?= $Imagedir; ?>" id="profileDisplay" name="profileDisplay" onclick="triggerClick()">
                                    <label>Profile picture</label>
                                    <input type="file" name="profileImage" id="profileImage" style="display: none;" onchange="displayImage(this)">
                                <?php } else { ?>
                                    <img src="assets/img/icon.png" id="profileDisplay" name="profileDisplay" onclick="triggerClick()">
                                    <label for="image">Upload image</label>
                                    <input type="file" name="profileImage" id="profileImage" style="display: none;" onchange="displayImage(this)">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group col-md-4 offset-md-4">
                            <button class="btn btn-primary form-control" type="submit" name="updateImg">Change</button>
                        </div>
                        <div class="form-group col-md-4 offset-md-4">
                            <button class="btn btn-danger form-control" type="submit" name="removeImg">Remove</button>
                        </div>
                        <div class="form-group col-md-4 offset-md-4">
                        <?php if (!empty($_SESSION['profile'])){ ?>
                            <div class="alert <?php echo $_SESSION['alert']; ?> form-control">
                                <em><?= $_SESSION['profile']; ?></em>
                            </div>
                        <?php } unset($_SESSION['profile']); ?>
                        </div>
                    </form>
                </div>
            </section>
        </div> <!-- header dark -->
    </div>
<!--- profile -->
    <section id="profile" style="padding-top: 200px;padding-bottom: 200px">
        <div class="container">
            <div class="text-center">
                <i class="fas fa-user-edit" style="font-size: 80px;"></i>
                <h1 style="font-size: 60px;">Profile</h1>
            </div>
            <!-- username -->
            <form class="row" id="username" method="post" action="assets/php/profile.php">
                <div class="form-group col-md-4 offset-md-4">
                <p style="color:black;"><strong>Current Username:</strong> <?php echo $Username; ?></p>
                    <input class="form-control" type="text" name="Username" placeholder="Username">
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <button class="btn btn-primary form-control" type="submit" name="updateUsername">Update</button>
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <?php if (!empty($_SESSION['updateUsername'])){ ?>
                        <div class="alert <?php echo $_SESSION['alert']; ?> form-control">
                            <em><?= $_SESSION['updateUsername']; ?></em>
                        </div>
                    <?php } unset($_SESSION['updateUsername']); ?>
                </div>
            </form>
            <hr class="col-md-4 offset-md-4">
            <!-- email -->
            <form class="row text-white" id="email" method="post" action="assets/php/profile.php">
                <div class="form-group col-md-4 offset-md-4">
                <p style="color:black;"><strong>Current Email:</strong> <?php echo $Email; ?></p>
                    <input class="form-control" type="email" name="Email" placeholder="Email">
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <button class="btn btn-primary form-control" type="submit" name="updateEmail">Update</button>
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <?php if (!empty($_SESSION['updateEmail'])){ ?>
                        <div class="alert <?php echo $_SESSION['alert']; ?> form-control">
                            <em><?= $_SESSION['updateEmail']; ?></em>
                        </div>
                    <?php } unset($_SESSION['updateEmail']); ?>
                </div>
            </form>
            <hr class="col-md-4 offset-md-4">
            <!-- password -->
            <form class="row" id="password" method="post" action="assets/php/profile.php">
                <div class="form-group col-md-4 offset-md-4">
                <p style="color:black;"><strong>Update password:</strong></p>
                    <label for="password">Current Password</label>
                    <input class="form-control" type="password" name="Password">
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <label for="password">New Password</label>
                    <input class="form-control" type="password" name="newPassword">
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <button class="btn btn-primary form-control" type="submit" name="updatePassword">Update</button>
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <?php if (!empty($_SESSION['updatePassword'])){ ?>
                        <div class="alert <?php echo $_SESSION['alert']; ?> form-control">
                            <em><?= $_SESSION['updatePassword']; ?></em>
                        </div>
                    <?php } unset($_SESSION['updatePassword']); ?>
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
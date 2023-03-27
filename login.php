<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Srms-Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body style="background-position: center;background-size: cover;background-repeat: no-repeat;">
<!--- Landing -->
    <div class="login-dark" style="background-repeat: repeat;background-image: url(&quot;assets/img/star-sky.jpg&quot;);height: 720px;">
        <form method="post" action="assets/php/admin/login.php">
            <h3>Admin Login</h3>
            <p>Student Residential Management System For NACIT Malawi</p>
            <div class="form-group">
                <img src="assets/img/logo.jpg" style="width:240px;height:240px">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Username" required="">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password" required="">
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" name="login" Value="Log in">
            </div>
            <?php if (!empty($_SESSION['login'])){ ?>
                <div class="form-group">
                    <em class="alert <?php echo $_SESSION['alert']; ?> btn-block"><?= $_SESSION['login']; ?></em>
                </div>
            <?php } unset($_SESSION['login']); ?>
        </form>
    </div>
<!--- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
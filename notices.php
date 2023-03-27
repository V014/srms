<?php
session_start();
include ('assets/php/connection.php');
include ('assets/php/utils.php');
include ('assets/php/admin/details.php');
include ('assets/php/noticeboard.php');
include ('assets/php/admin/badge.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Notice Board</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="assets/css/profile.css">
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
                                <li class="nav-item" role="presentation"><a class="nav-link" href="dorms.php">Rooms <span class="badge badge-info"><?php echo $badges; ?></a></li>
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
                <i class="fas fa-list-alt" style="color: rgb(255,255,255);font-size: 80px;"></i>
                <h1 class="text-uppercase">Notice Board Management</h1>
            </div>
        </div>
<!--- Notice -->
    <section id="Notice" style="padding-top: 200px;padding-bottom: 200px">
        <div class="container">
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
<!-- Bannaer add notice -->
    <div class="jumbotron text-center" style="background-image: url(&quot;assets/img/admin.jpg&quot;);color: rgb(255,255,255);background-repeat: no-repeat;background-size: cover;background-position: top;background-attachment: fixed;padding-bottom: 260px;">
        <i class="fas fa-comment" style="font-size: 80px;padding-top: 200px;"></i>
        <h1 style="font-size: 60px;">Post Notice</h1>
        <p>This section enables posting of messages onto the notice board.</p>
    </div>
<!--- add notice -->
    <section class="hero" id="addnotice" style="padding-top: 180px;padding-bottom: 200px;">
        <div class="container">
            <h3 class="text-center">Post Notice...</h3>
            <form method="post" action="assets/php/admin/addnotice">
                <div class="form-group col-md-4 offset-md-4">
                    <label>Write to students</label>
                    <textarea class="form-control" name="message" rows="5" cols="30" required="" placeholder="Message goes here..."></textarea>
                </div>   
                <div class="form-group col-md-4 offset-md-4">
                    <input type="submit" class="btn btn-danger form-control" name="addnotice" value="Post Notice">
                </div> 
                <div class="form-group col-md-4 offset-md-4">
                    <?php if (!empty($_SESSION['addnotice'])){ ?>
                        <div class="alert <?php echo $_SESSION['alert']; ?> form-control">
                            <em><?= $_SESSION['addnotice']; ?></em>
                        </div>
                    <?php } unset($_SESSION['addnotice']); ?>
                </div>
            </form>
        </div>
    </section>
<!-- Bannaer edit notice -->
    <div class="jumbotron text-center" style="background-image: url(&quot;assets/img/admin.jpg&quot;);color: rgb(255,255,255);background-repeat: no-repeat;background-size: cover;background-position: top;background-attachment: fixed;padding-bottom: 260px;">
        <i class="fas fa-edit" style="font-size: 80px;padding-top: 200px;"></i>
        <h1 style="font-size: 60px;">Edit Notice</h1>
        <p>This section enables edition of a notice on the board.</p>
    </div>
<!--- Edit notice -->
    <section class="hero" id="addnotice" style="padding-top: 180px;padding-bottom: 200px;">
        <div class="container">
            <h3 class="text-center">Edit Notice...</h3>
            <form method="post" action="assets/php/admin/editnotice">
                <div class="form-group col-md-4 offset-md-4">
                    <label>The last post wrote...</label>
                    <textarea class="form-control" name="message" rows="5" cols="30" required="" placeholder="Message goes here..."><?= $Notice; ?></textarea>
                </div>   
                <div class="form-group col-md-4 offset-md-4">
                    <input type="submit" class="btn btn-danger form-control" name="addnotice" value="Post Notice">
                </div> 
                <div class="form-group col-md-4 offset-md-4">
                    <?php if (!empty($_SESSION['editnotice'])){ ?>
                        <div class="alert <?php echo $_SESSION['alert']; ?> form-control">
                            <em><?= $_SESSION['editnotice']; ?></em>
                        </div>
                    <?php } unset($_SESSION['editnotice']); ?>
                </div>
            </form>
        </div>
    </section>
<!-- Bannaer delete notice -->
    <div class="jumbotron text-center" style="background-image: url(&quot;assets/img/admin.jpg&quot;);color: rgb(255,255,255);background-repeat: no-repeat;background-size: cover;background-position: top;background-attachment: fixed;padding-bottom: 260px;">
        <i class="fas fa-comment-slash" style="font-size: 80px;padding-top: 200px;"></i>
        <h1 style="font-size: 60px;">Delete Notice</h1>
        <p>This section deletes a notice from the board.</p>
    </div>
<!--- delete notice -->
    <section class="hero" id="addnotice" style="padding-top: 180px;padding-bottom: 200px;">
        <div class="container">
            <h3 class="text-center">Add Notice...</h3>
            <form method="post" action="assets/php/admin/addnotice">
                <div class="form-group col-md-4 offset-md-4">
                    <label>Write to students</label>
                    <textarea class="form-control" name="message" rows="5" cols="30" required="" placeholder="Message goes here..."></textarea>
                </div>   
                <div class="form-group col-md-4 offset-md-4">
                    <input type="submit" class="btn btn-danger form-control" name="addnotice" value="Post Notice">
                </div> 
                <div class="form-group col-md-4 offset-md-4">
                    <?php if (!empty($_SESSION['addnotice'])){ ?>
                        <div class="alert <?php echo $_SESSION['alert']; ?> form-control">
                            <em><?= $_SESSION['addnotice']; ?></em>
                        </div>
                    <?php } unset($_SESSION['addnotice']); ?>
                </div>
            </form>
        </div>
    </section>
<!--- footer -->
<?php include ('footer.php'); ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script src="assets/js/forum.js"></script>
    <script>
        
    </script>
</body>

</html>
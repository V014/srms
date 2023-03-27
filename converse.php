<?php
session_start();
include ('assets/php/connection.php');
include ('assets/php/admin/details.php');
include ('assets/php/comment_list.php');
include ('assets/php/forum.php');
include ('assets/php/admin/badge.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Forum Mangement</title>
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
                <h1 class="text-uppercase">Forum Management</h1>
            </div>
        </div>
<!--- Fourm -->
    <section class="hero" id="forum" style="padding-top: 180px;padding-bottom: 200px;">
        <div class="container">
            <h3 class="text-center">Add Topic...</h3>
            <form method="post" action="assets/php/admin/forum">
                <div class="form-group col-md-4 offset-md-4">
                    <label>Topic</label>
                    <input type="text" name="topic" class="form-control">
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="form-group col-md-4 offset-md-4">
                    <label>Time</label>
                    <input type="time" name="time" class="form-control">
                </div>    
                <div class="form-group col-md-4 offset-md-4">
                    <input type="submit" class="btn btn-primary form-control" name="addforum" value="Add Topic">
                </div> 
                <div class="form-group col-md-4 offset-md-4">
                    <?php if (!empty($_SESSION['addforum'])){ ?>
                        <div class="alert <?php echo $_SESSION['alert']; ?> form-control">
                            <em><?= $_SESSION['addforum']; ?></em>
                        </div>
                    <?php } unset($_SESSION['addforum']); ?>
                </div>
            </form>
        </div>
    </section>
<!-- Bannaer monitor forum -->
    <div class="jumbotron text-center" style="background-image: url(&quot;assets/img/admin.jpg&quot;);color: rgb(255,255,255);background-repeat: no-repeat;background-size: cover;background-position: top;background-attachment: fixed;padding-bottom: 260px;">
        <i class="fas fa-users-cog" style="font-size: 80px;padding-top: 200px;"></i>
        <h1 style="font-size: 60px;">Delete Topic</h1>
        <p>This section enables deletion of a topic in the forum.</p>
    </div>
<!--- Delete topic -->
    <section class="hero" id="deletetopic" style="padding-top: 180px;padding-bottom: 200px;">
        <div class="container">
            <h3 class="text-center">Delete Topic...</h3>
            <form method="post" action="assets/php/admin/forum">
                <div class="form-group col-md-4 offset-md-4">
                    <label><strong>Topic:</strong> <?php echo $topic; ?></label>
                </div>   
                <div class="form-group col-md-4 offset-md-4">
                    <input type="submit" class="btn btn-danger form-control" name="deletetopic" value="Delete Topic">
                </div> 
                <div class="form-group col-md-4 offset-md-4">
                    <?php if (!empty($_SESSION['deleteforum'])){ ?>
                        <div class="alert <?php echo $_SESSION['alert']; ?> form-control">
                            <em><?= $_SESSION['deleteforum']; ?></em>
                        </div>
                    <?php } unset($_SESSION['deleteforum']); ?>
                </div>
            </form>
        </div>
    </section>
<!-- Bannaer monitor forum -->
    <div class="jumbotron text-center" style="background-image: url(&quot;assets/img/admin.jpg&quot;);color: rgb(255,255,255);background-repeat: no-repeat;background-size: cover;background-position: top;background-attachment: fixed;padding-bottom: 260px;">
        <i class="fas fa-users-cog" style="font-size: 80px;padding-top: 200px;"></i>
        <h1 style="font-size: 60px;">Monitor Topic</h1>
        <p>This section enables tracking of the topic in the forum.</p>
    </div>
<!--- topic poster -->
            <section class="hero" id="forum">
                <div class="container">
                    <div class="text-center text-white">
                        <i class="far fa-list-alt" style="font-size: 80px;"></i>
                        <h1 style="font-size: 60px;">Forum</h1>
                    </div>
                    <div class="card mx-auto" style="width: 18rem;">
                        <img class="card-img-top" src="assets/img/jelly.jpg" alt="Food item">
                        <div class="card-body">
                            <h5 class="card-title"><?= $topic; ?></h5>
                            <p>Date: <?= $date; ?></p>
                            <p><?= $startime; ?> AM - <?= $startdate; ?> PM</p>
                        </div>
                    </div>
                </div>
            </section>
<!--- Feed -->
    <section id="feed" style="padding-top: 100px;padding-bottom: 100px">
        <div class="container">
            <?php if (isset($resultCom)): ?>
            <div class="col-md-12">
                <form method="post" action="assets/php/add_comment.php">
                    <div class="form-group col-md-4 offset-md-4">
                        <h3>Write something below...</h3>
                        <textarea class="form-control" name="message"></textarea>
                        <input type="text" name="forum" value="<?= $id; ?>" style="display: none;">
                    </div>
                    <div class="form-group col-md-4 offset-md-4">
                        <?php if (!empty($_SESSION['reply'])){ ?>
                            <div class="alert <?php echo $_SESSION['alert']; ?> form-control">
                                <em><?= $_SESSION['reply']; ?></em>
                            </div>
                        <?php } unset($_SESSION['reply']); ?>
                    </div>
                    <div class="form-group col-md-4 offset-md-4">
                        <input type="submit" class="btn btn-outline-primary" name="comment" value="Comment">
                    </div>
                </form>
            </div>
            <br>
            <?php endif ?>

            <?php if($resultCom == true) { 
                while($rowCom = $resultCom -> fetch_assoc()){
            ?>
            <div class="card col-md-4 offset-md-4" style="background-color: #DAE8E3;">
                <div class="card-body">
                    <strong><?= $rowCom['Username']; ?></strong> |  
                    <em><?= $rowCom['Email']; ?></em>
                    <p><?= $rowCom['Comment']; ?></p>
                    <em style="font-size: 16px;"><?= $rowCom['Date'] . ", " . "at " . $rowCom['Time']; ?><em>
                    <br>
                    <i class="fas fa-heart" id="heart" style="font-size: 16px;"></i> <?= $rowCom['Likes']; ?>
                </div>
            </div>
            <br>
            <?php 
                }
            } else {
            ?>
                <div class="card col-md-4 offset-md-4" style="background-color: #DAE8E3;">
                    <div class="card-body">
                        <p>No one has commented yet.</p>
                    </div>
                </div>
                <br>
            <?php
            }
            ?>
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
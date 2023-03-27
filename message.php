<?php
session_start();
include ('assets/php/connection.php');
include ('assets/php/admin/details.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Feedback</title>
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
                <div class="container">
                    <a class="navbar-brand" href="profile.php"><?php echo $Username; ?></a>
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
            <section class="text-white" id="feedback">
                <div class="container">
                    <div class="text-center">
                        <i class="fas fa-reply" style="font-size: 80px;"></i>
                        <h1 style="font-size: 60px;">Feedback</h1>
                    </div>
                    <form class="form-horizontal" method="post" action="assets/php/feedback.php">
                        <div class="form-group col-md-4 offset-md-4">
                            <label for="message">Message</label>
                            <textarea class="form-control" name="message" placeholder="Ask question here"></textarea>
                        </div>
                        <div class="form-group col-md-4 offset-md-4">
                            <input class="btn btn-info form-control" type="submit" name="ask" Value="Ask">
                        </div>
                        <div class="form-group col-md-4 offset-md-4">
                            <?php if (!empty($_SESSION['feedback'])){ ?>
                                <div class="alert <?php echo $_SESSION['alert']; ?> form-control">
                                    <em><?= $_SESSION['feedback']; ?></em>
                                </div>
                            <?php } unset($_SESSION['feedback']); ?>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
<!--- response -->
    <section class="text-center" id="response" style="padding-top: 200px;padding-bottom: 200px">
        <div class="container">
            <i class="fas fa-envelope-open-text" style="font-size: 80px;"></i>
            <h1 style="font-size: 60px;">Response</h1>
            <div class="table-responsive table-borderless">
                <table class="table table-striped table-bordered table-hover table-light">
                    <thead>
                        <tr>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Response</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($resultFeedbackReply)) { 
                    while($rowFeedbackReply = $resultFeedbackReply -> fetch_assoc()){
                    ?>
                        <tr>
                            <td><?php echo $rowFeedbackReply['Message'];?></td>
                            <td><?php echo $rowFeedbackReply['Date']; ?></td>
                            <td><?php echo $rowFeedbackReply['Time']; ?></td>
                            <td><?php echo $rowFeedbackReply['Response']; ?></td>
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
<!--- footer -->
<?php include ('footer.php'); ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
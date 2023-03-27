<?php
session_start();
$ID = $_SESSION['ID'];
include ('assets/php/connection.php');
include ('assets/php/details.php');
include ('assets/php/utils.php');
//include ('assets/php/search.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Search</title>
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
            <section class="text-white" id="feedback">
                <div class="container">
                    <div class="text-center">
                        <i class="fas fa-search" style="font-size: 80px;"></i>
                        <h1 style="font-size: 60px;">Search</h1>
                    </div>
                    <form class="form-horizontal" method="post" action="assets/php/feedback.php">
                        <div class="form-group col-md-4 offset-md-4">
                            <label for="message">What you searched</label>
                            <textarea class="form-control" name="message" placeholder="<?php echo $_POST['search']; ?>"></textarea>
                        </div>
                        <div class="form-group col-md-4 offset-md-4">
                            <input class="btn btn-info form-control" type="submit" name="ask" Value="Ask">
                        </div>
                        <div class="form-group col-md-4 offset-md-4">
                            <?php if (!empty($_SESSION['reply'])){ ?>
                                <div class="alert <?php echo $_SESSION['alert']; ?> form-control">
                                    <em><?= $_SESSION['reply']; ?></em>
                                </div>
                            <?php } unset($_SESSION['reply']); ?>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
<!--- Privacy -->
    <section class="text-center" id="privacy" style="padding-top: 200px;padding-bottom: 200px">
        <div class="container">
            <i class="fas fa-envelope-open-text" style="font-size: 80px;"></i>
            <h1 style="font-size: 60px;">Similar content</h1>
                <?php
                    if (isset($_POST['search'])) {
                        $search = esctxt($connection, $_POST['search']);

                        $querySearch = "SELECT `Topic`, `Comment` FROM `forum` AS f INNER JOIN `comments` AS c ON f.ID = c.ForumID WHERE `Topic` LIKE '%$search%' OR `Comment` LIKE '%$search%'";
                        $resultSearch = $connection -> query($querySearch);
                        if(!empty($resultSearch)){
                            while($rowSearch = $resultSearch -> fetch_assoc()){
                ?>
                    <div class="card col-md-4 offset-md-4">
                        <div class="card-body">
                            <p style="font-size: 26px;"><?= $rowSearch['Comment']; ?></p>
                            <em class="lead" style="font-size: 16px;">Public notice from boarding staff management</em>
                        </div>
                    </div>
                    <br>
                <?php
                        }
                    }
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
</body>

</html>
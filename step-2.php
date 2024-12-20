<?php
session_start();
// Include database connection
include('./include/db.php');

// Check if the user is not logged in
if (!isset($_SESSION['user_email'])) {
    // Redirect the user to the login page
    header("Location: servicelogin.php");
    exit();
}


?>


<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!-- Site Title-->
    <title>Artika Saloon | Chose Barber</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Mono:300,300italic,400,700%7CArvo:400,700">
    <link rel="stylesheet" href="servicestyle.css">
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a
            href="http://windows.microsoft.com/en-US/internet-explorer/"><img
                src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
    <style>
        .booking-container {
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        body {
            background-image: url('images/bg-image-1.jpg');
            /* Replace 'path/to/your/image.jpg' with the actual path to your background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            /* Remove default margin to ensure full coverage */
            padding: 0;
            /* Remove default padding to ensure full coverage */
        }
    </style>
</head>

<body class="one-screen-page">
    <div class="container booking-container ">
        <div class="page">
            <main class="page-content" id="perspective">
                <div class="content-wrapper">
                    <div class="custom-progress">
                        <div class="custom-progress-body" style="width: 0;"></div>
                    </div>
                    <div id="wrapper">
                        <section class="section-xs bg-periglacial-blue one-screen-page-content text-center">
                            <div class="shell">
                                <h2>CHOOSE a BARBER</h2>
                                <div class="p text-width-medium">
                                    <p class="big">Barbershop offers professional services of certified barbers with
                                        years of experience. On this page, you can choose a preferred barber in a few
                                        clicks.</p>
                                </div>
                                <div class="range range-lg-center">
                                    <div class="cell-lg-12">

                                        <div class="range range-sm-center range-md-left range-30 ">

                                        <?php
                include './include/db.php';
                $query = "SELECT * FROM `barbers`";
                $query_show = mysqli_query($conn, $query);
                while ($show = mysqli_fetch_assoc($query_show)) {
                ?>
                                            <div class="cell-sm-8 cell-md-6 ">
                                                <div class="thumbnail-option rounded shadow-lg">
                                                    <div class="thumbnail-option-left rounded"><img src="./admin/<?php echo $show['bphoto']; ?>" alt="" width="170" height="180" />
                                                    </div>
                                                    <div class="thumbnail-option-body">
                                                        <div class="thumbnail-option-title">:- <?php echo $show['barbername'] ?></div>
                                                        <div class="thumbnail-option-title">:- <?php echo $show['specialist'] ?></div>
                                                        <div class="thumbnail-option-title">:- <?php echo $show['extrawork'] ?></div>
                                                       
                                                        <a class="btn btn-xs btn-primary btn-circle btn-choose" href="step-3.php?sid=<?php echo $_GET['sid']; ?>&bid=<?php echo $show['bid']; ?>">Choose</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                <?php
                }
                ?>
                                            <!-- Repeat the structure for other barbers as needed -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-xs btn-primary btn-circle" href="servicedetails.php">Back To Services details
                                Page</a>

                            <!-- JavaScript to automatically redirect to the next step after choosing a barber -->
                            <script>
                                // Assuming your "Choose" buttons have the class "btn-choose"
                                const chooseButtons = document.querySelectorAll('.btn-choose');

                                chooseButtons.forEach(button => {
                                    button.addEventListener('click', () => {
                                        // Redirect to the next step (e.g., step-3.php)
                                        window.location.href = 'step-3.php';
                                    });
                                });
                            </script>
                        </section>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="servicejs/core.min.js"></script>
    <script src="servicejs/script.js"></script>
</body>

</html>
<?php
session_start();
include './include/db.php';

$query = "SELECT * FROM `offer` ";
$query_show = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Artika Saloon |</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
       
        .pack2 {
            border-radius: 4%;
            height: 290px;
            width: 500px;
            background-repeat: no-repeat;
            background-size: auto;
            background-image: url('./admin/<?php echo $show['image'] ?>');
            
        }

       
        @media (min-width: 768px) {
            .pack .conte {
                color: aliceblue;
                font-family: poppins;
                font-weight: 1450px;
                padding-top: 40px;
                margin-left: 270px;
            }

            .groom {
                color: whitesmoke;

                font-family: poppins;
                font-weight: 1450px;
                padding-top: 40px;
                margin-left: 70px;
            }
        }

        .tittle {
            font-family: poppins;
            font-weight: 1450px;
            padding-top: 40px;
            margin-left: 210px;
            color: darkblue;
            text-align: center;
        }

        .groom col {

            margin-left: 50px;
        }

        .offer {
            margin-top: 80px;

        }

        @media (min-width: 768px) {
            .btn1 {
                color: midnightblue;
                background-color: whitesmoke;
                position: absolute;
                font-weight: 900;
                margin-top: 70px;
                margin-left: 180px;
                transform: translateX(-50%);
            }

            .conte .btn1 {
                color: midnightblue;
                background-color: whitesmoke;
                position: absolute;
                font-weight: 900;
                margin-top: 70px;
                margin-left: 0px;
                transform: translateX(-50%);
            }
        }
    </style>
</head>

<body>
    <!-- Top Bar Start -->
    <!-- Top Bar Start -->
    <?php
    include('./include/header.php');
    ?>
    <!-- Nav Bar End -->


    <!-- Page Header Start -->
    <div class="page-header-contact">
        <div class="container price1 wow zoomIn animated animated" data-wow-delay=".5s">
            <div class="row">
                <div class="col-12">
                    <h2>Offers</h2>
                </div>
                <div class="col-12">
                    <a href="index.php">Home</a>
                    <a href="">Offers</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Contact Start -->
    <div class="section-header1 text-center wow fadeInDown animated animated" data-wow-delay=".5s" style="margin-top: 50px;">
        <h2>Best Offer Available On Groom And Bride Sider</h2>
    </div>
    <div class="container mb-5">
        <div class=" row">
            <?php

            while ($show = mysqli_fetch_assoc($query_show)) {
            ?>
                <div class="col-md-6 offer">
                    <div class="pack2 row">
                        <div class="groom col-md-6">
                            <h2>Offer <?php echo $show['discount'] ?>% off</h2>
                            <h4><?php echo $show['name'] ?></h4>
                            <h6>
                                <ul>
                                    <?php
                                    $detail = explode(',', $show['details']);
                                    foreach ($detail as $offer) {
                                    ?>
                                        <li><?php
                                            echo $offer;
                                            ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </h6>
                        </div>
                        <div class="text-center col-md-6">
                            <h5><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $show['price'] ?> ONLY</h5>
                            <a href="https://wa.me/+919356756158" target="_blank"> <button class="btn1 btn btn-primary book-now-button">Book Now <i class="fa-brands fa-whatsapp fa-beat-fade fa-lg" style="color: #63E6BE;"></i></button></a>

                        </div> <!-- Content for the second column -->

                    </div>

                </div>
            <?php
            }
            ?>
        </div>
    </div>




    <!-- Footer Start -->
    <?php
    include('./include/footer.php');
    ?>
    <!-- Footer End -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


</body>

</html>


<?php


// if (isset($_POST['submit'])) {
//     $fname      = $_POST['fname'];
//     $email      = $_POST['email'];
//     $subject    = $_POST['subject'];
//     $message   = $_POST['message'];


//     // Data doesn't exist, proceed with insertion 
//     $sql = "INSERT INTO `contacts` (`fname`, `email`,`subject`, `message`) VALUES ('$fname', '$email', '$subject','$message')";

//     $query = mysqli_query($conn, $sql);

//     if ($query) {
//         echo "<script>
//                 swal({
//                     title: 'Successful',
//                     text: 'Massage Sent successfully',
//                     icon: 'success',
//                     button: false,
//                     timer: 2000
//                 }).then(function() {
//                     window.location.href = 'contact.php';
//                 });
//               </script>";
//     } else {
//         echo "<script>
//                 swal({
//                     title: 'Failed',
//                     text: 'Invalid data',
//                     icon: 'error',
//                     button: 'OK'
//                 });
//               </script>";
//     }
// }

?>
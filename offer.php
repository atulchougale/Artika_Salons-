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
    <title>Artika Saloon | Offers</title>
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
        .offer {
            position: relative;
            margin: 20px 0;
            border-radius: 12px;
        }

        .offer img {
            border-radius: 12px;
            width: 100%;
            /* height: 100%; */
        }

        .offer-content {
            position: relative;
            
        }

        .offer .details {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
           
        }

        .offer:hover .details {
            opacity: 1;
        }

        .offer .details .btn1 {
            color: midnightblue;
            background-color: whitesmoke;

            font-weight: 900;

            /* transform: translateX(-50%); */
        }

        @media only screen and (max-width: 767px) {
            .offer .details {
                opacity: 1;
                background-color: rgba(255, 255, 255, 0.5);
                /* Ensure details are visible by default on smaller screens */
                transition: none;
                /* Remove transition effect on smaller screens if needed */
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
    <div class="container">
        <div class=" row">
            <?php
            while ($show = mysqli_fetch_assoc($query_show)) {
            ?>
                <div class="col-md-6 offer">
                    <div class="offer-content">
                        <img src="./admin/<?php echo $show['image'] ?>" alt="" height="350px">
                        <div class="details">
                            <div class="row">
                                <div class="col-md-7" style="color:antiquewhite;">
                                    <h3>Offer <?php echo $show['discount'] ?>% off</h3>
                                    <h4><?php echo $show['name'] ?></h4>
                                    <h6>
                                        <ul>
                                            <?php
                                            $detail = explode(',', $show['details']);
                                            foreach ($detail as $offer) {
                                            ?>
                                                <li><?php echo $offer; ?></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </h6>
                                </div>
                                <div class="col-md-5">
                                    <h6><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $show['price'] ?> ONLY</h6>
                                    <a href="https://wa.me/+919356756158" target="_blank"> <button class="btn1 btn btn-primary book-now-button">Book Now <i class="fa-brands fa-whatsapp fa-beat-fade fa-lg" style="color: #63E6BE;"></i></button></a>
                                </div>
                            </div>
                        </div>
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
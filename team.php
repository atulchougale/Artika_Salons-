<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Artika Saloon | Team</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */

       /* Custom styles for flip effect */
.box {
    position: relative;
    width: 100%;
    height: 300px; /* Adjust height as needed */
    perspective: 1000px;
}

.box .image-container,
.box .details {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    backface-visibility: hidden;
    transition: transform 0.8s;
}

.box:hover .image-container {
    transform: rotateY(180deg);
}

.box:hover .details {
    transform: rotateY(0deg);
}

.box .image-container {
    transform: rotateY(0deg);
    border-radius: 12px;
}

.box .details {
    transform: rotateY(-180deg);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #c0f7a1;
    border-radius: 12px;
}

.box .image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 12px;
}

/* Only color for the button */
.box .details .btn {
    background-color: #007bff; /* Button color */
}

.box .details .btn:hover {
    background-color: #0056b3; /* Hover color */
}
    </style>
</head>

<body>
    <!-- Top Bar Start -->
    <?php include('./include/header.php'); ?>
    <!-- Nav Bar End -->

    <!-- Page Header Start -->
    <div class="page-header-team">
        <div class="container price1 wow zoomIn animated animated" data-wow-delay=".5s">
            <div class="row">
                <div class="col-12">
                    <h2>Barber's</h2>
                </div>
                <div class="col-12">
                    <a href="">Home</a>
                    <a href="">Barber</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Team Start -->
    <div class="team">
        <div class="container">
            <div class="section-header1 text-center wow fadeInDown animated animated" data-wow-delay=".5s">
                <p>Our Barber Team</p>
                <h2>Meet Our Hair Cut Expert Barber</h2>
            </div>

            <div class="row">
                <?php
                include './include/db.php';
                $query = "SELECT * FROM `barbers`";
                $query_show = mysqli_query($conn, $query);
                while ($show = mysqli_fetch_assoc($query_show)) {
                ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="box">
                            <div class="details shadow-lg  ">
                                <h2><?php echo $show['barbername']; ?></h2>
                                <p><?php echo $show['specialist']; ?></p>
                                <a href="barber.php?bid=<?php echo $show['bid']; ?>" class="btn">More Details</a>
                            </div>
                            <div class="image-container shadow-lg">
                                <img src="./admin/<?php echo $show['bphoto']; ?>" alt="<?php echo $show['barbername']; ?>">
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Footer Start -->
    <?php include('./include/footer.php'); ?>
    <!-- Footer End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>


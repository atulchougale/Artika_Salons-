<?php
include('./include/db.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Artika Saloon | Prices</title>
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
    <script src="./js/wow.min.js"></script>

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script>
        new WOW().init();
    </script>
</head>

<body>
    <!-- Top Bar Start -->
    <?php
    include('./include/header.php');
    ?>
    <!-- Nav Bar End -->


    <!-- Page Header Start -->
    <div class="page-header_price">
        <div class="container price1 wow zoomIn animated animated" data-wow-delay=".5s">
            <div class="row">
                <div class="col-12">
                    <h2>Price</h2>
                </div>
                <div class="col-12">
                    <a href="">Home</a>
                    <a href="">Price</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Pricing Start -->
    <div class="price">
        <div class="container">
            <div class="section-header1 text-center wow fadeInDown animated animated" data-wow-delay=".5s">
                <p>Our Best Pricing</p>
                <h2>We offer the most competitive prices in the city.</h2>
            </div>
            <div class="row">
                <?php
                $results_per_page = 16;

                $query_count = "SELECT COUNT(*) AS total FROM `services`";
                $result_count = mysqli_query($conn, $query_count);
                $row_count = mysqli_fetch_assoc($result_count);
                $total_records = $row_count['total'];

                $total_pages = ceil($total_records / $results_per_page);

                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                $start_index = ($page - 1) * $results_per_page;

                $query = "SELECT * FROM `services` LIMIT $start_index, $results_per_page";
                $query_show = mysqli_query($conn, $query);
                ?>

                <?php
                while ($show = mysqli_fetch_assoc($query_show)) {
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInRight animated animated" data-wow-delay=".3s">
                        <div class="price-item">
                            <div class="price-img">
                                <img src="./admin/<?php echo $show['subServiceStyleImage']; ?>" alt="Image">
                            </div>
                            <div class="price-text">
                                <h2><?php echo $show['subServiceStyleTitle'] ?></h2>
                                <h3>₹ <?php echo $show['subServiceStylePrice'] ?></h3>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>


            </div>

        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                $prev_page = $page - 1;
                $next_page = $page + 1;

                if ($page > 1) {
                    echo "<li class='page-item'><a class='page-link' href='services.php?page=$prev_page'>Previous</a></li>";
                }

                if ($page < $total_pages) {
                    echo "<li class='page-item'><a class='page-link' href='services.php?page=$next_page'>Next</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>
    <!-- Pricing End -->


    <!-- Footer Start -->
    <?php
    include('./include/footer.php');
    ?>
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
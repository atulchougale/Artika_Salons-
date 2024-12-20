<?php
session_start();
?>
<?php
include './include/db.php';
// Pagination
$limit = 6; // Number of items per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
$start = ($page - 1) * $limit; // Offset

// Fetch total number of rows
$result_count = mysqli_query($conn, "SELECT COUNT(*) AS total FROM `gallry`");
$data_count = mysqli_fetch_assoc($result_count);
$total_rows = $data_count['total'];

// Calculate total pages
$total_pages = ceil($total_rows / $limit);

// Fetch data for the current page
$view = "SELECT * FROM `gallry` LIMIT $start, $limit";
$query = mysqli_query($conn, $view);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Artika Saloon | Gallery</title>
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
</head>

<body>
    <!-- Top Bar Start -->
    <?php
    include('./include/header.php');
    ?>
    <!-- Nav Bar End -->


    <!-- Page Header Start -->
    <div class="page-header-gal">
        <div class="container price1 wow zoomIn animated animated" data-wow-delay=".5s">
            <div class="row">
                <div class="col-12">
                    <h2>Gallery</h2>
                </div>
                <div class="col-12">
                    <a href="">Home</a>
                    <a href="">Gallery</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Portfolio Start -->
    <div class="portfolio">
        <div class="container">
            <div class="section-header1  text-center wow fadeInDown animated animated" data-wow-delay=".5s">
                <p>Barber Image Gallery</p>
                <h2>Some Images From Our Barber Gallery</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active wow lightSpeedIn animated animated" data-wow-delay=".3s">All</li>
                        <li data-filter=".hairCut" class="wow lightSpeedIn animated animated" data-wow-delay=".5s">Hair Cut</li>
                        <li data-filter=".beardStyle" class="wow lightSpeedIn animated animated" data-wow-delay=".7s">Beard Style</li>
                        <li data-filter=".colorWash" class="wow lightSpeedIn animated animated" data-wow-delay=".9s">Color & Wash</li>
                        <li data-filter=".facial" class="wow lightSpeedIn animated animated" data-wow-delay=".9s">Facial</li>
                        <li data-filter=".massage" class="wow lightSpeedIn animated animated" data-wow-delay=".9s">Massage</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                <?php

                while ($data = mysqli_fetch_assoc($query)) {
                ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item <?php echo $data['galleryname'] ?>">
                        <div class="portfolio-wrap">
                            <a href="./admin/<?php echo $data['photo'] ?>" data-lightbox="portfolio">
                                <img src="./admin/<?php echo $data['photo'] ?>" alt="Portfolio Image">
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php
                    // Render pagination links
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<li class='page-item " . ($page == $i ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Portfolio Start -->


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
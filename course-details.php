<?php
include './include/db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Artika Saloon | Course Details</title>
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="mail/jqBootstrapValidation.min.js"></script>

    <script>
        new WOW().init();
    </script>
</head>
<style>
    .course-img img {
        width: 100%;
        height: auto;
    }

    .course-item {
        margin-bottom: 20px;
        display: flex;
        align-items: stretch;
        /* Ensures all items stretch vertically */
    }

    /* Gallery Container */
    .gallery {
        margin-top: 4rem;
    }

    /* Gallery Images */
    .gallery .card {
        margin-bottom: 1rem;
    }

    .gallery .card img {
        max-width: 100%;
        height: auto;
    }


    /* Flip Box */
    .flip-box {
        background-color: transparent;
        width: 100%;
        border: 1px solid #f1f1f1;
        perspective: 1000px;
    }

    .flip-box-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.8s;
        transform-style: preserve-3d;
    }

    .flip-box:hover .flip-box-inner {
        transform: rotateY(180deg);
    }

    .flip-box-front,
    .flip-box-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }


    /* Media Queries for Responsive Design */
    @media (min-width: 576px) {
        .gallery .card {
            margin-bottom: 2rem;
        }
    }

    @media (min-width: 768px) {
        .flip-box {
            width: 300px;
        }
    }

    @media (min-width: 992px) {
        .flip-box {
            width: 400px;
        }
    }

    @media (min-width: 1200px) {
        .flip-box {
            width: 500px;
        }
    }

    .gallery .card {
        margin-bottom: 20px;
    }

    .flip-box {
        background-color: transparent;
        width: 300px;
        height: 200px;
        border: 1px solid #f1f1f1;
        perspective: 1000px;
    }


    .flip-box:hover .flip-box-inner {
        transform: rotateY(180deg);
    }

    .flip-box-front,
    .flip-box-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .flip-box-front {
        background-color: #bbb;
        color: black;
    }

    .flip-box-back {
        background-color: #555;
        color: white;
        transform: rotateY(180deg);
    }

    .gallery .card {
        margin-bottom: 50px;
    }

    .course-row {
        display: flex;
    }

    .course-item {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .course-img,
    .course-details {
        flex: 1;
    }

    .courses .container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        grid-gap: 20px;
    }

    .course-item {
        display: flex;
        flex-direction: column;
        height: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
    }

    .course-img {
        flex: 1;
        overflow: hidden;
    }

    .course-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .course-details {
        padding: 15px;
    }

    .course-details h3 {
        margin-top: 0;
    }
</style>


<body>


    <!-- Top Bar Start -->
    <?php
    include('./include/header.php');
    ?>

    <!-- Page Header Start -->
    <div class="page-header-course">
        <div class="container price1 wow zoomIn animated animated" data-wow-delay=".5s">
            <div class="row">
                <div class="col-12">
                    <h2>Course's</h2>
                </div>
                <div class="col-12">
                    <a href="">Home</a>
                    <a href="">Course</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Advanced Courses Section -->



    <div class="advanced-courses" id="advanced-courses">
        <div class="container">
            <div class="section-header1 text-center wow fadeInDown animated animated" data-wow-delay=".5s" style="margin-top: 50px;">
                <p>Basic Level Courses</p>
                <h2>Master the Art of Hairdressing and Makeup</h2>
            </div>
            <?php
            $id = $_GET['cid'];
            $query = "SELECT * FROM `course` WHERE cid='$id'";
            $query_show = mysqli_query($conn, $query);
            while ($show = mysqli_fetch_assoc($query_show)) {
            ?>
                <div class="row course-row">
                    <!-- Advanced Course 1: Master Styling Techniques -->
                    <div class="col-lg-6 col-md-6">
                        <div class="course-item p-3 border">
                            <div class="course-img">
                                <img src="./admin/<?php echo $show['cimage'] ?>" alt="Course Image" class="img-fluid rounded" style="max-width: 100%; padding: 50px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="course-item p-3 border">
                            <div class="text-center">
                                <h1>Course Details</h1>
                            </div>
                            <div class="text-center course-details" style="max-width: 100%; padding: 30px;">
                                <h3><strong><?php echo $show['cname'] ?></strong></h3>
                                <h4><strong>Course Type:</strong><?php echo $show['ctype'] ?></h4>
                                <p><strong>Details:</strong><?php echo $show['cdetails'] ?></p>
                                <p><strong>Duration:</strong> <?php echo $show['cduration'] ?> weeks</p>
                                <p><strong>Fees:</strong> ₹<?php echo $show['cfees'] ?></p>
                                <p><strong>Time:</strong> Thursday & Saturday, Morning 9:00 AM - 11:00 AM</p>
                                <p>Monday & Wednesday, Evening 5:00 PM - 7:00 PM</p>
                                <p><strong>Number of Seats:</strong> Limited to <?php echo $show['cseats'] ?></p>
                            </div>
                            <div class="text-center p-2">
                                <a class="btn btn-primary" href="enform.php?cid=<?php echo $show['cid'] ?>">Enroll now</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

            <!--  Gallery -->
            <div class="gallery mt-4">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card p-3">
                            <div class="flip-box">
                                <div class="flip-box-inner">
                                    <div class="flip-box-front">
                                        <img src="img/blog-3.jpg" alt="Haircut 1" class="card-img-top img-fluid rounded">
                                    </div>
                                    <div class="flip-box-back">
                                        <div class="card-body">
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa labore incidunt animi accusamus odio dignissimos, iure quam, quia ullam molestias, vero deserunt!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card p-3">
                            <div class="flip-box">
                                <div class="flip-box-inner">
                                    <div class="flip-box-front">
                                        <img src="img/blog-1.jpg" alt="Haircut 2" class="card-img-top img-fluid rounded">
                                    </div>
                                    <div class="flip-box-back">
                                        <div class="card-body">
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa labore incidunt animi accusamus odio dignissimos, iure quam, quia ullam molestias, vero deserunt!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card p-3">
                            <div class="flip-box">
                                <div class="flip-box-inner">
                                    <div class="flip-box-front">
                                        <img src="img/blog-2.jpg" alt="Haircut 3" class="card-img-top img-fluid rounded">
                                    </div>
                                    <div class="flip-box-back">
                                        <div class="card-body">
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa labore incidunt animi accusamus odio dignissimos, iure quam, quia ullam molestias, vero deserunt!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="text-center mt-4" style="margin: 20px;">
                <a class="btn btn-primary" href="course.php" style="background-color: #D5B981; color: black;">Go Back</a>
            </div>

            <!-- Footer Start -->
            <?php
            include('./include/footer.php');
            ?>
            <!-- Footer End -->

            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

            <!-- Template Javascript -->
            <script src="js/main.js"></script>

</body>

</html>
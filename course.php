<?php
session_start();
include './include/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Artika Saloon | Course</title>
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
    <script>
        function filterCourses(type) {
            var basicCourses = document.getElementById('basic-courses');
            var advancedCourses = document.getElementById('advanced-courses');

            if (type === 'basic') {
                basicCourses.style.display = 'block';
                advancedCourses.style.display = 'none';
            } else if (type === 'advanced') {
                basicCourses.style.display = 'none';
                advancedCourses.style.display = 'block';
            } else {
                // Show all courses
                basicCourses.style.display = 'block';
                advancedCourses.style.display = 'block';
            }
        }
    </script>
    <style>
        .course-img img {
        max-width: 100%;
        height: auto;
    }
        .custom-btn {
            background-color: #FFF;
            color: #b98141;
            transition: background-color 0.3s;
            font-weight: bold;
            margin-bottom: -40px;
            /* Add margin bottom */
        }

        .custom-btn:hover {
            background-color: #b98141;
        }

        .section-header {
            padding-top: 20px;
            /* Add padding top */
            padding-bottom: 0px;
            /* Add padding bottom */
        }

        .section-header p {
            color: #b98141;
            font-weight: bold;
            margin-bottom: 10px;
            /* Add margin bottom */
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
</head>

<body>
    <!-- Top Bar Start -->
    <?php
    include('./include/header.php');
    ?>


    <!-- Nav Bar End -->

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

    <!-- Portfolio Filters -->
    <div class="d-flex justify-content-center" style="padding-bottom: 20px; margin-top: 20px;">
        <button class="btn btn-primary mx-2 custom-btn" onclick="filterCourses('all')">All</button>
        <button class="btn btn-primary mx-2 custom-btn" onclick="filterCourses('basic')">Basic Courses</button>
        <button class="btn btn-primary mx-2 custom-btn" onclick="filterCourses('advanced')">Advanced Courses</button>
    </div>
    <!-- Basic Courses Section -->
    <div class="basic-courses" id="basic-courses">

        <div class="container">
            <div class="section-header1 text-center wow fadeInDown animated animated" data-wow-delay=".5s" style="margin-top: 50px;">
                <p>Basic Salon Courses</p>
                <h2>Master the Art of Hairdressing and Makeup</h2>
            </div>
            <div class="row">
                <?php
                $query = "SELECT * FROM `course` WHERE ctype='Basic'";
                $query_show = mysqli_query($conn, $query);
                while ($show = mysqli_fetch_assoc($query_show)) {
                ?>
                    <!-- Basic Course 1: Master Styling Techniques -->
                    <div class="col-md-4 col-lg-4">
                        <div class="course-item p-3 border">
                            <div class="course-img">
                                <img src="./admin/<?php echo $show['cimage'] ?>" alt="Course Image" class="img-fluid rounded">
                            </div>
                            <div class="text-center">
                                <h3><?php echo $show['cname'] ?></h3>
                                <p><?php echo $show['cdetails'] ?></p>
                                <p><strong>Fees:</strong> ₹<?php echo $show['cfees'] ?></p>
                            </div>
                            <div class="text-center p-2">
                                <a class="btn btn-primary" href="course-details.php?cid=<?php echo $show['cid'] ?>">Check out</a>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>

            </div>
        </div>
    </div>
    <!-- Basic Courses End -->

    <!-- Advanced Courses Section -->
    <div class="advanced-courses" id="advanced-courses" style=" padding-top: 30px;">
        <div class="container">
            <div class="section-header text-center">
                <p>Advanced Level Courses</p>
                <h2>Master the Art of Hairdressing and Makeup</h2>
            </div>
            <div class="row">
                <?php
                $query = "SELECT * FROM `course` WHERE ctype='Advance'";
                $query_show = mysqli_query($conn, $query);
                while ($show = mysqli_fetch_assoc($query_show)) {
                ?>
                    <!-- Advanced Course 1: Master Styling Techniques -->
                    <div class="col-lg-4 col-md-6">
                        <div class="course-item p-3 border">
                            <div class="course-img">
                                <img src="./admin/<?php echo $show['cimage'] ?>" alt="Course Image" class="img-fluid rounded">
                            </div>
                            <div class="text-center">
                                <h3><?php echo $show['cname'] ?></h3>
                                <p><?php echo $show['cdetails'] ?></p>
                                <p><strong>Fees:</strong> ₹<?php echo $show['cfees'] ?></p>
                            </div>
                            <div class="text-center p-2">
                                <a class="btn btn-primary" href="course-details.php?cid=<?php echo $show['cid'] ?>">Check out</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
    <!-- Advanced Courses Page End -->

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
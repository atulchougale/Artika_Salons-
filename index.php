<?php

session_start();
include './include/db.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Artika Saloon </title>
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
    <link href="./lib/animate/animate.min.css" rel="stylesheet">
    <link href="./lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- b -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


    <style>
        .card-text {
            font-size: 20px;
            /* Adjust the font size as needed */
            font-weight: bold;
        }

        .btn.btn-transparent.btn-hover {
            border: 1px solid black;
            transition: all 0.3s ease;

        }

        .btn.btn-transparent.btn-hover:hover {
            background-color: yellow;
            border-color: #ccc;
        }


        .centered-text {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            /* Adjust height as needed */
            width: 150px;
            /* Adjust width as needed */
        }

        .course-image {
            height: 200px;
            /* Adjust the height as needed */
            object-fit: cover;
            /* This property ensures the image covers the entire space */
        }

        .left-img-size {
            height: 200px;
            /* Adjust the height as needed for the left image */
            width: 325px;
            object-fit: cover;
        }

        .right-img-size {
            height: 200px;
            width: 325px;
            object-fit: cover;
        }



        .contact-form {
            width: 400px;
            margin-left: 100px;
        }
    </style>
</head>

<body>
    <?php
    include('./include/header.php');
    ?>

    <!-- Hero Start -->
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active " data-bs-interval="10000">
                <img src="./img/co-haircare.jpg" class="d-block w-100" style="height: 500px;" alt="...">
                <div class="carousel-caption  d-none  d-sm-block price1 wow zoomIn animated animated" data-wow-delay=".5s" style=" margin-bottom: 80px; ">
                    <h1 style="font-weight: 700; font-size:80px; ">Hair Care</h1>
                    <h5 style="font-weight: 600; font-size:20px; ">"Your hair is a symphony of self-care, each strand a
                        note in the melody of your beauty.
                        Nurture it, let it dance in the breeze, and wear it as the graceful crown it deserves to
                        be."</h5>
                    <a class="btn" href="service.php">Explore</a>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="./img/co-nailcare.jpg" class="d-block w-100" style="height: 500px;" alt="...">
                <div class="carousel-caption text-center d-none  d-sm-block " style=" margin-bottom: 80px; ">
                    <h1 style="font-weight: 700; font-size:80px; ">Skin Care</h1>
                    <h5 style=" position: relative; font-weight: 600; color:#0a0e27;font: italic bold 20px , Serif; ">
                        "Your skin is a canvas of self-love, a reflection of the care you invest. Treat it kindly,
                        let it glow with the radiance of well-nurtured beauty, and wear it proudly as the
                        masterpiece it is."</h5>
                    <a class="btn" href="service.php">Explore</a>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="1000">
                <img src="./img/co-skincare.jpg" class="d-block w-100" style="height: 500px;" alt="...">
                <div class="carousel-caption text-center d-none  d-sm-block " style=" margin-bottom: 80px; ">
                    <h1 style="font-weight: 700; font-size:80px; ">Nail Care</h1>
                    <h5 style=" position: relative; font-weight: 600; color:#0a0e27;font: italic bold 20px , Serif; ">
                        "Your nails are tiny canvases of self-expression, each tip a brushstroke in the portrait of
                        your grooming rituals. Care for them with precision, adorn them with color, and let them
                        reflect the polished elegance of your self-care journey."</h5>
                    <a class="btn" href="service.php">Explore</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="home1 about">
        <div class="container shadow-lg">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="about-img">
                        <img src="img/hero-2.jpg" alt="Image" width="600px">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="section-header text-left">
                        <p>About Us</p>
                        <h2>1 Years Experience</h2>
                    </div>
                    <div class="about-text">
                        <p>
                            A slogan that embodies the mission and image of your hair salon is the perfect finishing
                            touch. It’s also a great way to let clients know that you’ll go above and beyond their
                            expectations.</p>
                        </p>
                        <p>
                            Adding a slogan to your business card is a great addition as well. A polished graphic with a
                            slogan alongside your salon’s name can make a business card look extremely professional.</p>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Service Start -->



    <!-- Service End -->
    <!-- Course Start -->
    <div class="home1">
        <div class="container shadow-lg">
            <div class="section-header1  text-center wow fadeInDown animated animated" data-wow-delay=".5s">
                <p>We Provide Best Courses</p>
                <h2>Master the Art of Hairdressing and Makeup</h2>
            </div>

            <div class="row">
                <?php
                $query = "SELECT * FROM `course`  LIMIT 3";
                $query_show = mysqli_query($conn, $query);
                $total_rows = mysqli_num_rows($query_show); // Get the total number of rows
                $counter = 0; // Initialize a counter
                while ($show = mysqli_fetch_assoc($query_show)) {
                    $counter++; // Increment the counter for each iteration
                ?>
                    <div class="col-md-4">
                        <div class="card bg-transparent">
                            <div class="card-body text-center">
                                <img src="./admin/<?php echo $show['cimage'] ?>" alt="Course Image" class="img-fluid rounded <?php echo $counter == 1 ? 'left-img-size' : ($counter == $total_rows ? 'right-img-size' : 'course-image'); ?>">
                                <p class="card-text">
                                    <?php echo $show['cname'] ?>
                                </p>
                                <p>
                                    <?php echo $show['cdetails'] ?>
                                </p>
                                <div class="text-center p-2">
                                    <a class="btn btn-transparent btn-hover" href="course-details.php?cid=1">Check out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="col-12 text-center mt-4"> <!-- Adjust margin top as needed -->
                    <a class="btn btn-transparent btn-hover btn-sm" href="course.php" style="padding: 10px 20px;">View
                        More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Course End -->




    <!-- Pricing Start -->
    <div class="home1 price ">
        <div class="container shadow-lg">
            <div class="section-header1  text-center wow fadeInDown animated animated" data-wow-delay=".5s">
                <p>Our Best Pricing</p>
                <h2>We Provide Best Price in the City</h2>
            </div>
            <div class="row">
                <?php
                $results_per_page = 8;
                $query = "SELECT * FROM `services` LIMIT $results_per_page";
                $query_show = mysqli_query($conn, $query);

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
            <div class="row justify-content-center">
                <a class="btn btn-transparent btn-hover btn-sm centered-text" href="price.php">Check out</a>

            </div>
        </div>
    </div>
    <!-- Pricing End -->




    <!-- Testimonial Start -->
    <div class="home1">
        <div class="container shadow-lg">
            <div class="row">
                <!-- Testimonial Section -->
                <div class="col-md-6">
                    <div class="section-header1 text-center wow fadeInDown animated animated" data-wow-delay=".5s">
                        <p>Meet Our Happy Customers</p>
                        <h2>Creating smiles, one haircut at a time.</h2>
                    </div>

                    <div class="testimonial">

                        <div class="container">
                            <div class="owl-carousel testimonials-carousel">
                                <?php
                                $results_per_page = 8;
                                $query = "SELECT * FROM `testimonial` LIMIT $results_per_page";
                                $query_show = mysqli_query($conn, $query);

                                while ($show = mysqli_fetch_assoc($query_show)) {
                                ?>
                                    <div class="testimonial-item">
                                        <img src="<?php echo $show['tphoto']; ?>" alt="Image">
                                        <p>
                                        <?php echo $show['testimonial'] ?>
                                        </p>
                                        <h2><?php echo $show['name'] ?></h2>
                                        <h3>Profession : <?php echo $show['profession'] ?></h3>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Feedback Form Section -->
                <div class="col-md-6 ">
                    <div class="section-header1 text-center wow fadeInDown animated animated" data-wow-delay=".5s">
                        <p>Share Your Experience</p>
                        <h2>We'd Love to Hear from You!</h2>
                    </div>
                    <div class="testimonial-form testimonial p-3">
                        <form action="#" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="name">Your Name:</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="profession">Your Profession:</label>
                                <input type="text" id="profession" name="profession" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="testimonial">Your Testimonial:</label>
                                <textarea id="testimonial" name="testimonial" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Your Picture:</label>
                                <input type="file" id="image" name="image" class="form-control-file">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">Submit Testimonial</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            var name = document.getElementById("name").value.trim();
            var profession = document.getElementById("profession").value.trim();
            var testimonial = document.getElementById("testimonial").value.trim();

            // Check if any field is empty
            if (name === "" || profession === "" || testimonial === "") {
                alert("Please fill in all fields.");
                return false;
            }

            // Check if the testimonial length is within a reasonable range
            if (testimonial.length < 10 || testimonial.length > 500) {
                alert("Testimonial should be between 10 and 500 characters.");
                return false;
            }

            return true;
        }
    </script>




    <!-- Testimonial End -->


    <?php
    include('./include/footer.php');
    ?>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="./lib/easing/easing.js"></script>
    <script src="./lib/owlcarousel/owl.carousel.js"></script>
    <script src="./lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="./lib/isotope/isotope.pkgd.min.js"></script>
    <script src="./lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Template Javascript -->
    <script src="./js/main.js"></script>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $fname = $_POST['name'];
    $profession = $_POST['profession'];
    $testimonial = $_POST['testimonial'];
    $file_name = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];
    $folder = 'testimg/' . $file_name;
    $move = move_uploaded_file($file_temp, $folder);

    // Check if the file was uploaded successfully
    if (!$move) {
        echo "<script>
                  swal({
                      title: 'Failed',
                      text: 'Failed to upload image',
                      icon: 'error',
                      button: 'OK'
                  });
                </script>";
        exit; // Exit the script if file upload fails
    }

    // Data doesn't exist, proceed with insertion 
    $sql = "INSERT INTO `testimonial` (`tid`,`name`, `profession`, `testimonial`, `tphoto`) VALUES ('','$fname', '$profession', '$testimonial', '$folder')";

    $query = mysqli_query($conn, $sql);

    if (!$query) {
        echo "<script>
                  swal({
                      title: 'Failed',
                      text: 'Failed to insert data: " . mysqli_error($conn) . "',
                      icon: 'error',
                      button: 'OK'
                  });
                </script>";
    } else {
        echo "<script>
                  swal({
                      title: 'Successful',
                      text: 'Your Feedback is very important for us',
                      icon: 'success',
                      button: false,
                      timer: 2000
                  }).then(function() {
                      window.location.href = 'index.php';
                  });
                </script>";
    }
}


?>
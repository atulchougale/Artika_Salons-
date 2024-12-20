<?php
include './include/db.php';
session_start();
if (strlen($_SESSION['user_email']) == 0) {
    header('location:logform.php');
} else {
    $id = $_GET['cid'];

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Artika Saloon | Course Enrollment</title>
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


        <style>
            .swal-button {
                margin: 38px;
            }

            .swal-footer {
                text-align: center;
                margin-top: 0;
            }

            .course-img img {
                width: 100%;
                height: auto;
            }

            .course-item {
                margin-bottom: 20px;

            }

            .padding h3,
            p {
                padding-bottom: 8px;
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



            .containeren {
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                padding: 30px;
                width: 90%;

                max-width: 600px;

                margin: auto;

            }

            .heading {
                text-align: center;
                color: #007bff;
                margin-bottom: 20px;
                font-weight: 600;
            }

            .form-group {
                margin-bottom: 3px;

            }

            label {
                font-size: 15px;
                color: #333;
            }

            input[type="text"],
            input[type="tel"],
            input[type="email"],
            textarea,
            select {
                width: 100%;
                padding: 6px;

                margin-bottom: 6px;
                border: 1px solid #ced4da;
                border-radius: 6px;
                box-sizing: border-box;
                font-size: 16px;
            }

            select {
                background-image: url('');
                background-repeat: no-repeat;
                background-position: right 10px top 50%;
                background-size: 12px auto;
            }

            .error {
                color: red;


            }

            button {

                padding: 8px;

                border-radius: 6px;
                cursor: pointer;
                font-size: 16px;
                width: 55%;
                background-color: #D5B981;
                color: black;
            }

            button:hover {
                background-color: black;
                color: #D5B981;
                border: 1px solid #D5B981;
            }

            /* Adjusted margin for checkboxes */
            .checkbox-group {
                margin-bottom: 12px;
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
        <!-- Advanced Courses Section -->
        <?php
        include "./include/header.php";
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

        <div class="advanced-courses" id="advanced-courses">
            <div class="container">
                <div class="section-header1 text-center">
                    <!-- <p>Advanced Level Courses</p> -->
                    <h2>Master the Art of Hairdressing and Makeup</h2>
                </div>


                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6">
                            <!-- Course Details -->
                            <div class="course-item p-3 border">
                                <?php
                                // Check if 'cid' is set in the URL
                                // if (isset($_GET['cid'])) {
                                //     // Assign the value of 'cid' parameter to $id
                                //     $id = $_GET['cid'];
                                //     // Fetch course details from the database
                                    $query = "SELECT * FROM course WHERE cid='$id'";
                                    $query_show = mysqli_query($conn, $query);
                                    $show = mysqli_fetch_assoc($query_show);
                                // }
                                ?>
                                <div class="text-center">
                                    <h2>Enrollment From</h2>
                                </div>
                                <div class="text-left px-4">
                                    <h3><strong><?php echo $show['cname'] ?></strong></h3>
                                    <p><strong>Course Type:</strong> <?php echo $show['ctype'] ?></p>
                                    <p><strong>Details:</strong> <?php echo $show['cdetails'] ?></p>
                                    <p><strong>Duration:</strong> <?php echo $show['cduration'] ?> weeks</p>
                                    <p><strong>Fees:</strong> ₹<?php echo $show['cfees'] ?></p>
                                    <p><strong>Time:</strong><br> Thursday & Saturday, Morning 9:00 AM - 11:00 AM<br> Monday & Wednesday, Evening 5:00 PM - 7:00 PM</p>
                                    <p><strong>Number of Seats:</strong> Limited to <?php echo $show['cseats'] ?></p>

                                    <!--  Form Group and Submit Button  -->
                                    <!-- Add a form to wrap the form fields -->
                                    <form method="post" action="#">
                                    <input type="hidden" name="cid" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label for="batch">Batch:</label>
                                            <select id="batch" name="batch" required>
                                                <option value="">Please Select</option>
                                                <option value="Morning">Morning</option>
                                                <option value="Evening">Evening</option>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <!-- Move the submit button inside the form -->
                                            <button type="submit" name="submit" id="submitButton" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form> <!-- Close the form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Gallery -->
                <div class="gallery mt-4">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card p-3">
                                <div class="flip-box" style="margin: 13px;">
                                    <div class="flip-box-inner">
                                        <div class="flip-box-front">
                                            <img src="img/blog-3.jpg" alt="Haircut 1" class="card-img-top img-fluid rounded" style="max-width: 100%; height: auto;">
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
                                <div class="flip-box" style="margin: 13px;">
                                    <div class="flip-box-inner">
                                        <div class="flip-box-front">
                                            <img src="img/blog-1.jpg" alt="Haircut 2" class="card-img-top img-fluid rounded" style="max-width: 100%; height: auto;">
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
                                <div class="flip-box" style="margin: 13px;">
                                    <div class="flip-box-inner">
                                        <div class="flip-box-front">
                                            <img src="img/blog-2.jpg" alt="Haircut 3" class="card-img-top img-fluid rounded" style="max-width: 100%; height: auto;">
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

            </div>
        </div>
        <?php
        include './include/footer.php';
        ?>



        <!-- JavaScript Libraries -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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
        <script>
            // Function to validate form fields
            var projectForm = document.getElementById('projectForm');

            projectForm.addEventListener('submit', function(e) {
                if (!validateForm()) {
                    e.preventDefault(); // Prevent form submission if validation fails
                }
            });

            function validateForm() {
                var isValid = true;

                var name = document.getElementById('name');
                var email = document.getElementById('email');
                var phone = document.getElementById('phone');


                setError('name_error', '');
                setError('email_error', '');
                setError('phone_error', '');


                if (name.value.trim() === '') {
                    setError('name_error', 'Name is required');
                    isValid = false;
                } else if (!/^[a-zA-Z\s]+$/.test(name.value.trim())) {
                    setError('name_error', 'Invalid characters in fname');
                    isValid = false;
                }

                if (email.value.trim() === '') {
                    setError('email_error', 'Email is required');
                    isValid = false;
                }

                if (phone.value.trim() === '') {
                    setError('phone_error', 'Mobile Number is required');
                    isValid = false;
                } else if (!/^\d{10}$/.test(phone.value.trim())) {
                    setError('phone_error', 'Mobile Number must contain exactly 10 digits and no characters or spaces');
                    isValid = false;
                }



                return isValid;
            }

            function setError(id, message) {
                const errorElement = document.getElementById(id);
                errorElement.innerText = message;
            }
        </script>


    </body>

    </html>

<?php
    
         // Check if form is submitted
         if (isset($_POST['submit'])) {
            // Get form data
            $batch = $_POST['batch'];
            $userEmail = $_SESSION['user_email'];
            $id = $_POST['cid'];
            $payment = 0;
            $status = 0;
            
    
            // Check if the user is already registered for this course
            $checkQuery = "SELECT * FROM `courseregistration` WHERE userEmail = '$userEmail' AND cid='$id'";
            $checkResult = mysqli_query($conn, $checkQuery);
    
            if (mysqli_num_rows($checkResult) > 0) {
                echo "<script>
                    swal({
                        title: 'Failed',
                        text: 'You are Already Registered for this course',
                        icon: 'error',
                        button: 'OK'
                    }).then(function() {
                        window.location.href = 'course.php';
                    });
                </script>";
            } else {
                // Data doesn't exist, proceed with insertion 
                $sql = "INSERT INTO courseregistration (userEmail, batch, cid,status,payment) VALUES ('$userEmail', '$batch', '$id','$status','$payment')";
                $query = mysqli_query($conn, $sql);
    
                if ($query) {
                    echo  "<script>
                        swal({
                            title: 'Course Registration Successfully!',
                            text: 'Thank You for interest , Once Status is Confirmed You can Make Payment.',
                            icon: 'success',
                            button: 'Check Status',
                        }).then(function() {
                            window.location.href = 'profile.php';
                        });
                    </script>";
                } else {
                    echo  "<script>
                        swal({
                            title: 'Failed!',
                            text: 'Course Registration Fail',
                            icon: 'error',
                            button: 'Ok, Done!',
                        }).then(function() {
                            window.location.href = 'course.php';
                        });
                    </script>";
                }
            }
        }
}
?>
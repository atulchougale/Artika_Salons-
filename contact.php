<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Artika Saloon | Contact</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400&family=Metal+Mania&family=Montserrat:ital,
        wght@0,500;0,600;0,700;1,400&family=Nunito:ital,wght@0,200;0,400;1,500&family=Open+Sans:ital,
        wght@0,400;0,500;0,700;1,400&family=Poppins:wght@400;500;700&family=Roboto:ital,
        wght@0,100;0,300;0,400;0,500;0,700;0,900;1,300;1,700;1,900&display=swap" rel="stylesheet">


    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .contact {
            position: relative;
            width: 100%;
            margin: 45px 0;

        }

        .contact .padiing {
            margin-left: 0px;
            padding-right: 25px;
        }

        .contact .container-fluid {
            background-size: contain;
        }

        .cont .conttittle {
            color: #eeeeee;
            font-size: 45px;
            font-weight: 500;
            padding-bottom: 14px;
            margin-top: 0px;
        }

        .contact .contact-form {
            position: relative;
            padding: 55px 8px 55px 45px;
            background: #F6F3F0;
            margin-top: 50px;
            margin-bottom: 20px;
            margin-left: 0px;
            border-radius: 12px;
            /* box-shadow: 11px 11px 22px whitesmoke; */
        }

        .contact .map {
            position: relative;
            padding: 20px 8px 20px 20px;

            margin-top: 20px;
            margin-bottom: 20px;
           

        }

        .contact .map iframe{
            border-radius: 12px;
            /* box-shadow: 11px 11px 22px whitesmoke; */
        }

        .contact .cont {
            position: relative;
            padding: 20px 8px 20px 20px;
            margin-top: 20px;
            margin-bottom: 20px;

        }

        .contact .contact-form input {
            padding: 15px 0;
            background: none;
            border-radius: 0;
            border: none;
            border-bottom: 1px solid #C98E4A;
        }

        .contact .contact-form textarea {
            height: 90px;
            padding: 15px 0;
            background: none;
            border-radius: 0;
            border: none;
            border-bottom: 1px solid #D5B981;
            ;
        }

        .contact .contact-form .btn {
            padding: 15px 30px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 1px;
            color: #D5B981;
            background: none;
            border: 2px solid #D5B981;
            border-radius: 0;
            transition: .3s;
        }

        .contact .contact-form .btn:hover {
            color: #1d2434;
            background: #D5B981;
        }

        .contact .help-block ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        @media (max-width: 767.98px) {
            .contact .container-fluid {
                background: none;
            }

            .contact .contact-form {
                padding: 50px 30px;
            }
        }

        .cont .cont-img {
            margin-top: 28px;
            border-radius: 9%;
        }

        .cont .cont-social {
            position: relative;
            margin-top: 10px;
        }

        .cont .cont-social a {
            display: inline-block;
        }

        .cont .cont-social a i {
            margin-right: 15px;
            font-size: 18px;
            color: #D5B981;
        }

        .cont .cont-social a:last-child i {
            margin: 0;
        }

        .cont .cont-social a:hover i {
            color: #999999;
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
                    <h2>Contact Us</h2>
                </div>
                <div class="col-12">
                    <a href="">Home</a>
                    <a href="">Contact</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Contact Start -->
    <div class="section-header1 text-center wow fadeInDown animated animated" data-wow-delay=".5s" style="margin-top: 50px;">
        <h2>If You Have Any Query,Please reach us shortly</h2>
    </div>
    <div class="contact">
        <div class="container-fluid">
            <div class="container">
                <div class="row ">
                    <div class="col-md-4 padiing">
                        <div class="cont wow fadeInLeft animated animated" data-wow-delay=".5s">
                            <div class="conttittle">Get In Touch</div>
                            <div class="fcontact">
                                <p><i class="fa fa-map-marker-alt"></i> Phase1,Hinjawadi,Pune, Maharashtra</p>
                                <p><i class="fa fa-phone-alt"></i> 91 99999 88888</p>
                                <p><i class="fa fa-envelope"></i> info@example.com</p>
                                <div class="cont-social">

                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-whatsapp"></i></a>

                                </div>
                            </div>
                            <div class="cont-img " style="margin-top:8px;"><img src="img/cont/logimg.jpg" height="200px" width="210px" alt="Image"></div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form action="#" method="post" id="projectForm">
                                <div class="control-group">
                                    <input type="text" class="form-control" id="name" name="fname" placeholder="Your Name" required="required" />
                                    <div class="error" id="fname_error"></div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required="required" />
                                    <div class="error" id="email_error"></div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="required" />
                                    <div class="error" id="subject_error"></div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control" id="message" name="message" placeholder="Message" required="required"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <button class="btn" type="submit" name="submit">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

    <!-- validation -->
    <div class="contact" style="margin-bottom: 90px;">
        <div class="container-fluid">
            <div class="container">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.011211352025!2d73.81668667496649!3d18.663492882458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2b9a1ac829289%3A0x9e98fac525f911d4!2sDiagonal%20Mall!5e0!3m2!1sen!2sin!4v1705475849972!5m2!1sen!2sin" width="100%" height="450" style="border: 5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    <!-- Footer Start -->
    <?php
    include('./include/footer.php');
    ?>
    <!-- Footer End -->
    <!-- JavaScript Libraries -->
      <!-- validatiom -->
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        var projectForm = document.getElementById('projectForm');

        projectForm.addEventListener('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault(); // Prevent form submission if validation fails
            }
        });

        function validateForm() {
            var isValid = true;

            var fname = document.getElementById('name');
            var email = document.getElementById('email');
            var subject = document.getElementById('subject');


            setError('fname_error', '');
            setError('email_error', '');
            setError('subject_error', '');


            if (fname.value.trim() === '') {
                setError('fname_error', 'Name is required');
                isValid = false;
            } else if (!/^[a-zA-Z\s]+$/.test(fname.value.trim())) {
                setError('fname_error', 'Invalid characters in fname');
                isValid = false;
            }

            if (email.value.trim() === '') {
                setError('email_error', 'Email is required');
                isValid = false;
            }
            if (subject.value.trim() === '') {
                setError('subject_error', 'subject is required');
                isValid = false;
            } else if (!/^[a-zA-Z\s]+$/.test(subject.value.trim())) {
                setError('subject_error', 'Invalid characters in subject');
                isValid = false;
            }


            return isValid;
        }

        function setError(id, message) {
            const errorElement = document.getElementById(id);
            errorElement.innerText = message;
        }
    </script>
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


<?php
include './include/db.php';

if (isset($_POST['submit'])) {
    $fname      = $_POST['fname'];
    $email      = $_POST['email'];
    $subject    = $_POST['subject'];
    $message   = $_POST['message'];


    // Data doesn't exist, proceed with insertion 
    $sql = "INSERT INTO `contacts` (`fname`, `email`,`subject`, `message`) VALUES ('$fname', '$email', '$subject','$message')";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>
                swal({
                    title: 'Successful',
                    text: 'Massage Sent successfully',
                    icon: 'success',
                    button: false,
                    timer: 2000
                }).then(function() {
                    window.location.href = 'contact.php';
                });
              </script>";
    } else {
        echo "<script>
                swal({
                    title: 'Failed',
                    text: 'Invalid data',
                    icon: 'error',
                    button: 'OK'
                });
              </script>";
    }
}

?>
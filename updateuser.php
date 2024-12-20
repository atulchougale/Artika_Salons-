<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include './include/db.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Artika Saloon | Profile Edit</title>
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
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        /* Add this CSS to your existing styles */
        .form-label input[type="radio"] {
            display: none;
        }

        .form-label label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .form-label .dot {
            height: 18px;
            width: 18px;
            border-radius: 50%;
            margin-right: 10px;
            background: #d9d9d9;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }

        .form-label input[type="radio"]:checked+.dot {
            background: #9b59b6;
            border-color: #d9d9d9;
        }





        .container1 {
            margin-left: 25%;
            max-width: 700px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }

        .container1 .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
        }

        .container1 .title::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .content form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        form .input-box span.details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .user-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user-details .input-box input:focus,
        .user-details .input-box input:valid {
            border-color: #9b59b6;
        }

        form .gender-details .gender-title {
            font-size: 20px;
            font-weight: 500;
        }

        form .category {
            display: flex;
            width: 80%;
            margin: 14px 0;
            justify-content: space-between;
        }

        form .category label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        form .category label .dot {
            height: 18px;
            width: 18px;
            border-radius: 50%;
            margin-right: 10px;
            background: #d9d9d9;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }

        #dot-1:checked~.category label .one,
        #dot-2:checked~.category label .two,
        #dot-3:checked~.category label .three {
            background: #9b59b6;
            border-color: #d9d9d9;
        }

        form input[type="radio"] {
            display: none;
        }

        form .button {
            height: 45px;
            margin: 35px 0;
            padding-left: 5px;
            width: 300px;
            margin-top: 18px;
            margin-left: 150px;
        }

        form .button input {
            height: 100%;
            width: 100%;
            border-radius: 5px;
            border: none;
            color: #fff;
            padding-left: 10px;
            padding-right: 10px;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        form .button input:hover {
            /* transform: scale(0.99); */
            background: linear-gradient(-135deg, #71b7e6, #9b59b6);
        }

        @media(max-width: 584px) {
            .container1 {
                max-width: 100%;
            }

            form .user-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }

            form .category {
                width: 100%;
            }

            .content form .user-details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .user-details::-webkit-scrollbar {
                width: 5px;
            }
        }

        @media(max-width: 459px) {
            .container1 .content .category {
                flex-direction: column;
            }
        }

        .user-details .input-box .error {

            color: red;
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
    <div class="page-header-about">
        <div class="container price1 wow zoomIn animated animated" data-wow-delay=".5s">
            <div class="row">
                <div class="col-12">
                    <h2>Profile</h2>
                </div>
                <div class="col-12">
                    <a href="">Home</a>
                    <a href="">Profile</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <?php

    $id = $_GET['id'];
    $select = "SELECT * FROM `registration` WHERE id = '$id'";
    $query = mysqli_query($conn, $select);
    $show = mysqli_fetch_assoc($query);
    ?>


    <div class="container1 ">
        <div class="title">Update</div>
        <div class="content text-center">
            <form action="#" method="post" id="projectForm" enctype="multipart/form-data">
                <div class="user-details">


                    <div class="input-box">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" placeholder="Profile Photo" name="photo" class="form-control" id="photo">
                        <div class="error" id="fname_error"></div>
                    </div>
                    <div class="input-box">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" value="<?php echo $show['fname'] ?>" id="fname" name="fname" required>
                        <div class="error" id="fname_error"></div>
                    </div>
                    <div class="input-box">
                        <label for="mobile" class="form-label">Contact</label>
                        <input type="tel" class="form-control" value="<?php echo $show['phone'] ?>" id="mobile" name="phone" required>
                        <div class="error" id="mobile_error"></div>
                    </div>
                    <div class="input-box">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" value="<?php echo $show['email'] ?>" id="email" name="email" required>
                        <div class="error" id="email_error"></div>
                    </div>
                    <div class="input-box">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" value="<?php echo $show['city'] ?>" id="city" name="city" required>
                        <div class="error" id="city_error"></div>
                    </div>
                    <div class="input-box">
                        <label for="city" class="form-label">State</label>
                        <input type="text" class="form-control" value="<?php echo $show['state'] ?>" id="state" name="state" required>
                    </div>
                    <div class="input-box">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" value="<?php echo $show['address'] ?>" id="address" name="address" required>
                    </div>
                    <div class="input-box">
                        <label for="gender" class="form-label gender-details" value="<?php echo $show['gender'] ?>">Gender</label>
                        <div class="category">
                            <label for="male" class="form-label">
                                <input type="radio" value="male" id="male" name="gender" required <?php
                                                                                                    if ($show['gender'] == 'male') {
                                                                                                        echo 'checked';
                                                                                                    }
                                                                                                    ?>>
                                <span class="dot"></span> Male
                            </label>
                            <label for="female" class="form-label">
                                <input type="radio" id="female" name="gender" value="female" required <?php
                                                                                                        if ($show['gender'] == 'female') {
                                                                                                            echo 'checked';
                                                                                                        }
                                                                                                        ?>>
                                <span class="dot"></span> Female
                            </label>
                            <div class="error" id="gender_error"></div>
                        </div>

                    </div>

                    <div class="input-box">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" value="<?php echo $show['password'] ?>" id="password" name="password" required>
                        <div class="error" id="password_error"></div>
                    </div>
                    <div class="button">
                        <input type="submit" name="submit" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>

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
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


    <!-- validation -->

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

            var fname = document.getElementById('fname');
            // var lname = document.getElementById('lname');
            var phone = document.getElementById('mobile');
            var email = document.getElementById('email');
            var city = document.getElementById('city');
            var password = document.getElementById('password');

            setError('fname_error', '');
            // setError('lname_error', '');
            setError('mobile_error', '');
            setError('email_error', '');
            setError('city_error', '');
            setError('password_error', '');

            if (fname.value.trim() === '') {
                setError('fname_error', 'Name is required');
                isValid = false;
            } else if (!/^[a-zA-Z\s]+$/.test(fname.value.trim())) {
                setError('fname_error', 'Invalid characters in fname');
                isValid = false;
            }


            if (phone.value.trim() === '') {
                setError('mobile_error', 'Mobile Number is required');
                isValid = false;

            } else if (!/^\d{10}$/.test(phone.value.trim())) {
                setError('mobile_error', 'Mobile Number must contain exactly 10 digits and no characters or spaces');
                isValid = false;
            }

            if (email.value.trim() === '') {
                setError('email_error', 'Email is required');
                isValid = false;
            }

            if (city.value.trim() === '') {
                setError('city_error', 'city is required');
                isValid = false;
            } else if (!/^[a-zA-Z\s]+$/.test(city.value.trim())) {
                setError('city_error', 'Invalid characters in city');
                isValid = false;
            }

            if (password.value.trim() === '') {
                setError('password_error', 'Password is required');
                isValid = false;
            } else if (password.value.trim().length > 8) {
                setError('password_error', 'Password must be 8 characters or less');
                isValid = false;
            } else if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>])[a-zA-Z\d!@#$%^&*(),.?":{}|<>]+$/.test(password.value.trim())) {
                setError('password_error', 'Password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character');
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
include './include/db.php';

if (isset($_POST['submit'])) {



    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);




    if ($_FILES['photo']['size'] > 0) {
        $file_name = $_FILES['photo']['name'];
        $file_temp = $_FILES['photo']['tmp_name'];
        $folder = 'profileImg/' . $file_name;
        move_uploaded_file($file_temp, $folder);

        // Update all fields, including the new image
        $sql = "UPDATE registration SET 
            fname='$fname', 
            phone='$phone', 
            email='$email', 
            city='$city', 
            state='$state', 
            address='$address', 
            gender='$gender', 
            password='$password',
            profile='$folder' 
        WHERE id='$id'";
    } else {
        // No new image, update other fields only
        $sql = "UPDATE registration SET 
    fname='$fname', 
    phone='$phone', 
    email='$email', 
    city='$city', 
    state='$state', 
    address='$address', 
    gender='$gender', 
    password='$password'  
WHERE id='$id'";
    }




    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>
      swal({
          title: 'Successfully!',
          text: 'Data Updated Successfully',
          icon: 'success',
          button: 'Ok',
      }).then(function() {
          window.location.href = 'profile.php';
      });
      </script>";
    } else {
        echo "<script>
      swal({
          title: 'Failed!',
          text: 'Data Updated Failed',
          icon: 'error',
          button: 'Ok',
      }).then(function() {
          window.location.href = 'profile.php';
      });
      </script>";
    }
}

?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'db.php';

if (strlen($_SESSION['admin']) == 0) {
    header('location:index.php');
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AS | Admin | Create Service</title>
        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">


    </head>

    <body>
        <!-- =============== Navigation ================ -->
        <div class="container1">
            <?php
            include './include/sidebar.php';
            ?>

            <!-- ========================= Main ==================== -->
            <div class="main">
                <?php
                include './include/topbar.php';
                ?>


                <!-- ======================== Your Content=========== -->


                <div class="updatecontainer m-5 mt-5 shadow-lg">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h2 class="mb-4 heading">Services input form</h2>
                            <form action="#" method="post" id="projectForm" enctype="multipart/form-data">
                                <!-- Add these fields within your form -->
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <!-- <option value="other">Other</option> -->
                                    </select>
                                    <div class="error" id="gender_error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="mainService">Main Service Name</label>
                                    <select class="form-control" id="mainService" name="mainService" required>
                                        <option value="" disabled selected>Select Main Service</option>
                                        <option value="haircare">Hair Care</option>
                                        <option value="skincare">Skin Care</option>
                                        <option value="bodycare">Body Care</option>
                                    </select>
                                    <div class="error" id="mainService_error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="subServiceName">Sub Service Name</label>
                                    <input type="text" class="form-control" id="subServiceName" name="subServiceName" required>
                                    <div class="error" id="subServiceName_error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="subServiceStyleTitle">Sub Service Style Title</label>
                                    <input type="text" class="form-control" id="subServiceStyleTitle" name="subServiceStyleTitle" required>
                                    <div class="error" id="subServiceStyleTitle_error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="subServiceStyleImage">Sub Service Style Image</label>
                                    <input type="file" class="form-control-file" id="subServiceStyleImage" name="subServiceStyleImage" accept="image/*" required>
                                    <div class="error" id="subServiceStyleImage_error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="subServiceStyleDescription">Sub Service Style Description</label>
                                    <textarea class="form-control" id="subServiceStyleDescription" name="subServiceStyleDescription" rows="3" required></textarea>
                                    <div class="error" id="subServiceStyleDescription_error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="subServiceStylePrice">Sub Service Style Price (Price is accepted in Indian Rupees)</label>
                                    <input type="number" class="form-control" id="subServiceStylePrice" name="subServiceStylePrice" required>
                                    <div class="error" id="subServiceStylePrice_error"></div>
                                </div>

                                <div class="d-flex align-items-center justify-content-center">
                                    <button type="submit" class="btn btn-primary" id="submit" value="submit" name="submit">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>


                <!-- ======================== Your Content=========== -->
                <?php
                include './include/footer.php';
                ?>
            </div>

        </div>

        <!-- =========== Scripts =========  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./notif.js"></script>
        <script src="assets/js/main.js"></script>
        <script>
            var projectForm = document.getElementById('projectForm');

            projectForm.addEventListener('submit', function(e) {
                if (!validateForm()) {
                    e.preventDefault(); // Prevent form submission if validation fails
                }
            });

            function validateForm() {
                var isValid = true;

                var gender = document.getElementById('gender');
                var mainService = document.getElementById('mainService');
                var subServiceName = document.getElementById('subServiceName');
                var subServiceStyleTitle = document.getElementById('subServiceStyleTitle');
                var subServiceStyleImage = document.getElementById('subServiceStyleImage');
                var subServiceStyleDescription = document.getElementById('subServiceStyleDescription');
                var subServiceStylePrice = document.getElementById('subServiceStylePrice');

                setError('gender_error', '');
                setError('mainService_error', '');
                setError('subServiceName_error', '');
                setError('subServiceStyleTitle_error', '');
                setError('subServiceStyleImage_error', '');
                setError('subServiceStyleDescription_error', '');
                setError('subServiceStylePrice_error', '');


                if (gender.value.trim() === '') {
                    setError('gender_error', 'Gender is required');
                    isValid = false;
                }

                if (mainService.value.trim() === '') {
                    setError('mainService_error', 'Main Service Name is required');
                    isValid = false;
                }

                if (subServiceName.value.trim() === '') {
                    setError('subServiceName_error', 'Sub Service Name is required');
                    isValid = false;
                }

                if (subServiceStyleTitle.value.trim() === '') {
                    setError('subServiceStyleTitle_error', 'Sub Service Style Title is required');
                    isValid = false;
                }



                if (subServiceStyleDescription.value.trim() === '') {
                    setError('subServiceStyleDescription_error', 'Sub Service Style Description is required');
                    isValid = false;
                }

                if (subServiceStylePrice.value.trim() === '' || isNaN(subServiceStylePrice.value.trim())) {
                    setError('subServiceStylePrice_error', 'Valid Sub Service Style Price is required');
                    isValid = false;
                }

                return isValid;
            }

            function isValidUrl(url) {
                // Simple URL validation, you might want to improve this based on your requirements
                var pattern = /^(http|https):\/\/[^ "]+$/;
                return pattern.test(url);
            }

            function setError(id, message) {
                const errorElement = document.getElementById(id);
                errorElement.innerText = message;
            }
        </script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

    </html>

<?php

    if (isset($_POST['submit'])) {
        $gender = $_POST['gender'];
        $mainService = $_POST['mainService'];
        $subServiceName = $_POST['subServiceName'];
        $subServiceStyleTitle = $_POST['subServiceStyleTitle'];
        $subServiceStyleDescription = $_POST['subServiceStyleDescription'];
        $subServiceStylePrice = $_POST['subServiceStylePrice'];

        $file_name = $_FILES['subServiceStyleImage']['name'];
        $file_temp = $_FILES['subServiceStyleImage']['tmp_name'];
        $folder = 'serviceimages/' . $file_name;
        if (move_uploaded_file($file_temp, $folder)) {
            // Prepare and execute the SQL query
            $sql = "INSERT INTO services (gender, mainService, subServiceName, subServiceStyleTitle, subServiceStyleImage, subServiceStyleDescription, subServiceStylePrice)
                VALUES ('$gender', '$mainService', '$subServiceName', '$subServiceStyleTitle', '$folder', '$subServiceStyleDescription', '$subServiceStylePrice')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>
                    swal({
                        title: ' Successful! Wel Done',
                        text: 'Service Created Successful',
                        icon: 'success',
                        button: 'Ok, Done!',
                    }).then(function() {
                        window.location.href = 'services.php';
                    });
                </script>";
            } else {
                echo "<script>
                    Swal({
                        title: 'Error!',
                        text: 'Service Creation Failed. Please try again later.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        window.location.href = 'createservice.php';
                    });
                </script>";
            }
        } else {
            echo "Error uploading file: " . $_FILES['subServiceStyleImage']['error'];
        }
    }
}
?>
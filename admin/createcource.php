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
        <title>AS | Admin | Create Course</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- SweetAlert CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Custom CSS -->
        <script>
            $(document).ready(function() {

                // ******************user****************//
                setInterval(function() {
                    $.post("noti.php", {
                        data: 'get'
                    }, function(data) {
                        if (data > 0) {
                            $('.noti').show();
                            $(".n-c").text(data);
                        }
                    });
                }, 1000);

                $(".notify").click(function() {
                    $('.noti').hide();
                    $.post("noti.php", {
                            update: 'update'
                        },
                        function(data) {

                        });
                });

                // ******************bookings****************//
                setInterval(function() {
                    $.post("noti.php", {
                        data1: 'get'
                    }, function(data) {
                        if (data > 0) {
                            $('.noti1').show();
                            $(".n-c1").text(data);
                        }
                    });
                }, 1000);

                $(".notify1").click(function() {
                    $('.noti1').hide();
                    $.post("noti.php", {
                            update1: 'update'
                        },
                        function(data) {

                        });
                });

                // ***********************course Registration******************//
                setInterval(function() {
                    $.post("noti.php", {
                        data2: 'get'
                    }, function(data) {
                        if (data > 0) {
                            $('.noti2').show();
                            $(".n-c2").text(data);
                        }
                    });
                }, 1000);

                $(".notify2").click(function() {
                    $('.noti2').hide();
                    $.post("noti.php", {
                            update2: 'update'
                        },
                        function(data) {

                        });
                });

                // ***********************issues******************//
                setInterval(function() {
                    $.post("noti.php", {
                        data3: 'get'
                    }, function(data) {
                        if (data > 0) {
                            $('.noti3').show();
                            $(".n-c3").text(data);
                        }
                    });
                }, 1000);

                $(".notify3").click(function() {
                    $('.noti3').hide();
                    $.post("noti.php", {
                            update3: 'update'
                        },
                        function(data) {

                        });
                });
            });
        </script>
        <style>
            .container3 {
                position: relative;
                width: 100%;
            }

            .form-group {
                margin-bottom: 20px;
            }

            label {
                font-weight: bold;
            }

            .btn {
                border-radius: 4px;
                padding: 10px 20px;
                font-size: 16px;
            }

            .error {
                color: red;
                font-size: 12px;
            }

            .topbar {
                position: sticky;
                top: 0;
                left: 0;
                width: 100%;
                background-color: #fff;
                /* Adjust as needed */
                z-index: 1000;
                /* Ensure it's above other content */
                border-bottom: 1px solid #ccc;
                /* Optional */
                padding: 10px 0;
                /* Adjust as needed */
            }

            .footer {
                margin-top: 10px;
            }
        </style>
    </head>

    <body>
        <!-- =============== Navigation ================ -->

        <div class="container3">
            <?php
            include './include/sidebar.php';
            ?>

            <!-- ========================= Main ==================== -->

            <div class="main">
                <?php
                include './include/topbar.php';
                ?>


                <!-- ======================== Your Content=========== -->

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center">Create Course</h3>
                                </div>
                                <div class="card-body">
                                    <form name="course" action="#" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                                        <div class="form-group">
                                            <label for="cname">Course Name</label>
                                            <input type="text" class="form-control" name="cname" id="cname" placeholder="Enter course name" required>
                                            <span id="cnameError" class="error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="cdetails">Course Details</label>
                                            <textarea class="form-control" rows="3" name="cdetails" id="cdetails" placeholder="Enter course details" required></textarea>
                                            <span id="cdetailsError" class="error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="ctype">Course Type</label>
                                            <select class="form-control" name="ctype" id="ctype" required>
                                                <option value="">Please Select</option>
                                                <option value="Basic">Basic</option>
                                                <option value="Advance">Advance</option>
                                            </select>
                                            <span id="ctypeError" class="error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="cfees">Course Fees</label>
                                            <input type="text" class="form-control" name="cfees" id="cfees" placeholder="Enter course fees" required>
                                            <span id="cfeesError" class="error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="cduration">Course Duration</label>
                                            <input type="text" class="form-control" name="cduration" id="cduration" placeholder="Enter course duration" required>
                                            <span id="cdurationError" class="error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="cseats">Course Seats</label>
                                            <input type="text" class="form-control" name="cseats" id="cseats" placeholder="Enter available seats" required>
                                            <span id="cseatsError" class="error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="cimage">Course Image</label>
                                            <input type="file" class="form-control" name="cimage" id="cimage" required>
                                            <span id="cimageError" class="error"></span>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary">Create</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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

        <script src="assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var courseForm = document.forms['course'];

                courseForm.addEventListener('submit', function(e) {
                    if (!validateForm()) {
                        e.preventDefault();
                    }
                });
            });

            function validateForm() {
                var isValid = true;

                var cname = document.getElementById('cname');
                var cdetails = document.getElementById('cdetails');
                var ctype = document.getElementById('ctype');
                var cfees = document.getElementById('cfees');
                var cduration = document.getElementById('cduration');
                var cseats = document.getElementById('cseats');
                var cimage = document.getElementById('cimage');

                setError('cnameError', '');
                setError('cdetailsError', '');
                setError('ctypeError', '');
                setError('cfeesError', '');
                setError('cdurationError', '');
                setError('cseatsError', '');
                setError('cimageError', '');

                if (cname.value.trim() === '') {
                    setError('cnameError', 'Name is required');
                    isValid = false;
                }

                if (cdetails.value.trim() === '') {
                    setError('cdetailsError', 'Details is required');
                    isValid = false;
                }

                if (ctype.value.trim() === '') {
                    setError('ctypeError', 'Type is required');
                    isValid = false;
                }

                if (cfees.value.trim() === '') {
                    setError('cfeesError', 'Fees is required');
                    isValid = false;
                }

                if (cduration.value.trim() === '') {
                    setError('cdurationError', 'Duration is required');
                    isValid = false;
                }

                if (cseats.value.trim() === '' || isNaN(cseats.value.trim())) {
                    setError('cseatsError', 'Seats must be a number');
                    isValid = false;
                }

                if (!cimage.files[0]) {
                    setError('cimageError', 'Please select an image');
                    isValid = false;
                }

                return isValid;
            }

            function setError(id, message) {
                const errorElement = document.getElementById(id);
                errorElement.innerText = message;
            }
        </script>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        


        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

    </html>

<?php
    include 'db.php';

    if (isset($_POST['submit'])) {
        // Retrieve form data
        $cname = mysqli_real_escape_string($conn, $_POST['cname']);
        $cdetails = mysqli_real_escape_string($conn, $_POST['cdetails']);
        $ctype = mysqli_real_escape_string($conn, $_POST['ctype']);
        $cfees = mysqli_real_escape_string($conn, $_POST['cfees']);
        $cduration = mysqli_real_escape_string($conn, $_POST['cduration']);
        $cseats = mysqli_real_escape_string($conn, $_POST['cseats']);

        // Check if a file is uploaded
        $file_name = $_FILES['cimage']['name'];
        $file_temp = $_FILES['cimage']['tmp_name'];
        $folder = 'courseimage/' . $file_name;
        if (move_uploaded_file($file_temp, $folder)) {
        } else {
            die("Error uploading file: " . $_FILES['cimage']['error']);
        }

        $sql = "INSERT INTO course (cname, cdetails, ctype, cfees, cduration, cseats, cimage)
                    VALUES ('$cname', '$cdetails', '$ctype', '$cfees', '$cduration', '$cseats', '$folder')";

        if (mysqli_query($conn, $sql)) {

            echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Course created successfully!',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function() {
                            window.location.replace('cources.php');
                        });
                    </script>";
        } else {

            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
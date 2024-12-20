<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'db.php';

if (strlen($_SESSION['admin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['sid'])) {
        $id = $_GET['sid'];
        $select = "SELECT * FROM `services` WHERE sid = '$id'";
        $query = mysqli_query($conn, $select);
        $show = mysqli_fetch_assoc($query);

        $gender = $show['gender'];
        $mainService = $show['mainService'];
        $subServiceName = $show['subServiceName'];
        $subServiceStyleTitle = $show['subServiceStyleTitle'];
        $subServiceStyleImage = $show['subServiceStyleImage'];
        $subServiceStyleDescription = $show['subServiceStyleDescription'];
        $subServiceStylePrice = $show['subServiceStylePrice'];
    }
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AS | Admin | Update Service Details</title>
        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <style>

        </style>
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

                <div class="updatecontainer m-5 mt-5">
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
                                        <option value="other">Other</option>
                                    </select>
                                    <div class="error" id="gender_error"></div>
                                </div>

                                <input type="hidden" name="id" value="<?php echo $id; ?>">

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
                                    <input type="text" class="form-control" id="subServiceName" name="subServiceName">
                                    <div class="error" id="subServiceName_error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="subServiceStyleTitle">Sub Service Style Title</label>
                                    <input type="text" class="form-control" id="subServiceStyleTitle" name="subServiceStyleTitle" required>
                                    <div class="error" id="subServiceStyleTitle_error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="subServiceStyleImage">Sub Service Style Image</label>
                                    <input type="file" class="form-control-file" id="subServiceStyleImage" name="subServiceStyleImage" accept="image/*">
                                    <div class="error" id="subServiceStyleImage_error"></div>
                                    <small class="text-muted">Leave empty if you don't want to change the image.</small>
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

                <!-- footer -->

                <?php
                include './include/footer.php';
                ?>
            </div>

        </div>

        <!-- =========== Scripts =========  -->
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

            // SweetAlert code for successful submission
            <?php if (isset($_GET['success']) && $_GET['success'] === 'true') : ?>
                Swal.fire({
                    title: 'Success!',
                    text: 'Data inserted successfully',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            <?php endif; ?>
        </script>
        <script>
            document.getElementById('gender').value = '<?php echo $gender; ?>';
            document.getElementById('mainService').value = '<?php echo $mainService; ?>';
            document.getElementById('subServiceName').value = '<?php echo $subServiceName; ?>';
            document.getElementById('subServiceStyleTitle').value = '<?php echo $subServiceStyleTitle; ?>';
            // File input (subServiceStyleImage) cannot be set directly due to security reasons
            // Only update it if a new image is uploaded
            if ('<?php echo $subServiceStyleImage; ?>' !== '') {
                document.getElementById('subServiceStyleImage').setAttribute('data-default', '<?php echo $subServiceStyleImage; ?>');
            }
            document.getElementById('subServiceStyleDescription').innerText = '<?php echo $subServiceStyleDescription; ?>';
            document.getElementById('subServiceStylePrice').value = '<?php echo $subServiceStylePrice; ?>';
        </script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./notif.js"></script>

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


        // Check if a new image is uploaded
        if ($_FILES['subServiceStyleImage']['size'] > 0) {
            $file_name = $_FILES['subServiceStyleImage']['name'];
            $file_temp = $_FILES['subServiceStyleImage']['tmp_name'];
            $folder = 'serviceimages/' . $file_name;
            move_uploaded_file($file_temp, $folder);

            // Update all fields, including the new image
            $update = "UPDATE `services` 
        SET 
            `gender` = '$gender', 
            `mainService` = '$mainService', 
            `subServiceName` = '$subServiceName', 
            `subServiceStyleTitle` = '$subServiceStyleTitle', 
            `subServiceStyleImage` = '$folder', 
            `subServiceStyleDescription` = '$subServiceStyleDescription', 
            `subServiceStylePrice` = '$subServiceStylePrice' 
        WHERE `sid` = '$id'";
        } else {
            // No new image, update other fields only
            $update = "UPDATE `services` 
        SET 
            `gender` = '$gender', 
            `mainService` = '$mainService', 
            `subServiceName` = '$subServiceName', 
            `subServiceStyleTitle` = '$subServiceStyleTitle',
            `subServiceStyleDescription` = '$subServiceStyleDescription', 
            `subServiceStylePrice` = '$subServiceStylePrice' 
        WHERE `sid` = '$id'";
        }


        $query = mysqli_query($conn, $update);


        if (!$query) {
            // Query execution failed, provide detailed error information
            echo "<script>
             Swal({
                 title: 'Error!',
                 text: 'Failed to Update the Service. Please try again later.',
                 icon: 'error',
                 button: false,
                 timer: 1500
             }).then(function() {
                 window.location.href = 'updateservice.php';
             });
         </script>";
        } else {
            echo "<script>
                 swal({
                     title: 'Update Service Successfully',
                     text: 'Your Are Successful Update Service ',
                     icon: 'success',            
                    button: false,
                    timer: 1500
                 }).then(function() {
                     window.location.href = 'services.php';
                 });
               </script>";
        }
    }
}
?>
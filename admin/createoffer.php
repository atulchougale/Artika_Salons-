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
        <title>AS | Admin | Create Offer</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- SweetAlert CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Custom CSS -->
       
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
                                    <h3 class="text-center">Create Offer</h3>
                                </div>
                                <div class="card-body">
                                    <form name="course" action="#" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                                    <div class="form-group">
                                   
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name " required>
                                            <span id="typeError" class="error"></span>
                                        </div>
                                    
                                    <div class="form-group">
                                            <label for="details">Offer Details</label>
                                            <textarea class="form-control" rows="3" name="details" id="details" placeholder="Enter offer details" required></textarea>
                                            <span id="detailsError" class="error"></span>
                                        </div>
                                      
                                        <div class="form-group">
                                            <label for="fees">Price</label>
                                            <input type="text" class="form-control" name="price" id="fees" placeholder="Enter offer price" required>
                                            <span id="priceError" class="error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="discount">Percentage Off</label>
                                            <input type="text" class="form-control" name="discount" id="discount" placeholder="Enter percentage off">
                                            <span id="discountError" class="error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Offer Image</label>
                                            <input type="file" class="form-control" name="image" id="image" required>
                                            <span id="imageError" class="error"></span>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary">Create</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
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

                var name = document.getElementById('name');
                var details = document.getElementById('details');
              
                var price = document.getElementById('price');
                var image = document.getElementById('image');

                setError('nameError', '');
                setError('detailsError', '');
              
                setError('priceError', '');
                setError('imageError', '');

              
                if (name.value.trim() === '') {
                    setError('nameError', 'name is required');
                    isValid = false;
                }

                if (details.value.trim() === '') {
                    setError('detailsError', 'Details is required');
                    isValid = false;
                }


                if (fees.value.trim() === '') {
                    setError('priceError', 'price is required');
                    isValid = false;
                }

                if (!image.files[0]) {
                    setError('imageError', 'Please select an image');
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

    $name = "";
    if (isset($_POST['submit'])) {
        // Retrieve form data

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $details = mysqli_real_escape_string($conn, $_POST['details']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $discount = mysqli_real_escape_string($conn, $_POST['discount']);
       

        // Check if a file is uploaded
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        $folder = 'offerimage/' . $file_name;
        if (move_uploaded_file($file_temp, $folder)) {
        } else {
            die("Error uploading file: " . $_FILES['image']['error']);
        }

        $sql = "INSERT INTO offer ( name, details, price, discount, image)
                    VALUES ('$name', '$details', '$price','$discount', '$folder')";

        if (mysqli_query($conn, $sql)) {

            echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Offer created successfully!',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function() {
                            window.location.replace('offer.php');
                        });
                    </script>";
        } else {

            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
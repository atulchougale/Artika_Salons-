<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'db.php';

if (strlen($_SESSION['admin']) == 0) {
  header('location:index.php');
} else {
    $name = $details = $price = $discount = '';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $select = "SELECT * FROM `offer` WHERE id = '$id'";
        $query = mysqli_query($conn, $select);
        $show = mysqli_fetch_assoc($query);

        if ($show) {
            $name = $show['name'];
            $details = $show['details'];
            $price = $show['price'];
            $discount = $show['discount'];
           
        } else {
            // Handle the case where no record is found with the provided id
            // For example, redirect to an error page or display a message
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AS | Admin | Update Offer Details</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

        <link rel="stylesheet" href="assets/css/style.css">
        <style>
            /* Custom CSS styles */
            .container2 {

                position: relative;
                width: 100%;
            }

            .topbar {
                position: sticky;
                top: 0;
                left: 0;
                width: 100%;
                background-color: #fff;
                z-index: 1000;
                border-bottom: 1px solid #ccc;
                /* Optional */
                padding: 10px 0;
            }

            .form-group {
                margin-bottom: 20px;
            }

            label {
                font-weight: bold;
            }

            .error {
                color: red;
                font-size: 12px;
            }

            .footer {
                margin-top: 10px;
            }
        </style>
    </head>

    <body>
 

        <!-- =============== Navigation ================ -->

        <div class="container2">
            <?php
            include './include/sidebar.php';
            ?>

            <!-- ========================= Main ==================== -->

            <div class="main">
                <?php
                include './include/topbar.php';
                ?>



    
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center">Update Offer</h3>
                                </div>
                                <div class="card-body">
                                    <form action="#" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                                    <div class="form-group">
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="details">Offer Details</label>
                                            <textarea class="form-control" rows="4" name="details" id="details" required=""><?php echo $details; ?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="price">price</label>
                                            <input type="text" class="form-control" name="price" id="price" value="<?php echo $price; ?>" required="">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="discount">Percentage Off</label>
                                            <input type="text" class="form-control" name="discount" id="discount" value="<?php echo $discount; ?>" required="">
                                          
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Offer Image</label>
                                            <input type="file" class="form-control" name="image" id="image">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Include Footer -->
                <?php
                include './include/footer.php';
                ?>

            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./notif.js"></script>


        <!-- =========== Scripts =========  -->
        <script src="assets/js/main.js"></script>

       <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

       
    </body>

    </html>
    <?php
include 'db.php';

$type = $details = $fees = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM `offer` WHERE id = '$id'";
    $query = mysqli_query($conn, $select);
    $show = mysqli_fetch_assoc($query);

    if ($show) {
        $name = $show['name'];
        $details = $show['details'];
        $price = $show['price'];
        $discount = $show['discount'];
    } else {
        // Handle the case where no record is found with the provided id
        // For example, redirect to an error page or display a message
        echo "No record found with the provided id.";
        exit; // Stop further execution
    }
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $details = $_POST['details'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];

    // Check if a new image is uploaded
    if ($_FILES['image']['size'] > 0) {
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        $folder = 'offerimage/' . $file_name;
        move_uploaded_file($file_temp, $folder);

        // Update all fields, including the new image
        $update = "UPDATE `offer` 
            SET 
                `name` = '$name', 
                `details` = '$details', 
                `price` = '$price',
                `discount`= '$discount',
                `image` = '$folder' 
            WHERE `id` = '$id'";
    } else {
        // No new image, update other fields only
        $update = "UPDATE `offer` 
            SET 
                `name` = '$name', 
                `details` = '$details', 
                `price` = '$price',
                `discount`= '$discount'
            WHERE `id` = '$id'";
    }

    $query = mysqli_query($conn, $update);

    if (!$query) {
        // Query execution failed, provide detailed error information
        echo "<script>
             Swal({
                 title: 'Error!',
                 text: 'Failed to Update the Offer. Please try again later.',
                 icon: 'error',
                 button: false,
                 timer: 1500
             }).then(function() {
                 window.location.href = 'updateoffer.php';
             });
         </script>";
    } else {
        echo "<script>
                 swal({
                     title: 'Update Course Successfully',
                     text: 'Your Are Successful Update Offer ',
                     icon: 'success',            
                    button: false,
                    timer: 1500
                 }).then(function() {
                     window.location.href = 'offer.php';
                 });
               </script>";
    }
}
}
?>

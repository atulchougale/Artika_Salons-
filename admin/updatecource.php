<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'db.php';

if (strlen($_SESSION['admin']) == 0) {
    header('location:index.php');
} else {


    $cname = $cdetails = $ctype = $cfees = $cduration = $cseats = '';

    if (isset($_GET['cid'])) {
        $id = $_GET['cid'];
        $select = "SELECT * FROM `course` WHERE cid = '$id'";
        $query = mysqli_query($conn, $select);
        $show = mysqli_fetch_assoc($query);

        if ($show) {
            $cname = $show['cname'];
            $cdetails = $show['cdetails'];
            $ctype = $show['ctype'];
            $cfees = $show['cfees'];
            $cduration = $show['cduration'];
            $cseats = $show['cseats'];
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
        <title>AS | Admin | Update Course</title>

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
                                    <h3 class="text-center">Update Course</h3>
                                </div>
                                <div class="card-body">
                                    <form action="#" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label for="name">Course Name</label>
                                            <input type="text" class="form-control" name="cname" id="cname" value="<?php echo $cname; ?>" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="details">Course Details</label>
                                            <textarea class="form-control" rows="3" name="cdetails" id="cdetails" required=""><?php echo $cdetails; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Course Type</label>
                                            <select class="form-control" name="ctype" id="ctype" required="">
                                                <option value="">Please Select</option>
                                                <option value="Basic" <?php if ($ctype == 'Basic') echo 'selected'; ?>>Basic</option>
                                                <option value="Advance" <?php if ($ctype == 'Advance') echo 'selected'; ?>>Advance</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="fees">Course Fees</label>
                                            <input type="text" class="form-control" name="cfees" id="cfees" value="<?php echo $cfees; ?>" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="duration">Course Duration</label>
                                            <input type="text" class="form-control" name="cduration" id="cduration" value="<?php echo $cduration; ?>" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="seats">Course Seats</label>
                                            <input type="text" class="form-control" name="cseats" id="cseats" value="<?php echo $cseats; ?>" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Course Image</label>
                                            <input type="file" class="form-control" name="cimage" id="cimage">
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

    if (isset($_POST['submit'])) {


        $cname = $_POST['cname'];
        $cdetails = $_POST['cdetails'];
        $ctype = $_POST['ctype'];
        $cduration = $_POST['cduration'];
        $cseats = $_POST['cseats'];



        // Check if a new image is uploaded
        if ($_FILES['cimage']['size'] > 0) {
            $file_name = $_FILES['cimage']['name'];
            $file_temp = $_FILES['cimage']['tmp_name'];
            $folder = 'courseimage/' . $file_name;
            move_uploaded_file($file_temp, $folder);

            // Update all fields, including the new image
            $update = "UPDATE `course` 
        SET 
            `cname` = '$cname', 
            `cdetails` = '$cdetails', 
            `ctype` = '$ctype', 
            `cduration` = '$cduration', 
            `cimage` = '$folder', 
            `cseats` = '$cseats'
        WHERE `cid` = '$id'";
        } else {
            // No new image, update other fields only
            $update = "UPDATE `course` 
        SET 
            `cname` = '$cname', 
            `cdetails` = '$cdetails', 
            `ctype` = '$ctype', 
            `cduration` = '$cduration',
            `cseats` = '$cseats'
        WHERE `cid` = '$id'";
        }


        $query = mysqli_query($conn, $update);


        if (!$query) {
            // Query execution failed, provide detailed error information
            echo "<script>
             Swal({
                 title: 'Error!',
                 text: 'Failed to Update the Course. Please try again later.',
                 icon: 'error',
                 button: false,
                 timer: 1500
             }).then(function() {
                 window.location.href = 'updatecource.php';
             });
         </script>";
        } else {
            echo "<script>
                 swal({
                     title: 'Update Course Successfully',
                     text: 'Your Are Successful Update Course ',
                     icon: 'success',            
                    button: false,
                    timer: 1500
                 }).then(function() {
                     window.location.href = 'cources.php';
                 });
               </script>";
        }
    }
}
?>
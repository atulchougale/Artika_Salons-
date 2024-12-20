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
        <title>AS | Admin | Upload Gallery Photo</title>
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
                    <form class="align-items-center m-5" action="#" method="post" enctype="multipart/form-data">

                        <div class="row mb-4 mt-5 text-center">
                            <label for="inputEmail3" class="col-sm-4 mt-5 col-form-label">Name :</label>

                            <select class="col-sm-7 mt-5 form-control form-control-lg" name="gname" aria-label="Large select example required">
                                <option selected>Open this select photo Name</option>
                                <option value="hairCut">Hair Cut</option>
                                <option value="beardStyle">Beard Style</option>
                                <option value="colorWash">Color & Wash</option>
                                <option value="facial">Facial</option>
                                <option value="massage">Massage</option>

                            </select>

                        </div>
                        <div class="row mb-4 text-center">
                            <label for="inputPassword3" class="col-sm-4 col-form-label">Upload :</label>
                            <div class="col-sm-7">
                                <input type="file" name="gphoto" class="form-control-file" id="inputPassword3" required>
                            </div>
                        </div>

                        <div class="text-center mb-5">
                        <a href="managegallery.php" class="btn btn-primary  mb-5">Back to Gallery</a>
                            <button type="submit" name="submit" class="btn btn-success  mb-5">Upload</button>
                        </div>
                    </form>
                </div>

                <!-- ======================== Your Content=========== -->
                <?php
                include './include/footer.php';
                ?>
            </div>

        </div>

        <!-- =========== Scripts =========  -->

        <script src="./assets/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./notif.js"></script>

    </body>

    </html>

<?php
    if (isset($_POST['submit'])) {
        $gname = mysqli_real_escape_string($conn, $_POST['gname']);




        $file_name = $_FILES['gphoto']['name'];
        $file_temp = $_FILES['gphoto']['tmp_name'];
        $folder = 'Gallery/' . $file_name;

        // Check if the file was uploaded successfully
        if (move_uploaded_file($file_temp, $folder)) {
            echo "File uploaded successfully.<br>";
        } else {
            // File upload failed
            die("Error uploading file: " . $_FILES['gphoto']['error']);
        }

        // Data doesn't exist, proceed with insertion
        $sql = "INSERT INTO gallry (photo,galleryname) VALUES ('$folder','$gname')";

        // Print the query for debugging
        echo "Query: $sql<br>";

        $query = mysqli_query($conn, $sql);

        if (!$query) {
            // Query execution failed, provide detailed error information
            echo "<script>
         Swal({
             title: 'Error!',
             text: 'Failed to upload the Photo. Please try again later.',
             icon: 'error',
             button: false,
             timer: 2000
         }).then(function() {
             window.location.href = 'uploadgallery.php';
         });
     </script>";
        } else {
            echo "<script>
             swal({
                 title: 'Successful',
                 text: 'Your Are Successfully Uploaded Photo ',
                 icon: 'success',            
                button: false,
                timer: 2000
             }).then(function() {
                 window.location.href = 'uploadgallery.php';
             });
           </script>";
        }
    }
}
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'db.php';

if (strlen($_SESSION['admin']) == 0) {
    header('location:index.php');
} else {
    $id = $_GET['bid'];
    $select = "SELECT * FROM barbers WHERE bid = '$id'";
    $query = mysqli_query($conn, $select);
    $show = mysqli_fetch_assoc($query);


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AS | Admin | Update Barber Details</title>
        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <style>
            .crud {
                margin: 0 50px;
                padding: 10px;

            }

            .crud form {
                width: 50%;
                margin: 0 auto 0 auto;
            }



            .error {
                color: red;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .container {
                background-color: aliceblue;
                border-radius: 10px;
                margin-bottom: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }
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


                <!-- ======================== Your Content=========== -->

                <div class="container mt-3">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h2 class="mb-3" text align="center">Barber's Page</h2>
                            <form action="#" method="post" id="projectForm">
                                <div class="form-group">
                                    <label for="BarberName">Barber Name</label>
                                    <input type="text" class="form-control" id="Barbername" name="Barbername" value="<?php echo $show['barbername'] ?>" required>
                                    <div class="error" id="Barbername_error"></div>
                                </div>
                                <div class="form-group">
                                    <label for="specialist">Specialist</label>
                                    <input type="text" class="form-control" id="Specialist" name="Specialist" value="<?php echo $show['specialist'] ?>" required>
                                    <div class="error" id="Specialist_error"></div>
                                </div>
                                <div class="form-group">
                                    <label for="Extra Work">Extra Work</label>
                                    <input type="text" class="form-control" id="Extrawork" name="Extrawork" value="<?php echo $show['extrawork'] ?>" required>
                                    <div class="error" id="Extrawork_error"></div>

                                </div>
                                <div class="form-group">
                                    <label for="skill">Skill and Experience</label>
                                    <input type="text" class="form-control" id="skill" name="skill" value="<?php echo $show['skill'] ?>" required>
                                    <div class="error" id="skill_error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="packageimage">Barber Image</label>
                                    <input type="file" name="pimage" id="packageimage">
                                </div>
                                <div class="text-center">

                                    <button type="submit" class="btn btn-primary" id="submit" value="submit" name="submit">Update Details</button>
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

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            var projectForm = document.getElementById('projectForm');

            projectForm.addEventListener('submit', function(e) {
                if (!validateForm()) {
                    e.preventDefault(); // Prevent form submission if validation fails
                }
            });

            function validateForm() {
                var isValid = true;

                var barbername = document.getElementById('Barbername');
                var specialist = document.getElementById('Specialist');
                var extrawork = document.getElementById('Extrawork');
                var skill = document.getElementById('skill');
                setError('Barbername_error', '');
                setError('Specialist_error', '');
                setError('Extrawork_error', '');
                setError('skill_error', '');

                if (barbername.value.trim() === '') {
                    setError('Barbername_error', 'BarberName is required');
                    isValid = false;
                } else if (!/^[a-zA-Z\s]+$/.test(barbername.value.trim())) {
                    setError('Barbername_error', 'Invalid characters in name');
                    isValid = false;
                }

                if (specialist.value.trim() === '') {
                    setError('specialist_error', 'specialist is required');
                    isValid = false;
                }

                if (extrawork.value.trim() === '') {
                    setError('extrawork_error', 'Extrawork is required');
                    isValid = false;
                }

                if (skill.value.trim() === '') {
                    setError('Skill_error', 'skill is required');
                    isValid = false;
                }
                return isValid;
            }

            function setError(id, message) {
                const errorElement = document.getElementById(id);
                errorElement.innerHTML = message;
            }
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./notif.js"></script>


    </body>

    </html>

<?php

    $id = $_GET['bid'];
    if (isset($_POST['submit'])) {

        $barbername = $_POST['Barbername'];
        $specialist = $_POST['Specialist'];
        $extrawork = $_POST['Extrawork'];
        $skill = $_POST['skill'];

        // Check if a new image is uploaded
        if ($_FILES['pimage']['size'] > 0) {
            $file_name = $_FILES['pimage']['name'];
            $file_temp = $_FILES['pimage']['tmp_name'];
            $folder = 'barberimages/' . $file_name;
            move_uploaded_file($file_temp, $folder);

            // Update all fields, including the new image
            $update = "UPDATE barbers SET barbername ='$barbername', specialist = '$specialist', extrawork = '$extrawork',skill = '$skill', bphoto= '$folder' WHERE bid = '$id'";
        } else {
            // No new image, update other fields only
            $update = "UPDATE barbers SET barbername ='$barbername', specialist = '$specialist', extrawork = '$extrawork',skill = '$skill' WHERE bid = '$id'";
        }
        $query = mysqli_query($conn, $update);

        if ($query) {

            echo "<script>
           swal({
               title: 'Successfully!',
               text: 'Details Updated Successfully',
               icon: 'success',
               button: 'Ok, Done!',
           }).then(function() {
               window.location.href = 'managebarber.php';
           });
         </script>";
        } else {
            echo "<script>
           swal({
               title: 'Failed!',
               text: 'Details Updated Fail',
               icon: 'error',
               button: 'Ok, Done!',
           }).then(function() {
               window.location.href = 'updatebarber.php';
           });
         </script>";
        }
    }
}
?>
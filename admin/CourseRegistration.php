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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AS | Admin | Course Registration</title>
        <!--  -->

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./notif.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />
        <style>
            .view {
                margin: 40px;
                background-color: aqua;

            }

            body {
                background-color: #f0f0f0;
            }

            .outer-container {
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                color: white;
            }

            .inner-container {
                /* background-color: #ffd6d6; */
                background-color: #06BBCC;
                border-radius: 10px;
                margin-bottom: 20px;
                padding: 40px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                color: white;
            }

            h2 {
                color: #181d38;
                text-align: center;
            }

            @media (max-width: 768px) {
                .view {
                    margin: 20px;
                }
            }


            .custom-prev {
                border: 2px solid #1d1d1d;
                padding: 10px;
                padding-top: 10px;
                height: 40px;
                margin-bottom: 20px;
                background-color: greenyellow;
                color: #1d1d1d;
                font-weight: 600;

            }

            .custom-prev:hover {
                color: greenyellow;
                border: 2px solid greenyellow;
                background-color: #1d1d1d;
            }

            .custom-next {
                border: 2px solid #1d1d1d;
                padding: 10px;
                padding-top: 10px;
                height: 40px;
                margin-bottom: 20px;
                background-color: greenyellow;
                color: #1d1d1d;
                font-weight: 600;
                text-align: center;
            }

            .custom-next:hover {
                color: greenyellow;
                border: 2px solid greenyellow;
                background-color: #1d1d1d;
            }

            .t {
                margin-top: 40px;
            }

            .btn-success {
                margin-left: 40px;
                margin-bottom: 0px;
                color: white;
                background-color: #06BBCC;
            }

            .button {
                padding: 5px 10px;
                margin: 0 5px;
                cursor: pointer;
            }

            .confirm {
                background-color: #4CAF50;
                /* Green */
                color: white;
            }

            .cancel {
                background-color: #f44336;
                /* Red */
                color: white;
                margin: 10px;
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

                <!-- content -->
                <div class="outer-container">
                    <div class="customer inner-container">
                        <h2 class="mb-4 heading">Course Details</h2>
                        <div class="table-responsive t">
                            <table class="table container">
                                <tr>
                                    <th>Course ID</th>
                                    <th>Candidate Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Batch</th>
                                    <th>Cources Name</th>
                                    <th>Cources Type </th>
                                    <th>Fees</th>
                                    <th>Address</th>
                                    <th>Registration Date</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                    <th>Action</th>

                                </tr>

                                <?php
                                include 'db.php';

                                $query = "SELECT courseregistration.crid,
                                            courseregistration.cid,
                                            courseregistration.batch,
                                            courseregistration.status,
                                            courseregistration.courseRegDate,
                                            courseregistration.cancelledby,
                                            courseregistration.UpdationDate,
                                            courseregistration.payment,
                                            registration.fname,
                                            registration.phone,
                                            registration.email,
                                            registration.gender,
                                            registration.address,
                                            registration.city,
                                            registration.state,
                                            course.cname,
                                            course.ctype,
                                            course.cfees
                                     FROM registration
                                     INNER JOIN courseregistration ON courseregistration.userEmail = registration.email
                                     INNER JOIN course ON course.cid = courseregistration.cid";

                                $query_show = mysqli_query($conn, $query);
                                while ($show = mysqli_fetch_assoc($query_show)) {
                                ?>
                                    <tr>
                                        <td>CR<?php echo $show['crid'] ?></td>
                                        <td><?php echo $show['fname'] ?></td>
                                        <td><?php echo $show['phone'] ?></td>
                                        <td><?php echo $show['email'] ?></td>
                                        <td><?php echo $show['gender'] ?></td>
                                        <td><?php echo $show['batch'] ?></td>
                                        <td><a href="updatecource.php?cid=<?php echo $show['cid'] ?>"><?php echo $show['cname'] ?></a></td>
                                        <td><?php echo $show['ctype'] ?></td>
                                        <td><?php echo $show['cfees'] ?></td>
                                        <td><?php echo $show['address'] ?></td>
                                        <td><?php echo $show['courseRegDate'] ?></td>
                                        <td>
                                            <?php if ($show['status'] == '0') {
                                                echo "Pending";
                                            }
                                            if ($show['status'] == '1') {
                                                echo "Confirm";
                                            }
                                            if ($show['status'] == 2 and  $show['cancelledby'] == 'a') {
                                                echo "Canceled by you at " . $show['UpdationDate'];
                                            }
                                            if ($show['status'] == 2 and $show['cancelledby'] == 'u') {
                                                echo "Canceled by User at " . $show['UpdationDate'];
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            if (isset($show['payment'])) {
                                                if ($show['payment'] == '0') {
                                                    echo "Pending";
                                                } elseif ($show['payment'] == '1') {
                                                    echo "Paid";
                                                }
                                            } else {
                                                echo "Payment status not available";
                                            }
                                            ?>
                                        </td>

                                        </td>

                                        <?php  if ($show['status'] == 2 and $show['cancelledby'] == 'u') { ?>
                                            <td><a class="btn btn-danger" href="CourseRegistration.php?bkdid=<?php echo htmlentities($show['crid']) ?>" onclick="return confirm('Do you really want to Delete Appointment')">Delete</a>
                                            </td>
                                        <?php } else { ?>
                                            <td><a class="btn btn-danger" href="CourseRegistration.php?bkid=<?php echo htmlentities($show['crid']) ?>" onclick="return confirm('Do you really want to cancel Appointment')">Cancel</a>
                                                <a class="btn btn-success" href="CourseRegistration.php?bckid=<?php echo htmlentities($show['crid']) ?>" onclick="return confirm('Do you really want to Confirm Appointment')">Confirm</a>
                                            </td>
                                        <?php } ?>
                                    <tr>
                                    <?php
                                }
                                    ?>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
                include './include/footer.php';
                ?>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- =========== Scripts =========  -->
        <script src="assets/js/main.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



    </body>

    </html>

<?php
    if (isset($_REQUEST['bkid'])) {
        $crid = $_GET['bkid'];
        $status = 2;
        $cancelby = 'a';
        $update = "UPDATE courseregistration SET status='$status',cancelledby='$cancelby' WHERE  crid='$crid'";
        $query = mysqli_query($conn, $update);

        if ($query) {

            echo  "<script>
                swal({
                    title: 'Successfully!',
                    text: 'Course Cancelled successfully',
                    icon: 'success',
                    button: 'Ok, Done!',
                }).then(function() {
                    window.location.href = 'CourseRegistration.php';
                });
              </script>";
        } else {
            echo  "<script>
                swal({
                    title: 'Failed!',
                    text: 'Course  Cancelled Fail',
                    icon: 'error',
                    button: 'Ok, Done!',
                }).then(function() {
                    window.location.href = 'CourseRegistration.php';
                });
              </script>";
        }
    }


    if (isset($_REQUEST['bckid'])) {
        $bcid = $_GET['bckid'];
        $status = 1;

        $update = "UPDATE courseregistration SET status='$status' WHERE crid='$bcid'";
        $query = mysqli_query($conn, $update);

        if ($query) {

            echo  "<script>
                swal({
                    title: 'Successfully!',
                    text: 'Appointment Conformed successfully',
                    icon: 'success',
                    button: 'Ok, Done!',
                }).then(function() {
                    window.location.href = 'CourseRegistration.php';
                });
              </script>";
        } else {
            echo  "<script>
                swal({
                    title: 'Failed!',
                    text: 'Appointment Conformed Fail',
                    icon: 'error',
                    button: 'Ok, Done!',
                }).then(function() {
                    window.location.href = 'CourseRegistration.php';
                });
              </script>";
        }
    }

    if (isset($_REQUEST['bkdid'])) {
        $bkdid = $_GET['bkdid'];


        $update = "DELETE FROM courseregistration  WHERE crid='$bkdid'";
        $query = mysqli_query($conn, $update);

        if ($query) {

            echo  "<script>
                swal({
                    title: 'Successfully!',
                    text: 'Appointment Deleted successfully',
                    icon: 'success',
                    button: 'Ok, Done!',
                }).then(function() {
                    window.location.href = 'CourseRegistration.php';
                });
              </script>";
        } else {
            echo  "<script>
                swal({
                    title: 'Failed!',
                    text: 'Appointment Deletetion Fail',
                    icon: 'error',
                    button: 'Ok, Done!',
                }).then(function() {
                    window.location.href = 'CourseRegistration.php';
                });
              </script>";
        }
    }
}
?>
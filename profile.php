<?php
session_start();
$email = $_SESSION['user_email'];
include 'include/db.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Artika Saloon | User Profile</title>
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
    <link href="css/profile.css" rel="stylesheet">


    <script>
        function filterCourses(type) {
            var profile = document.getElementById('profile');
            var yourappintment = document.getElementById('yourappintment');
            var yourcources = document.getElementById('yourcources');


            if (type === 'yourappintment') {
                profile.style.display = 'none';
                yourappintment.style.display = 'block';
                yourcources.style.display = 'none';
            } else if (type === 'yourcources') {
                profile.style.display = 'none';
                yourappintment.style.display = 'none';
                yourcources.style.display = 'block';
            } else if (type === 'profile') {
                // Show all courses
                profile.style.display = 'block';
                yourappintment.style.display = 'none';
                yourcources.style.display = 'none';
            }
        }
    </script>
    <style>
        .profile .about_us1 {
            align-items: center !important;
            margin-left: 150px !important;
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


    <!-- Portfolio Filters -->
    <div class="d-flex justify-content-center" style="padding-bottom: 20px; margin-top: 20px;">
        <button class="btn btn-primary mx-2 custom-btn" onclick="filterCourses('profile')">Profile</button>
        <button class="btn btn-primary mx-2 custom-btn" onclick="filterCourses('yourappintment')">Your Appointment</button>
        <button class="btn btn-primary mx-2 custom-btn" onclick="filterCourses('yourcources')"> Your Cources </button>
    </div>





    <div class="profile" id="profile">

        <div class="about_us1 container rounder m-3 text-center">
            <div class="section-header1 text-center wow zoomIn animated animated" data-wow-delay=".5s">.
                <h2>Profile</h2>
            </div>
            <div class="container profile-container">

                <?php
                $view = "SELECT * FROM `registration` WHERE email ='$email'";
                $query = mysqli_query($conn, $view);
                $data = mysqli_fetch_assoc($query);
                ?>
                <div class="profile-picture">
                    <img src="<?php echo $data['profile'] ?>" alt="  <?php echo $data['fname'] ?>">
                </div>
                <div class="profile-info">
                    <h2>
                        <?php echo $data['fname'] ?>
                    </h2>
                    <p>Email:
                        <?php echo $data['email'] ?>
                    </p>
                </div>

                <div class="profile-details">
                    <table>
                        <tr>
                            <th>phone</th>
                            <td class="text-dark">
                                <?php echo $data['phone'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td class="text-dark">
                                <?php echo $data['gender'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td class="text-dark">
                                <?php echo $data['address'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td class="text-dark">
                                <?php echo $data['city'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td class="text-dark">
                                <?php echo $data['state'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Customer ID</th>
                            <td class="text-dark">
                                <?php echo $data['id'] ?>
                            </td>
                        </tr>

                    </table>
                </div>


                <div class="edit-profile-btn text-center">
                    <a href="updateuser.php?id=<?php echo $data['id'] ?>" class="btn btn-primary">Edit Profile</a>

                    <a href="Profile.php?id=<?php echo $data['id'] ?>" class="btn btn-danger" onclick=" return checkDelete()">Delete Profile</a>

                </div>
            </div>
        </div>


    </div>



    <!-- // Your Appointment -->

    <!-- content -->
    <div id="yourappintment" style="display: none;">
        <div class="outer-container">
            <div class=" inner-container">
                <div class="section-header1 text-center wow zoomIn animated animated" data-wow-delay=".5s">.
                    <h2>Your Appointments</h2>
                </div>
                <div class="table-responsive t">
                    <?php

                    $query = "SELECT sa.bookid, sa.date, sa.time,sa.cancelledby, sa.status, sa.paymentid,sa.bookdate, 
                                    s.subServiceStyleTitle, s.subServiceStylePrice, b.barbername
                                    FROM serviceapointment sa
                                    
                                    JOIN services s ON sa.sid = s.sid
                                    JOIN barbers b ON sa.bid = b.bid
                                    WHERE UserEmail='$email' ";

                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        echo '<div class="table-responsive">';
                        echo '<table style="width: 100%; margin-top: 20px; border-collapse: collapse; border-radius: 8px; overflow: hidden; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);" class="table table-bordered table-striped">';
                        echo '<thead><tr style="background-color: #014d55; color: white; padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd;">';
                        echo '<th>Book Id</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        
                        <th>Payment Id</th>
                        <th>Service</th>
                        <th>Price</th>
                        <th>Barber Name</th>
                        <th>Booking Date</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Invoice</th>
                        </tr>
                        </thead>';
                        echo '<tbody>';

                        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch all rows into an array
                        $rows = array_reverse($rows); // Reverse the order of the array

                        foreach ($rows as $row) {
                            echo '<tr style="padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd;" onmouseover="this.style.backgroundColor=\'#f5f5f5\'" onmouseout="this.style.backgroundColor=\'inherit\'">';
                            echo '<td>' . $row['bookid'] . '</td>';
                            echo '<td>' . $row['date'] . '</td>';

                            echo '<td>' . $row['time'] . '</td>';

                            echo '<td>' . (($row['paymentid'] == 0) ? 'Pending For Payment' : $row['paymentid']) . '</td>'; // Corrected syntax
                            echo '<td>' . $row['subServiceStyleTitle'] . '</td>';
                            echo '<td>' . $row['subServiceStylePrice'] . '</td>';
                            echo '<td>' . $row['barbername'] . '</td>';
                            echo '<td>' . $row['bookdate'] . '</td>';
                            echo '<td>';
                            if ($row['status'] == 2 && $row['cancelledby'] == 'a') {
                                echo 'Appointment is cancelled Due to selected Barber is not Available. please wait for barber or choose another.<span class = "text-danger " style = "font-size:25px;"> Delete this Appointment First.</span> ';
                            } else if ($row['status'] == 2 && $row['cancelledby'] == 'u') {
                                echo 'You are cancelled this Appointment';
                            } else if ($row['status'] == 1 && $row['paymentid'] == 0) {
                                echo '<a class="btn btn-success" href="appayment.php?bookid=' . htmlentities($row['bookid']) . '" onclick="return confirm(\'Are you sure to make payment.\')">Make Payment</a>';
                            } else if ($row['status'] == 0) {
                                echo 'Pending';
                            } else {
                                echo 'Booked';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($row['status'] == 2 && $row['cancelledby'] == 'a') {
                                echo '<a class="btn btn-danger" href="profile.php?bookid=' . htmlentities($row['bookid']) . '" onclick="return confirm(\'Do you really want to Delete Appointment\')">Delete</a>';
                            } else {
                                echo '<a class="btn btn-danger" href="profile.php?bkid=' . htmlentities($row['bookid']) . '" onclick="return confirm(\'Do you really want to cancel Appointment\')">Cancel</a>';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($row['status'] == 1 && $row['paymentid'] == 0) {
                                echo 'Pending for payment';
                            } else if ($row['paymentid'] == 0 && $row['status'] == 2) {
                                echo 'Cancelled';
                            } else {
                                echo '<a href="./invoice.php?bookid=' . htmlentities($row['bookid']) . '" class="btn btn-primary">Download</a></td>';
                            }
                            echo '</td>';
                            echo '</tr>';
                        }

                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                    } else {
                        echo '<p>No data available.</p>';
                    }
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <!-- Your Courses -->

    <div id="yourcources" style="display: none;">

        <div>
            <div class="section-header1 text-center wow fadeInDown animated animated" data-wow-delay=".5s" style="margin-top: 50px;">

                <div class="outer-container">
                    <div class=" inner-container">
                        <h2 class="mb-4 heading">Your Cources</h2>
                        <div class="table-responsive t">
                            <table class="table ">
                                <tr>
                                    <th>ID</th>
                                    <th>Cources Name</th>
                                    <th>Cources Type </th>
                                    <th>Fees</th>
                                    <th>Registration Date</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                    <th>Action</th>

                                </tr>

                                <?php
                                $query = "SELECT courseregistration.crid,
                                            courseregistration.cid,
                                            courseregistration.batch,
                                            courseregistration.status,
                                            courseregistration.courseRegDate,
                                            courseregistration.cancelledby,
                                            courseregistration.UpdationDate,
                                            courseregistration.payment,
                                          
                                            course.cname,
                                            course.ctype,
                                            course.cfees
                                     FROM  courseregistration 
                                     INNER JOIN course ON course.cid = courseregistration.cid WHERE UserEmail='$email' ";

                                $query_show = mysqli_query($conn, $query);
                                while ($show = mysqli_fetch_assoc($query_show)) {
                                ?>

                                    <tr>
                                        <td>
                                            <?php echo $show['crid'] ?>
                                        </td>
                                        <td>
                                            <?php echo $show['cname'] ?>
                                        </td>
                                        <td>
                                            <?php echo $show['ctype'] ?>
                                        </td>
                                        <td>
                                            <?php echo $show['cfees'] ?>
                                        </td>
                                        <td>
                                            <?php echo $show['courseRegDate'] ?>
                                        </td>


                                        <td><?php if ($show['status'] == 0) {
                                                echo "Pending";
                                            }
                                            if ($show['status'] == 1) {
                                                echo "Confirmed";
                                            }
                                            if ($show['status'] == 2 and  $show['cancelledby'] == 'u') {
                                                echo "Canceled by you at " . $show['UpdationDate'];
                                            }
                                            if ($show['status'] == 2 and $show['cancelledby'] == 'a') {
                                                echo "Canceled by admin at " . $show['UpdationDate'];
                                            }
                                            ?></td>

                                        <?php if ($show['payment'] == 0 && $show['status'] == 1) {
                                        ?>
                                            <td><a class="btn btn-success" href="coursepayment.php?crid=<?php echo htmlentities($show['crid']); ?>" onclick="return confirm('Are you sure to make payment.')">Make Payment</a></td>
                                        <?php } else if ($show['payment'] == 0 && $show['status'] == 0) { ?>
                                            <td>Wait For Action</td>
                                        <?php } else if ($show['status'] == 2) { ?>
                                            <td>Cancelled</td>
                                        <?php } else { ?>
                                            <td>Paid</td>
                                        <?php } ?>


                                        <?php if ($show['status'] == 2 and $show['cancelledby'] == 'a') {
                                        ?><td><a class="btn btn-danger" href="profile.php?bkdid=<?php echo htmlentities($show['crid']) ?>" onclick="return confirm('Do you really want to Delete Appointment')">Delete</a>
                                            </td>
                                        <?php } else { ?>
                                            <td><a href="profile.php?crid=<?php echo htmlentities($show['crid']); ?>" onclick="return confirm('Do you really want to cancel booking')">Cancel</a></td>
                                        <?php } ?>


                                    <tr>
                                    <?php
                                }
                                    ?>
                            </table>
                        </div>
                    </div>





                </div>
            </div>

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script>
        function checkDelete() {
            return confirm('Are you sure you want to delete Your Account?');
        }
    </script>
</body>

</html>


<?php
if (isset($_REQUEST['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM registration WHERE id = '$id'";
    $data = mysqli_query($conn, $query);

    if ($data) {
        session_destroy();

        echo "<script>
            swal({
                title: 'Successfully!',
                text: 'Your Account is Delete Successfully',
                icon: 'success',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'index.php';
            });
          </script>";
    } else {
        echo "<script>
            swal({
                title: 'Failed!',
                text: 'Account Delete Fail',
                icon: 'error',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'profile.php';
            });
          </script>";
    }
}

if (isset($_REQUEST['bookid'])) {
    $id = $_GET['bookid'];

    $query = "DELETE FROM serviceapointment WHERE bookid = '$id'";
    $data = mysqli_query($conn, $query);

    if ($data) {


        echo "<script>
            swal({
                title: 'Successfully!',
                text: 'Cancel Appointment is Delete Successfully',
                icon: 'success',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'profile.php';
            });
          </script>";
    } else {
        echo "<script>
            swal({
                title: 'Failed!',
                text: 'Cancel Appointment Delete Fail',
                icon: 'error',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'profile.php';
            });
          </script>";
    }
}

if (isset($_REQUEST['bkid'])) {
    $bkid = $_GET['bkid'];
    $status = 2;
    $cancelby = 'u';
    $update = "UPDATE serviceapointment SET status='$status',cancelledby='$cancelby' WHERE  bookid='$bkid'";
    $query = mysqli_query($conn, $update);

    if ($query) {

        echo  "<script>
            swal({
                title: 'Successfully!',
                text: 'Your Appointment Cancelled successfully',
                icon: 'success',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'profile.php';
            });
          </script>";
    } else {
        echo  "<script>
            swal({
                title: 'Failed!',
                text: 'Your Appointment  Cancelled Fail',
                icon: 'error',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'profile.php';
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
                window.location.href = 'profile.php';
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
                window.location.href = 'profile.php';
            });
          </script>";
    }
}
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'db.php';

if (strlen($_SESSION['admin']) == 0) {
    header('location:index.php');
} else {

    // Count the number of appointments
    $view = "SELECT COUNT(*) AS total FROM `serviceapointment`";
    $query = mysqli_query($conn, $view);
    $data = mysqli_fetch_assoc($query);
    $totalAppointments = $data['total'];

    // Count the number of services
    $view1 = "SELECT COUNT(*) AS total FROM `services`";
    $query1 = mysqli_query($conn, $view1);
    $data1 = mysqli_fetch_assoc($query1);
    $totalServices = $data1['total'];

    // Count the number of courses
    $view2 = "SELECT COUNT(*) AS total FROM `course`";
    $query2 = mysqli_query($conn, $view2);
    $data2 = mysqli_fetch_assoc($query2);
    $totalCourses = $data2['total'];

    // Count the number of messages
    $view3 = "SELECT COUNT(*) AS total FROM `contacts`";
    $query3 = mysqli_query($conn, $view3);
    $data3 = mysqli_fetch_assoc($query3);
    $totalMessages = $data3['total'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AS | Admin | Dashboard</title>
        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="assets/css/style.css">

        <style>
            .cardHeader {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 0;
            }

            .cardHeader .btn {
                margin-left: 10px;

            }



            .cardBox .iconBx {
                margin-left: auto;
                /* Align icon to the right */
            }
        </style>
    </head>

    <body>
        <!-- =============== Navigation ================ -->
        <div class="container">
            <?php include './include/sidebar.php'; ?>

            <!-- ========================= Main ==================== -->
            <div class="main">
                <?php include './include/topbar.php'; ?>

                <!-- ======================= Cards ================== -->
                <div class="cardBox" id="cardBox">
                    <?php
                    $cardData = [
                        ["name" => "Appointments", "number" => $totalAppointments, "icon" => "calendar", "link" => "manageAppointment.php"],
                        ["name" => "Services", "number" => $totalServices, "icon" => "cube", "link" => "services.php"],
                        ["name" => "Courses", "number" => $totalCourses, "icon" => "school", "link" => "CourseRegistration.php"],
                        ["name" => "Messages", "number" => $totalMessages, "icon" => "mail", "link" => "message.php"],
                    ];


                    function populateCards($data)
                    {
                        foreach ($data as $card) {
                            echo '
                            <div class="card">
                                <a href="' . $card["link"] . '">
                                    <div>
                                        <div class="numbers">' . $card["number"] . '</div>
                                        <div class="cardName">' . $card["name"] . '</div>
                                    </div>
                                    <div class="iconBx">
                                        <ion-icon name="' . $card["icon"] . '"></ion-icon>
                                    </div>
                                </a>
                            </div>';
                        }
                    }


                    // Call the function to populate cards when the page loads
                    populateCards($cardData);
                    ?>
                </div>



                <!-- ================= course appoinments Tables ================== -->
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">

                            <h2>Recent Service Appointments</h2>
                            <a href="manageAppointment.php" class="btn">View All</a>
                        </div>
                        <div class="table-responsive">
                            <table style="width: 100%;  border-collapse: collapse; border-radius: 8px;  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);" class="table table-bordered table-striped">
                                <thead>
                                    <tr style="background-color: #014d55; color: white; padding: 12px 15px; text-align: center; border-bottom: 1px solid #ddd;">
                                        <td>Name</td>
                                        <td>Service</td>
                                        <td>Price</td>
                                        <td>Barber</td>
                                        <td>RegDate</td>
                                        <td>Payment Status</td>
                                        <td>Status</td>

                                    </tr>
                                </thead>
                                <?php

                                $query = "SELECT sa.bookid,  sa.status,sa.bookdate, sa.paymentid, r.fname, 
                                                 s.subServiceStyleTitle, s.subServiceStylePrice, b.barbername
                                                FROM serviceapointment sa
                                                JOIN registration r ON sa.UserEmail = r.email
                                                JOIN services s ON sa.sid = s.sid
                                                JOIN barbers b ON sa.bid = b.bid
                                                ORDER BY sa.bookid ASC LIMIT 10 ";
                                $result = mysqli_query($conn, $query);

                                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch all rows into an array
                                $rows = array_reverse($rows); // Reverse the order of the array

                                foreach ($rows as $row) {
                                ?>
                                    <tbody>
                                        <tr style="padding: 12px 15px; text-align: center; border-bottom: 1px solid #ddd;" onmouseover="this.style.backgroundColor='#f5f5f5'" onmouseout="this.style.backgroundColor='inherit'">

                                            <td><?php echo $row['fname'] ?></td>
                                            <td><?php echo $row['subServiceStyleTitle'] ?></td>
                                            <td><?php echo $row['subServiceStylePrice'] ?></td>
                                            <td><?php echo $row['barbername'] ?></td>
                                            <td><?php echo $row['bookdate'] ?></td>
                                            <td><?php echo $row['paymentid'] ?></td>
                                            <td><?php echo $row['status'] ?></td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>

                    <div class="recentCustomers">
                        <div class="cardHeader">
                            <h2>Recent Customers</h2>
                            <a href="customer.php" class="btn">View All</a>
                        </div>

                        <table id="courseCustomersTable">
                            <?php
                            $query = "SELECT * FROM  `registration` ORDER BY id ASC LIMIT 10";
                            $query_show = mysqli_query($conn, $query);
                            while ($show = mysqli_fetch_assoc($query_show)) {

                            ?>
                                <tr>
                                    <td width="60px">
                                        <div class="imgBx"><img src="../<?php echo $show['profile'] ?>" alt=""></div>
                                    </td>
                                    <td>
                                        <h4><?php echo $show['fname'] ?><br> <span><?php echo $show['phone'] ?></span></h4>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>


                <!-- ================= Services appoinments Tables ================== -->

                <div class="details1">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Recent Course Registration</h2>
                            <a href="CourseRegistration.php" class="btn">View All</a>
                        </div>

                        <table style="width: 100%;  border-collapse: collapse; border-radius: 8px;  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #014d55; color: white; padding: 12px 15px; text-align: center; border-bottom: 1px solid #ddd;">

                                    <td>Name</td>
                                    <td>Course</td>
                                    <td>Batch</td>
                                    <td>Fee</td>
                                    <td>RegDate</td>
                                    <td>Payment Status</td>
                                    <td>Status</td>

                                </tr>
                            </thead>

                            <tbody>
                                <?php


                                $query = "SELECT courseregistration.crid,
                                            courseregistration.cid,
                                            courseregistration.batch,
                                            courseregistration.status,
                                            courseregistration.courseRegDate,
                                            
                                            courseregistration.payment,
                                            registration.fname,
                                          
                                            course.cname,
                                           
                                            course.cfees
                                     FROM registration
                                     INNER JOIN courseregistration ON courseregistration.userEmail = registration.email
                                     INNER JOIN course ON course.cid = courseregistration.cid   ORDER BY id ASC LIMIT 10";

                                $query_show1 = mysqli_query($conn, $query);
                                while ($show1 = mysqli_fetch_assoc($query_show1)) {
                                ?>
                                    <tr style="padding: 12px 15px; text-align: center; border-bottom: 1px solid #ddd;" onmouseover="this.style.backgroundColor='#f5f5f5'" onmouseout="this.style.backgroundColor='inherit'">
                                        <td><?php echo $show1['fname'] ?></td>
                                        <td><a href="updatecource.php?cid=<?php echo $show1['cid'] ?>"><?php echo $show1['cname'] ?></a></td>
                                        <td><?php echo $show1['batch'] ?></td>
                                        <td><?php echo $show1['cfees'] ?></td>
                                        <td><?php echo $show1['courseRegDate'] ?></td>
                                        <td>
                                            <?php
                                            if (isset($show1['payment'])) {
                                                if ($show1['payment'] == '0') {
                                                    echo "Pending";
                                                } elseif ($show1['payment'] == '1') {
                                                    echo "Paid";
                                                }
                                            } else {
                                                echo "Payment status not available";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($show1['status'] == '0') {
                                                echo "Pending";
                                            }
                                            if ($show1['status'] == '1') {
                                                echo "Confirm";
                                            }
                                            if ($show1['status'] == 2 and  $show1['cancelledby'] == 'a') {
                                                echo "Canceled by you at " . $show1['UpdationDate'];
                                            }
                                            if ($show1['status'] == 2 and $show1['cancelledby'] == 'u') {
                                                echo "Canceled by User at " . $show1['UpdationDate'];
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>


                </div>
                <?php
                include './include/footer.php';
                ?>

            </div>
        </div>
        <!-- =============== Scripts =========  -->
        <script src="assets/js/main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./notif.js"></script>
        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>

    </html>

<?php
}
?>
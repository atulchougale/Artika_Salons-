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
        <title>AS | Admin | Customers</title>
        <!--  -->
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--  -->
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



            .outer-container {
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                /* background-image: url('images/bg-image-2.jpg'); */
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                color: white;
            }

            .inner-container {

                background-color: #06BBCC;
                border-radius: 10px;
                margin-bottom: 20px;
                padding: 40px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                background-image: url('images/bg-image-1.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                color: white;
            }

            h2 {
                color: #00ffef;
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

                <!-- ======================= Cards ================== -->


                <!-- content -->
                <div class="outer-container">
                    <div class="customer inner-container">
                        <h2 class="mb-4 heading">Customers Details</h2>
                        <div class="table-responsive t">
                            <table class="table container">
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th> Option </th>
                                </tr>

                                <?php
                                include  '../include/db.php';

                                $results_per_page = 5;

                                $query_count = "SELECT COUNT(*) AS total FROM  `registration` ";
                                $result_count = mysqli_query($conn, $query_count);
                                $row_count = mysqli_fetch_assoc($result_count);
                                $total_records = $row_count['total'];

                                $total_pages = ceil($total_records / $results_per_page);

                                if (!isset($_GET['page'])) {
                                    $page = 1;
                                } else {
                                    $page = $_GET['page'];
                                }

                                $start_index = ($page - 1) * $results_per_page;

                                $query = "SELECT * FROM  `registration`LIMIT $start_index, $results_per_page";
                                $query_show = mysqli_query($conn, $query);
                                ?>

                                <?php
                                while ($show = mysqli_fetch_assoc($query_show)) {
                                ?>
                                    <tr>
                                        <td><?php echo $show['id'] ?></td>
                                        <td><?php echo $show['fname'] ?></td>
                                        <td><?php echo $show['phone'] ?></td>
                                        <td><?php echo $show['email'] ?></td>
                                        <td><?php echo $show['city'] ?></td>
                                        <td><?php echo $show['state'] ?></td>
                                        <td><?php echo $show['address'] ?></td>
                                        <td><?php echo $show['gender'] ?></td>
                                        <td>
                                            <div class="d-flex justify-content-between">

                                                <a class="btn btn-primary custom-next" href="customer.php?id=<?php echo $show['id'] ?>" onclick="return deleteask()">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>


                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php
                            $prev_page = $page - 1;
                            $next_page = $page + 1;

                            if ($page > 1) {
                                echo "<li class='page-item'><a class='page-link custom-prev' href='customer.php?page=$prev_page'>Previous</a></li>";
                            }

                            if ($page < $total_pages) {
                                echo "<li class='page-item'><a class='page-link custom-next' href='customer.php?page=$next_page'>Next</a></li>";
                            }
                            ?>
                        </ul>
                    </nav>


                </div>
                <?php
                include './include/footer.php';
                ?>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        <script>
            function deleteask() {
                return confirm('Are you sure you want to delete this record?');
            }
        </script>
        <!-- =========== Scripts =========  -->
        <script src="assets/js/main.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./notif.js"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

    </html>

    <!-- Your HTML and PHP code for view.php -->
    <!-- Make sure to include SweetAlert2 and its dependencies in your view.php -->

<?php

    if (isset($_REQUEST['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM registration WHERE id = '$id'";
        $data = mysqli_query($conn, $query);

        if ($data) {


            echo "<script>
                    swal({
                        title: ' Account Deleted Successfully',
                        text: 'This Account is not More.',
                        icon: 'success',
                        button: 'Ok, Done!',
                    }).then(function() {
                        window.location.href = 'customer.php';
                    });
                </script>";
        } else {
            echo "<script>
                    Swal({
                        title: 'Error!',
                        text: 'Service Creation Failed. Please try again later.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        window.location.href = 'customer.php';
                    });
                </script>";
        }
    }
}
?>
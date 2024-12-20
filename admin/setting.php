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
        <title>AS | Admin | Settings</title>
        <!--  -->
        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                /* background-image: url('images/bg-image-2.jpg'); */
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                color: white;
            }

            .inner-container {
                /* background-color: #ffd6d6; */
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

                <h2>Manage Admin</h2>
                <div class="me-5 mb-3 text-center">
                    <a href="passwordChange.php" class="rounded-2 btn btn-success"> Change Password</a>
                    <a href="adminregistration.php" class="rounded-2 btn btn-success">Add New Admin</a>
                </div>


                <!-- content -->
                <div class="outer-container">
                    <div class="customer inner-container">
                        <h2 class="mb-4 heading">Admin Details</h2>
                        <div class="table-responsive t">
                            <table class="table container">
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="15%">Full Name</th>
                                    <th width="15%">Phone</th>
                                    <th width="15%">Email</th>
                                    <th width="25%">RegDate</th>
                                    <th width="25%"> Option </th>
                                </tr>

                                <?php
                                include 'db.php';

                                $results_per_page = 5;

                                $query_count = "SELECT COUNT(*) AS total FROM  `admin` ";
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

                                $query = "SELECT * FROM  `admin`LIMIT $start_index, $results_per_page";
                                $query_show = mysqli_query($conn, $query);
                                ?>

                                <?php
                                while ($show = mysqli_fetch_assoc($query_show)) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $show['id'] ?>
                                        </td>
                                        <td>
                                            <?php echo $show['fname'] ?>
                                        </td>
                                        <td>
                                            <?php echo $show['phone'] ?>
                                        </td>
                                        <td>
                                            <?php echo $show['email'] ?>
                                        </td>
                                        <td>
                                            <?php echo $show['RegDate'] ?>
                                        </td>
                                        <td>
                                            <a href="updateAdmin.php?uid=<?php echo $show['id'] ?>" class="rounded-2 btn btn-primary">Update</a>
                                            <a href="setting.php?id=<?php echo $show['id'] ?>" class="rounded-2 btn btn-danger" onclick="return deleteask()">Delete</a>
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
                                echo "<li class='page-item'><a class='page-link custom-prev' href='setting.php?page=$prev_page'>Previous</a></li>";
                            }

                            if ($page < $total_pages) {
                                echo "<li class='page-item'><a class='page-link custom-next' href='setting.php?page=$next_page'>Next</a></li>";
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
    if (isset($_GET['message'])) {
        if ($_GET['message'] === 'success') {
            echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Data deleted successfully',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function() {
                window.location.href = 'customer.php';
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Error deleting data',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then(function() {
                window.location.href = 'customer.php';
            });
            </script>";
        }
    }



    if (isset($_REQUEST['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM admin WHERE id = '$id'";
        $data = mysqli_query($conn, $query);

        if ($data) {


            echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Data deleted successfully',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function() {
                window.location.href = 'setting.php';
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Error deleting data',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then(function() {
                window.location.href = 'setting.php';
            });
            </script>";
        }
    }
}
?>
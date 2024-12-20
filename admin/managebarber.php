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
    <title>AS | Admin | Barber Team</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .view {
            margin: 40px;
            background-color: aqua;
        }

        .outer-container {
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

            color: white;
        }

        .inner-container {
            background-color: #ffd6d6;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

            color: white;
        }

        h2 {
            text-align: center;
            color: black;
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



            <!-- ======================== Your Content=========== -->
            <div class="outer-container">
                <div class="view inner-container">
                    <div class="me-5 text-end">
                        <a class="rounded-2 btn btn-success" href="createbarber.php"> Create New Barber</a>
                    </div>

                    <h2 class="mb-4 heading">Manage Barber</h2>
                    <div class="table-responsive t">
                        <table class="table container">
                            <tr>
                                <th>ID</th>
                                <th>Barber Name</th>
                                <th>Specialist</th>
                                <th>Extra Work</th>
                                <th>Skill and Experience </th>
                                <th>Barber IMAGE</th>
                                <th>Action</th>
                            </tr>

                            <?php


                            $results_per_page = 5;

                            $query_count = "SELECT COUNT(*) AS total FROM `barbers`";
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

                            $query = "SELECT * FROM `barbers` LIMIT $start_index, $results_per_page";
                            $query_show = mysqli_query($conn, $query);
                            ?>

                            <?php
                            while ($show = mysqli_fetch_assoc($query_show)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $show['bid'] ?>
                                    </td>
                                    <td>
                                        <?php echo $show['barbername'] ?>
                                    </td>
                                    <td>
                                        <?php echo $show['specialist'] ?>
                                    </td>
                                    <td>
                                        <?php echo $show['extrawork'] ?>
                                    </td>
                                    <td>
                                        <?php echo $show['skill'] ?>
                                    </td>
                                    <td><img src="<?php echo $show['bphoto']; ?>" alt="<?php echo $show['bphoto']; ?>" style="max-width: 100px; max-height: 100px;"></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a class="btn btn-primary custom-prev" href="updatebarber.php?bid=<?php echo $show['bid'] ?>">Update</a>
                                            <a class="btn btn-primary custom-next" href="managebarber.php?bid=<?php echo $show['bid'] ?>" onclick="return deleteask()">Delete</a>
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
                            echo "<li class='page-item'><a class='page-link custom-prev' href='managebarber.php?page=$prev_page'>Previous</a></li>";
                        }

                        if ($page < $total_pages) {
                            echo "<li class='page-item'><a class='page-link custom-next' href='managebarber.php?page=$next_page'>Next</a></li>";
                        }
                        ?>
                    </ul>
                </nav>




                <!-- ======================== Your Content=========== -->
            </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./notif.js"></script>

    <script>
        function deleteask() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
</body>

</html>


<?php
if (isset($_REQUEST['bid'])) {
    $id = $_GET['bid'];



    $query = "DELETE FROM barbers WHERE bid = '$id'";
    $data = mysqli_query($conn, $query);

    if ($data) {


        echo  "<script>
            swal({
                title: 'Successfully!',
                text: 'Barber is Delete Successfully',
                icon: 'success',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'managebarber.php';
            });
          </script>";
    } else {
        echo  "<script>
            swal({
                title: 'Failed!',
                text: 'Barber Delete Fail',
                icon: 'error',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'managebarber.php';
            });
          </script>";
    }
}
}
?>
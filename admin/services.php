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
        <title>AS | Admin | Service</title>
        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="assets/css/style.css">


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="assets/css/style.css">

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
                <div class="outer-container">
                    <div class="view inner-container">
                        <div class="m-3 text-end">
                            <a class="rounded-2 btn btn-success" href="createservice.php"> Create New Service</a>
                        </div>
                        <h2 class="mb-4 heading">Services details</h2>
                        <div class="table-responsive t">
                            <table class="table container">
                                <tr>
                                    <th>ID</th>
                                    <th>GENDER</th>
                                    <th>MAIN SERVICE</th>
                                    <th>SUB SERVICE</th>
                                    <th>SUB SERVICE STYLE </th>
                                    <th>SERVICE IMAGE</th>
                                    <th>SERVICE PRICE</th>
                                    <th>ACTION</th>
                                </tr>

                                <?php
                                include './db.php';


                                $results_per_page = 5;

                                $query_count = "SELECT COUNT(*) AS total FROM `services`";
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

                                $query = "SELECT * FROM `services` LIMIT $start_index, $results_per_page";
                                $query_show = mysqli_query($conn, $query);
                                ?>

                                <?php
                                while ($show = mysqli_fetch_assoc($query_show)) {
                                ?>
                                    <tr>
                                        <td><?php echo $show['sid'] ?></td>
                                        <td><?php echo $show['gender'] ?></td>
                                        <td><?php echo $show['mainService'] ?></td>
                                        <td><?php echo $show['subServiceName'] ?></td>
                                        <td><?php echo $show['subServiceStyleTitle'] ?></td>
                                        <td><img src="<?php echo $show['subServiceStyleImage']; ?>" alt="Service Image" style="max-width: 100px; max-height: 60px;"></td>
                                        <td>₹ <?php echo $show['subServiceStylePrice'] ?></td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <a class="btn btn-primary custom-prev" href="updateservice.php?sid=<?php echo $show['sid'] ?>">Update</a>
                                                <a class="btn btn-danger custom-next" href="services.php?sid=<?php echo $show['sid'] ?>" onclick="return confirm('Do you really want to Delete Service')">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php
                                    $prev_page = $page - 1;
                                    $next_page = $page + 1;

                                    if ($page > 1) {
                                        echo "<li class='page-item'><a class='page-link' href='services.php?page=$prev_page'>Previous</a></li>";
                                    }

                                    if ($page < $total_pages) {
                                        echo "<li class='page-item'><a class='page-link' href='services.php?page=$next_page'>Next</a></li>";
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- ======================== Your Content=========== -->
                <?php
                include './include/footer.php';
                ?>
            </div>


        </div>

        </div>

        <!-- =========== Scripts =========  -->
        <script src="assets/js/main.js"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./notif.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>

<?php
    if (isset($_REQUEST['sid'])) {
        $id = $_GET['sid'];

        $query = "DELETE FROM services WHERE sid = '$id'";
        $data = mysqli_query($conn, $query);

        if ($data) {


            echo  "<script>
            swal({
                title: 'Successfully!',
                text: 'You  Service is Delete Successfully',
                icon: 'success',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'services.php';
            });
          </script>";
        } else {
            echo  "<script>
            swal({
                title: 'Failed!',
                text: 'Service Delete Fail',
                icon: 'error',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'services.php';
            });
          </script>";
        }
    }
}
?>
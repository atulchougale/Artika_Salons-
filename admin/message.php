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
        <title>AS | Admin | Message</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />

        
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
                    <div class="view inner-container">
                        <h2 class="mb-4 heading">Message From Customer</h2>
                        <div class="table-responsive t">
                            <table class="table container">
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>ACTION</th>
                                </tr>

                                <?php
                                include  '../include/db.php';

                                $results_per_page = 5;

                                $query_count = "SELECT COUNT(*) AS total FROM `contacts` ";
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

                                $query = "SELECT * FROM `contacts` LIMIT $start_index, $results_per_page";
                                $query_show = mysqli_query($conn, $query);
                                ?>

                                <?php
                                while ($show = mysqli_fetch_assoc($query_show)) {
                                    $modal_id = 'exampleModalLong_' . $show['id'];
                                ?>
                                    <tr>
                                        <td><?php echo $show['id'] ?></td>
                                        <td><?php echo $show['fname'] ?></td>
                                        <td><?php echo $show['email'] ?></td>
                                        <td><?php echo $show['subject'] ?></td>
                                        <td>
                                            <?php echo $show['message'] ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-dark rounded" href="message.php?id=<?php echo $show['id'] ?> " onclick="return confirm('Do you really want to Delete Enquiry')">Delete</a>
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
                                echo "<li class='page-item'><a class='page-link custom-prev' href='message.php?page=$prev_page'>Previous</a></li>";
                            }

                            if ($page < $total_pages) {
                                echo "<li class='page-item'><a class='page-link custom-next' href='message.php?page=$next_page'>Next</a></li>";
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./notif.js"></script>


        <!-- =========== Scripts =========  -->
        <script src="assets/js/main.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


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

        $query = "DELETE FROM contacts WHERE id = '$id'";
        $data = mysqli_query($conn, $query);

        if ($data) {


            echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Data deleted successfully',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function() {
                window.location.href = 'message.php';
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
                window.location.href = 'message.php';
            });
            </script>";
        }
    }
}
?>
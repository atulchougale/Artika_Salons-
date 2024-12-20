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
    <title>AS | Admin | Offers</title>

    <!-- ======= Styles ====== -->

    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert library -->
   
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
                    <div class="text-end m-3">
                        <a href="createoffer.php" class="btn btn-success">Create New Offer</a>
                    </div>
                    <h2 class="mb-4 heading">Offer Details</h2>
                    <div class="view table-responsive">
                        <table class="table">

                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Details</th>
                                <th>Price</th>
                                <th>% Off</th>
                                <th>Image</th>
                                <th>Operation</th>
                            </tr>

                            <?php

                            $results_per_page = 5;

                            $query_count = "SELECT COUNT(*) AS total FROM offer";
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

                            $query = "SELECT * FROM offer LIMIT $start_index, $results_per_page";
                            $query_show = mysqli_query($conn, $query);
                            ?>

                            <?php
                            while ($show = mysqli_fetch_assoc($query_show)) {
                            ?>
                                <tr>
                                    <td><?php echo $show['id'] ?></td>
                                    <td><?php echo $show['name'] ?></td>
                                    <td><?php echo $show['details'] ?></td>
                                    <td><?php echo $show['price'] ?></td>
                                    <td><?php echo $show['discount'] ?></td>
                                    <td><img src="<?php echo $show['image']; ?>" alt="Offer Image" style="max-width: 100px; max-height: 70px;"></td>
                                    <td>
                                        <a class="btn btn-outline-primary rounded"  href="updateoffer.php?id=<?php echo $show['id'] ?>">Update</a>
                                        <a class="btn btn-outline-danger rounded"  href="offer.php?id=<?php echo $show['id'] ?>" style="margin-left:10px;" onclick="return deleteask()">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>

                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                            $prev_page = $page - 1;
                            $next_page = $page + 1;

                            if ($page > 1) {
                                echo "<li class='page-item'><a class='page-link' href='offer.php?page=$prev_page'>Previous</a></li>";
                            }

                            if ($page < $total_pages) {
                                echo "<li class='page-item'><a class='page-link' href='offer.php?page=$next_page'>Next</a></li>";
                            }
                            ?>
                        </ul>
                    </nav>
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

    <script>
        function deleteask() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./notif.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>

<?php
include 'db.php';

if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $id = $_GET['id'];

    $delete = "DELETE FROM offer WHERE id = $id";

    $success = mysqli_query($conn, $delete);

    if ($success) {
        echo "<script>
            Swal.fire({
                title: 'Data deleted successfully!',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            }).then(function() {
                window.location.replace('offer.php');
            });
        </script>";
    } else {
        $error_message = mysqli_error($conn); // Get the specific MySQL error message
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Data not deleted. Error: $error_message',
                showConfirmButton: false,
                timer: 2000
            }).then(function() {
                window.location.replace('offer.php');
            });
        </script>";
    }
}
}
?>
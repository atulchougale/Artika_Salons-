<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'db.php';

if (strlen($_SESSION['admin']) == 0) {
    header('location:index.php');
} else {
    // Pagination
    $limit = 6; // Number of items per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
    $start = ($page - 1) * $limit; // Offset

    // Fetch total number of rows
    $result_count = mysqli_query($conn, "SELECT COUNT(*) AS total FROM `gallry`");
    $data_count = mysqli_fetch_assoc($result_count);
    $total_rows = $data_count['total'];

    // Calculate total pages
    $total_pages = ceil($total_rows / $limit);

    // Fetch data for the current page
    $view = "SELECT * FROM `gallry` LIMIT $start, $limit";
    $query = mysqli_query($conn, $view);
    $dataArray = array();

    // Loop through the fetched rows and store them in the array
    while ($data = mysqli_fetch_assoc($query)) {
        $dataArray[] = $data;
        //  echo $dataArray;
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AS | Admin | Gallery</title>
        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    </head>

    <body>
        <!-- =============== Navigation ================ -->
        <div class="container1">
            <?php include './include/sidebar.php'; ?>

            <!-- ========================= Main ==================== -->
            <div class="main">
                <?php include './include/topbar.php'; ?>

                <!-- ======================== Your Content=========== -->
                <div class="portfolio">
                    <div class="me-5 text-end button">
                        <a class="btn btn-outline-success" href="uploadgallery.php">Upload New Photo</a>
                        <a class="btn btn-outline-danger" id="delete-photo-button">Delete Photo</a>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <ul id="portfolio-flters">
                                    <li data-filter="*" class="filter-active wow lightSpeedIn animated animated" data-wow-delay=".3s">All</li>
                                    <li data-filter=".hairCut" class="wow lightSpeedIn animated animated" data-wow-delay=".5s">Hair Cut</li>
                                    <li data-filter=".beardStyle" class="wow lightSpeedIn animated animated" data-wow-delay=".7s">Beard Style</li>
                                    <li data-filter=".colorWash" class="wow lightSpeedIn animated animated" data-wow-delay=".9s">Color & Wash</li>
                                    <li data-filter=".facial" class="wow lightSpeedIn animated animated" data-wow-delay=".9s">Facial</li>
                                    <li data-filter=".massage" class="wow lightSpeedIn animated animated" data-wow-delay=".9s">Massage</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row portfolio-container">
                            <?php
                            // Loop through the data array instead of querying the database again
                            foreach ($dataArray as $data) {
                            ?>
                                <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item text-center <?php echo $data['galleryname'] ?>">
                                    <div class="portfolio-wrap">
                                        <a href="<?php echo $data['photo'] ?>" data-lightbox="portfolio">
                                            <img src="<?php echo $data['photo'] ?>" alt="Portfolio Image">
                                        </a>
                                    </div>
                                    <a class="btn btn-outline-danger mt-1 delete-button" style="display: none;" href="managegallery.php?id=<?php echo $data['id'] ?>" onclick="return confirm('Do you really want to Delete Photo')">Delete</a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php
                            // Render pagination links
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li class='page-item " . ($page == $i ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
                <!-- ======================== Your Content=========== -->
                <?php include './include/footer.php'; ?>
            </div>
        </div>

        <!-- =========== Scripts =========  -->
        <script src="assets/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>


        <script>
            $(document).ready(function() {
                // When the Delete Photo button is clicked
                $('#delete-photo-button').click(function() {
                    // Show the Delete button within each portfolio-wrap
                    $('.portfolio-item .delete-button').toggle();
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                // Initialize Isotope
                var $container = $('.portfolio-container').isotope({
                    itemSelector: '.portfolio-item',
                    layoutMode: 'fitRows'
                });

                // Filter items when filter link is clicked
                $('#portfolio-flters li').click(function() {
                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector
                    });
                    $('#portfolio-flters li').removeClass('filter-active');
                    $(this).addClass('filter-active');
                    return false;
                });
            });
        </script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./notif.js"></script>

    </body>

    </html>
<?php
    if (isset($_REQUEST['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM gallry WHERE id = '$id'";
        // Debugging: Echo out the delete query
        echo "Delete Query: $query <br>";

        $data = mysqli_query($conn, $query);

        if ($data) {
            echo  "<script>
            swal({
                title: 'Successfully!',
                text: 'You  Contact is Delete Successfully',
                icon: 'success',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'managegallery.php';
            });
          </script>";
        } else {
            echo  "<script>
            swal({
                title: 'Failed!',
                text: 'Contact Delete Fail',
                icon: 'error',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'managegallery.php';
            });
          </script>";
        }
    }
}
?>
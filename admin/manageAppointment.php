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
    <title>AS | Admin | Appointment</title>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />
    <style>
      .container h2 {
        color: blue;
        text-align: center;
        padding: 15px;
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

        <?php
        include 'db.php';

        $query = "SELECT sa.bookid, sa.date, sa.time, sa.cancelledby, sa.status, sa.paymentid, r.fname, r.phone, r.email, 
          r.gender, s.subServiceStyleTitle, s.subServiceStylePrice, b.barbername
          FROM serviceapointment sa
          JOIN registration r ON sa.UserEmail = r.email
          JOIN services s ON sa.sid = s.sid
          JOIN barbers b ON sa.bid = b.bid
          ORDER BY sa.bookid ASC";  // Add ORDER BY clause to sort by bookid in descending order

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          echo '<div class="table-responsive">';
          echo '<table style="width: 100%; margin-top: 20px; border-collapse: collapse; border-radius: 8px;  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);" 
                class="table table-bordered table-striped">';
          echo '<thead><tr style="background-color: #014d55; color: white; padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd;">';
          echo '<th>Book Id</th>
          <th>Book Date</th>
          <th>Book Time</th>
          <th>Payment Id</th>
          <th>Customer Name</th>
          <th>Customer Phone</th>
          <th>Customer Email</th>
          <th>Customer Gender</th>
          <th>Selected Service </th>
          <th>Selected Service Price</th>
          <th>Selected Barber Name</th>
          <th>Book status</th>

          <th>Action</th>
          <th>Invoice</th>


          </tr>
          </thead>';
          echo '<tbody>';

          $rows = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch all rows into an array
          $rows = array_reverse($rows); // Reverse the order of the array

          foreach ($rows as $row) {
            echo '<tr style="padding: 12px 15px; text-align: center; border-bottom: 1px solid #ddd;" onmouseover="this.style.backgroundColor=\'#f5f5f5\'" onmouseout="this.style.backgroundColor=\'inherit\'">';
            echo '<td>' . $row['bookid'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['time'] . '</td>';
            echo '<td>' . (($row['paymentid'] == 0) ? 'Waiting For Payment' : $row['paymentid']) . '</td>'; // Corrected syntax
            echo '<td>' . $row['fname'] . '</td>';
            echo '<td>' . $row['phone'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['gender'] . '</td>';
            echo '<td>' . $row['subServiceStyleTitle'] . '</td>';
            echo '<td>' . $row['subServiceStylePrice'] . '</td>';
            echo '<td>' . $row['barbername'] . '</td>';
            echo '<td>';
            if ($row['status'] == 2 && $row['cancelledby'] == 'u') {
              echo 'Appointment is cancelled by User. <span class = "text-danger " style = "font-size:25px;"> Delete this Appointment First.</span> ';
            } else if ($row['status'] == 2 && $row['cancelledby'] == 'a') {
              echo 'You are cancelled this Appointment';
            } else if ($row['status'] == 1 && $row['paymentid'] == 0) {
              echo 'Waiting for Payment!';
            } else if ($row['status'] == 0) {
              echo 'Pending';
            } else {
              echo 'Booked';
            }
            echo '</td>';
            echo '<td>';
            if ($row['status'] == 2 && $row['cancelledby'] == 'u') {
              echo '<a class="btn btn-danger" href="manageAppointment.php?bookid=' . htmlentities($row['bookid']) . '" onclick="return confirm(\'Do you really want to Delete Appointment\')">Delete</a>';
            } else if ($row['status'] == 0) {

              echo '<a class="btn btn-success" href="manageAppointment.php?bdkid=' . htmlentities($row['bookid']) . '" onclick="return confirm(\'Do you really want to cancel Appointment\')">Confirm</a>';
              echo '<a class="btn btn-danger" href="manageAppointment.php?bkid=' . htmlentities($row['bookid']) . '" onclick="return confirm(\'Do you really want to cancel Appointment\')">Cancel</a>';
            } else {
              echo '<a class="btn btn-danger" href="manageAppointment.php?bkid=' . htmlentities($row['bookid']) . '" onclick="return confirm(\'Do you really want to cancel Appointment\')">Cancel</a>';
            }
            echo '</td>';
            echo '<td>';
            if ($row['paymentid'] == 0 && $row['status']==2) {
              echo 'Cancelled';
            } else if ($row['status'] == 1 && $row['paymentid'] == 0) {
              echo 'Pending for payment';
            } else {
              echo '<a href="../invoice.php?bookid=' . htmlentities($row['bookid']) . '" class="btn btn-primary">Download</a></td>';
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
        <?php
        include './include/footer.php';
        ?>
      </div>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


      <script>
        function deletetask() {
          return confirm('are you sure you want to delete this record');
        }
      </script>
      <!-- =========== Scripts =========  -->
      <script src="assets/js/main.js"></script>

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


      <!-- ====== ionicons ======= -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>

  </html>


<?php
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
                window.location.href = 'manageAppointment.php';
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
                window.location.href = 'manageAppointment.php';
            });
          </script>";
    }
  }

  if (isset($_REQUEST['bdkid'])) {
    $crid = $_GET['bdkid'];
    $status = 1;

    $update = "UPDATE serviceapointment SET status='$status' WHERE  bookid='$crid'";
    $query = mysqli_query($conn, $update);

    if ($query) {

      echo  "<script>
            swal({
                title: 'Successfully!',
                text: 'Appointment Confirm successfully',
                icon: 'success',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'manageAppointment.php';
            });
          </script>";
    } else {
      echo  "<script>
            swal({
                title: 'Failed!',
                text: 'Appointment  Confirm Fail',
                icon: 'error',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'manageAppointment.php';
            });
          </script>";
    }
  }


  if (isset($_REQUEST['bkid'])) {
    $crid = $_GET['bkid'];
    $status = 2;
    $cancelby = 'a';
    $update = "UPDATE serviceapointment SET status='$status',cancelledby='$cancelby' WHERE  bookid='$crid'";
    $query = mysqli_query($conn, $update);

    if ($query) {

      echo  "<script>
            swal({
                title: 'Successfully!',
                text: 'Appointment Cancelled successfully',
                icon: 'success',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'manageAppointment.php';
            });
          </script>";
    } else {
      echo  "<script>
            swal({
                title: 'Failed!',
                text: 'Appointment  Cancelled Fail',
                icon: 'error',
                button: 'Ok, Done!',
            }).then(function() {
                window.location.href = 'manageAppointment.php';
            });
          </script>";
    }
  }
}
?>
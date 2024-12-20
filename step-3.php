<?php
session_start();
// Include database connection
include('./include/db.php');
$sid = mysqli_real_escape_string($conn, $_GET['sid']);
$bid = mysqli_real_escape_string($conn, $_GET['bid']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artika Saloon | Booking</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Datepicker CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />

    <!-- Bootstrap Datepicker JS and its dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Custom CSS -->
    <style>
       

        .booking-container {
            margin: 50px auto;
            background-color: #f5f8f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 60%;
            height: 500px;
        }

        .btn-next {
            display: block;
            margin: 0 auto;
        }

        .disc {
            text-align: center;
        }

        .custom-progress {
            width: 100%;
            height: 6px;
            background: #242423;
        }

        .custom-progress-body {
            height: 100%;
            width: 0;
            background: #014d55;
        }

        body {
            background-image: url('images/bg-image-2.jpg');
            /* Replace 'path/to/your/image.jpg' with the actual path to your background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            /* Remove default margin to ensure full coverage */
            padding: 0;
            /* Remove default padding to ensure full coverage */
        }

        /* Custom CSS to center the datepicker calendar */
        .datepicker {
            font-size: 30px;
            padding: 30px;
            width: 20%;
            /* Adjust the font size as needed */
        }

        /* Center the datepicker calendar */
        .datepicker.dropdown-menu {
            top: 30% !important;
            left: auto !important;
            right: 50% !important;
            transform: translateX(50%) !important;
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="container booking-container">
        <div class="custom-progress">
            <div class="custom-progress-body" style="width: 0;"></div>
        </div>
        <h2 class="text-center mb-4">Select Date and Time</h2>

        <form method="post" action="#">
        <!-- Datepicker -->
        <div class="form-group">
            <h3 for="datepicker">Select Date:</h3>
            <input type="text" id="datepicker" name="date" class="form-control" placeholder="Select Date" />
        </div>

        <!-- Time Slots -->
        <div class="form-group">
            <h3 for="timeSlot">Select Time Slot:</h3>
            <select class="form-control" id="timeSlot" name="timeSlot" required>
                <option value="" disabled selected>Select Time Slot</option>
                <option value="08:00 - 09:00">08:00 - 09:00</option>
                <option value="09:00 - 10:00">09:00 - 10:00</option>
                <option value="10:00 - 11:00">10:00 - 11:00</option>
                <option value="11:00 - 12:00">11:00 - 12:00</option>
                <option value="12:00 - 13:00">12:00 - 13:00</option>
                <option value="13:00 - 14:00">13:00 - 14:00</option>
                <option value="14:00 - 15:00">14:00 - 15:00</option>
                <option value="15:00 - 16:00">15:00 - 16:00</option>
                <option value="16:00 - 17:00">16:00 - 17:00</option>
                <option value="17:00 - 18:00">17:00 - 18:00</option>
                <option value="18:00 - 19:00">18:00 - 19:00</option>
                <option value="19:00 - 20:00">19:00 - 20:00</option>
                <option value="20:00 - 21:00">20:00 - 21:00</option>
            </select>
        </div>

        <!-- Next Button -->
        <div class="row justify-content" style="margin-top:100px; margin-left:28%">
            <div class="col-auto"><a class="btn btn-xs btn-primary btn-circle" href="step-2.php?sid=<?php echo $sid; ?>&bid=<?php echo $bid; ?>">Back To Barber
                    Page</a></div>
            <div class="col-auto"><button class="btn btn-xs btn-primary btn-circle" type="submit" name="submit">Submit Details</button></div>
        </div>
        </form>

          
    </div>

    <script>
        $(document).ready(function () {
            // Initialize Bootstrap Datepicker
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                autoclose: true,
                startDate: new Date(), // Disable past dates
                beforeShowDay: function (date) {
                    // Add custom classes to style past, current, and future dates
                    var currentDate = new Date();
                    currentDate.setHours(0, 0, 0, 0);

                    var selectedDate = moment(date).format('YYYY-MM-DD');
                    var formattedDate = moment(selectedDate).format('YYYY-MM-DD');

                    // Check if the date belongs to the current month or the next month
                    if (date.getMonth() === currentDate.getMonth()) {
                        // Current month
                        if (date.getTime() === currentDate.getTime()) {
                            // Current date
                            return {
                                classes: 'bg-primary text-white'
                            };
                        } else if (date > currentDate) {
                            // Future date
                            return {
                                classes: 'bg-success text-white'
                            };
                        } else {
                            // Past date
                            return {
                                classes: 'bg-secondary text-white',
                                disabled: true
                            };
                        }
                    } else {
                        // Next month
                        return {
                            classes: 'bg-warning text-white'
                        };
                    }
                }
            });
        });
    </script>

</body>

</html>



<?php


if (isset($_POST['submit'])) {
    $selectedDate = mysqli_real_escape_string($conn, $_POST['date']);
    $selectedTime = mysqli_real_escape_string($conn, $_POST['timeSlot']);
    $sid = mysqli_real_escape_string($conn, $_GET['sid']);
    $bid = mysqli_real_escape_string($conn, $_GET['bid']);
    $useremail = $_SESSION['user_email'];
    $status = 0;
    $paymentid = 0;

    // Check if the barber is available for the selected date and time
    $availabilityQuery = "SELECT * FROM serviceapointment WHERE bid='$bid' AND date='$selectedDate' AND time='$selectedTime'";
    $availabilityResult = mysqli_query($conn, $availabilityQuery);

    if (mysqli_num_rows($availabilityResult) > 0) {
        // Barber is not available, show alert or take appropriate action
        echo "<script>
                      swal({
                          title: 'Barber Not Available',
                          text: 'The selected barber is not available for the specified date and time.' ,
                          icon: 'error',
                          button: 'OK'
                       }).then(function() {
                        window.location.href = 'step-3.php?sid=" . $sid."&bid=" . $bid. "';
                    });
                 </script>";
    } else {
        // Barber is available, proceed with insertion
        // Check if the booking already exists for the selected date, time, and service
        $checkQuery = "SELECT * FROM serviceapointment WHERE useremail='$useremail' AND bid='$bid' AND date='$selectedDate' AND time='$selectedTime'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Booking already exists, show alert
            echo "<script>
            swal({
                title: 'Selected Date And Time IS Not Available',
                text: 'Booking already exists for the selected date, time, and service.' ,
                icon: 'error',
                button: 'OK'
             }).then(function() {
              window.location.href = 'step-3.php?sid=" . $sid."&bid=" . $bid. "';
          });
       </script>";
        } else {
            // Booking doesn't exist, proceed with insertion
            $insertQuery = "INSERT INTO serviceapointment (bookid, sid, useremail, bid, date, time,status,paymentid) VALUES ('','$sid','$useremail','$bid','$selectedDate','$selectedTime','$status','$paymentid')";
            $result = mysqli_query($conn, $insertQuery);

          // Check if the insertion was successful
if ($result) {
    $lastInsertedId = mysqli_insert_id($conn); // Get the last inserted bookid
    echo  "<script>
        swal({
            title: 'Your Appointment Details Saved Successfully 👍🏻.',
            text: 'Hooray! Now you can check status for make payment to book an appointment.',
            icon: 'success',
            button: 'Check Status',
        }).then(function() {
            window.location.href = 'profile.php';
        });
    </script>";
} else {
    echo  "<script>
        swal({
            title: 'Failed!',
            text: 'Your Appointment Details Not Saved.',
            icon: 'error',
            button: 'Retry!',
        }).then(function() {
            window.location.href = 'step-3.php?sid=" . $sid . "&bid=" . $bid . "';
        });
    </script>";
}

        }
    }
}
?>

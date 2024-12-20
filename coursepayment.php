<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- SweetAlert JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .booking-container {
            margin: 50px auto;
            background-color: #f5f8f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 60%;
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
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #014d55;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #014d55;
            border-color: #014d55;
        }

        .btn-primary:hover {
            background-color: #013540;
            border-color: #013540;
        }
    </style>
     <script>
        function togglePaymentForm() {
            var paymentMethod = document.getElementById("paymentMethod");
            var cardFormContainer = document.getElementById("cardFormContainer");
            var netBankingFormContainer = document.getElementById("netBankingFormContainer");
            var upiFormContainer = document.getElementById("upiFormContainer");
            var bankTransferFormContainer = document.getElementById("bankTransferFormContainer");

            cardFormContainer.style.display = "none";
            netBankingFormContainer.style.display = "none";
            upiFormContainer.style.display = "none";
            bankTransferFormContainer.style.display = "none";

            if (paymentMethod.value === "cardpayment") {
                cardFormContainer.style.display = "block";
            } else if (paymentMethod.value === "netbanking") {
                netBankingFormContainer.style.display = "block";
            } else if (paymentMethod.value === "upi") {
                upiFormContainer.style.display = "block";
            } else if (paymentMethod.value === "banktransfer") {
                bankTransferFormContainer.style.display = "block";
            }
        }
    </script>
</head>

<body>
    <div class="container booking-container">
        <div class="custom-progress">
            <div class="custom-progress-body" style="width: 0;"></div>
        </div>
        <h2> Your Selected Details For Booking A Course </h2>

        <!-- fetched data of serviceapointment table -->
        <?php
include('./include/db.php');

// Retrieve bookid from URL parameter
$crid = isset($_GET['crid']) ? mysqli_real_escape_string($conn, $_GET['crid']) : '';

// Assuming you have a table named 'serviceapointment' with columns 'sid', 'bid', etc.
// Assuming 'registration', 'barber', and 'services' are the names of other tables
$query = "SELECT 
    courseregistration.crid,
    courseregistration.cid,
    courseregistration.batch,
    courseregistration.status,
    courseregistration.courseRegDate,
    courseregistration.cancelledby,
    courseregistration.UpdationDate,
    courseregistration.payment,
    registration.fname,
    registration.phone,
    registration.email,
    registration.gender,
    registration.address,
    registration.city,
    registration.state,
    course.cname,
    course.ctype,
    course.cfees
FROM 
    registration
INNER JOIN 
    courseregistration ON courseregistration.userEmail = registration.email
INNER JOIN 
    course ON course.cid = courseregistration.cid
      WHERE  courseregistration.crid = '$crid'";

$query_show = mysqli_query($conn, $query);

if (mysqli_num_rows($query_show) > 0) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered table-striped">';
    echo '<thead><tr>
            <th>ID</th>
            <th>Candidate Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Batch</th>
            <th>Course Name</th>
            <th>Course Type</th>
            <th>Fees</th>
            <th>Address</th>
            <th>Registration Date</th>
          </tr></thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($query_show)) {
        echo '<tr>';
        echo '<td>' . $row['crid'] . '</td>';
        echo '<td>' . $row['fname'] . '</td>';
        echo '<td>' . $row['phone'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['gender'] . '</td>';
        echo '<td>' . $row['batch'] . '</td>';
        echo '<td>' . $row['cname'] . '</td>';
        echo '<td>' . $row['ctype'] . '</td>';
        echo '<td>' . $row['cfees'] . '</td>';
        echo '<td>' . $row['address'] . '</td>';
        echo '<td>' . $row['courseRegDate'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo '<p>No data available.</p>';
}
?>




        <div class="form-group">
            <label for="paymentMethod">Select Payment Method:</label>
            <select class="form-control" id="paymentMethod" name="paymentMethod" onchange="togglePaymentForm()">
                <option value="" disabled selected>Select Payment Method</option>
                <option value="netbanking">Net Banking</option>
                <option value="upi">UPI</option>
                <option value="cardpayment">Card Payment</option>
                <option value="banktransfer">Bank Transfer</option>
            </select>
        </div>

        <!-- Card Payment Form -->
        <div class="container mt-5" id="cardFormContainer" style="display: none;">
            <h2> Fill Card Details For Processing Payment</h2>
            <form id="cardPaymentForm" action="#" method="post" onsubmit="return validateCardForm()">
                <div class="form-group">
                    <label for="cardNumber">Card Number:</label>
                    <input type="text" class="form-control" id="cardNumber" name="cardNumber" required>
                </div>
                <div class="form-group">
                    <label for="expiryDate">Expiry Date:</label>
                    <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YY"
                        required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV:</label>
                    <input type="text" class="form-control" id="cvv" name="cvv" required>
                </div>
                <div class="form-group">
                    <label for="cardHolderName">Card Holder Name:</label>
                    <input type="text" class="form-control" id="cardHolderName" name="cardHolderName" required>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" value="Submit" name="paymentMethod"
                        class="btn btn-primary btn-lg px-5 py-2">Book Appointment</button>
                </div>
            </form>
        </div>

        <!-- Net Banking Form -->
        <div class="container mt-5" id="netBankingFormContainer" style="display: none;">
            <h2> Fill Net Banking Details For Processing Payment</h2>
            <form id="netBankingForm" action="#" method="post" onsubmit="return validateNetBankingForm()">
                <div class="form-group">
                    <label for="netBankingId">Net Banking ID:</label>
                    <input type="text" class="form-control" id="netBankingId" name="netBankingId" required>
                </div>
                <div class="form-group">
                    <label for="accountHolderName">Account Holder Name:</label>
                    <input type="text" class="form-control" id="accountHolderName" name="accountHolderName" required>
                </div>
                <div class="form-group">
                    <label for="bankName">Bank Name:</label>
                    <input type="text" class="form-control" id="bankName" name="bankName" required>
                </div>
                <!-- Add more Net Banking form fields as needed -->
                <div class="text-center mt-3">
                    <button type="submit" value="Submit" name="paymentMethod"
                        class="btn btn-primary btn-lg px-5 py-2">Book Appointment</button>
                </div>
            </form>
        </div>

        <!-- UPI Form -->
        <div class="container mt-5" id="upiFormContainer" style="display: none;">
            <h2> Fill UPI Details For Processing Payment</h2>
            <form id="upiForm" action="#" method="post" onsubmit="return validateUPIForm()">
                <div class="form-group">
                    <label for="upiId">UPI ID:</label>
                    <input type="text" class="form-control" id="upiId" name="upiId" required>
                </div>
                <div class="form-group">
                    <label for="upiPin">UPI PIN:</label>
                    <input type="password" class="form-control" id="upiPin" name="upiPin" required>
                </div>
                <div class="form-group">
                    <label for="mobileNumber">Mobile Number Linked to UPI:</label>
                    <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" required>
                </div>
                <!-- Add more UPI form fields as needed -->
                <div class="text-center mt-3">
                    <button type="submit" value="Submit" name="paymentMethod"
                        class="btn btn-primary btn-lg px-5 py-2">Book Appointment</button>
                </div>
            </form>
        </div>

        <!-- Bank Transfer Form -->
        <div class="container mt-5" id="bankTransferFormContainer" style="display: none;">
            <h2> Fill Bank Transfer Details For Processing Payment</h2>
            <form id="bankTransferForm" action="#" method="post" onsubmit="return validateBankTransferForm()">
                <div class="form-group">
                    <label for="bankAccount">Bank Account Number:</label>
                    <input type="text" class="form-control" id="bankAccount" name="bankAccount" required>
                </div>
                <div class="form-group">
                    <label for="accountHolderName">Account Holder Name:</label>
                    <input type="text" class="form-control" id="accountHolderName" name="accountHolderName" required>
                </div>
                <div class="form-group">
                    <label for="bankName">Bank Name:</label>
                    <input type="text" class="form-control" id="bankName" name="bankName" required>
                </div>
                <div class="form-group">
                    <label for="branch">Branch:</label>
                    <input type="text" class="form-control" id="branch" name="branch" required>
                </div>
                <div class="form-group">
                    <label for="ifscCode">IFSC Code:</label>
                    <input type="text" class="form-control" id="ifscCode" name="ifscCode" required>
                </div>
                <!-- Add more Bank Transfer form fields as needed -->
                <div class="text-center mt-3">
                    <button type="submit" value="Submit" name="paymentMethod"
                        class="btn btn-primary btn-lg px-5 py-2">Book Appointment</button>
                </div>
            </form>
        </div>

    </div>

    <script>
    

        function validateCardForm() {
            const cardNumber = document.getElementById('cardNumber').value;
            const expiryDate = document.getElementById('expiryDate').value;
            const cvv = document.getElementById('cvv').value;
            const cardHolderName = document.getElementById('cardHolderName').value;

            if (!cardNumber || !expiryDate || !cvv || !cardHolderName) {
                swal({
                    title: 'Error!',
                    text: 'Please fill in all fields for Card Payment.',
                    icon: 'error',
                    button: 'OK',
                });
                return false;
            }

            // Validate card number (simplified example)
            const cardNumberRegex = /^\d{16}$/;
            if (!cardNumberRegex.test(cardNumber)) {
                swal({
                    title: 'Error!',
                    text: 'Invalid card number. Please enter a 16-digit card number.',
                    icon: 'error',
                    button: 'OK',
                });
                return false;
            }

            // Validate expiry date (simplified example)
            const expiryDateRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;
            if (!expiryDateRegex.test(expiryDate)) {
                swal({
                    title: 'Error!',
                    text: 'Invalid expiry date. Please enter a valid MM/YY format.',
                    icon: 'error',
                    button: 'OK',
                });
                return false;
            }

            // Validate CVV (simplified example)
            const cvvRegex = /^\d{3}$/;
            if (!cvvRegex.test(cvv)) {
                swal({
                    title: 'Error!',
                    text: 'Invalid CVV. Please enter a 3-digit CVV.',
                    icon: 'error',
                    button: 'OK',
                });
                return false;
            }

            // Validate cardholder name (simplified example)
            if (cardHolderName.length < 3) {
                swal({
                    title: 'Error!',
                    text: 'Cardholder name is too short. Please enter a valid name.',
                    icon: 'error',
                    button: 'OK',
                });
                return false;
            }


            // Simulate a successful booking
            swal({
                title: 'Success!',
                text: 'Appointment booked successfully.',
                icon: 'success',
                buttons: {
                    confirm: {
                        text: 'Download Invoice',
                        value: true,
                        visible: true,
                        className: 'btn-success',
                    }
                },
            }).then(function () {
                window.location.href = 'invoice.php';
            });

            return true; // Prevent form submission
        }


        function validateNetBankingForm() {
            const netBankingId = document.getElementById('netBankingId').value;
            const accountHolderName = document.getElementById('accountHolderName').value;
            const bankName = document.getElementById('bankName').value;

            if (!netBankingId || !accountHolderName || !bankName) {
                swal({
                    title: 'Error!',
                    text: 'Please fill in all fields for Net Banking.',
                    icon: 'error',
                    button: 'OK',
                });
                return false;
            }

            // Validate net banking ID (simplified example)
            if (netBankingId.length < 6) {
                swal({
                    title: 'Error!',
                    text: 'Net Banking ID is too short. Please enter a valid ID.',
                    icon: 'error',
                    button: 'OK',
                });
                return false;
            }

            // Validate account holder name (simplified example)
            if (accountHolderName.length < 3) {
                swal({
                    title: 'Error!',
                    text: 'Account holder name is too short. Please enter a valid name.',
                    icon: 'error',
                    button: 'OK',
                });
                return false;
            }

            // Validate bank name (simplified example)
            if (bankName.length < 3) {
                swal({
                    title: 'Error!',
                    text: 'Bank name is too short. Please enter a valid name.',
                    icon: 'error',
                    button: 'OK',
                });
                return false;
            }

            // ... Additional validations as needed

            // Simulate a successful booking
            swal({
                title: 'Success!',
                text: 'Appointment booked successfully.',
                icon: 'success',
                buttons: {
                    confirm: {
                        text: 'Download Invoice',
                        value: true,
                        visible: true,
                        className: 'btn-success',
                    }
                },
            }).then( function () {
                window.location.href = 'invoice.php';
            });

            return true; // Prevent form submission
        }


        function validateUPIForm() {
            const upiId = document.getElementById('upiId').value;
            const upiPin = document.getElementById('upiPin').value;
            const mobileNumber = document.getElementById('mobileNumber').value;

            if (!upiId || !upiPin || !mobileNumber) {
                swal({
                    title: 'Error!',
                    text: 'Please fill in all fields for UPI.',
                    icon: 'error',
                    button: 'OK',
                });
                return false;
            }

            // Validate UPI ID (simplified example)
            if (upiId.length < 6) {
                swal({
                    title: 'Error!',
                    text: 'UPI ID is too short. Please enter a valid ID.',
                    icon: 'error',
                    button: 'OK',
                });
                return false;
            }

            // Validate UPI PIN (simplified example)
            const upiPinRegex = /^\d{4}$/;
            if (!upiPinRegex.test(upiPin)) {
                swal({
                    title: 'Error!',
                    text: 'Invalid UPI PIN. Please enter a 4-digit PIN.',
                    icon: 'error',
                    button: 'OK',
                });
                return false;
            }

            // Validate mobile number (simplified example)
            const mobileNumberRegex = /^\d{10}$/;
            if (!mobileNumberRegex.test(mobileNumber)) {
                swal({
                    title: 'Error!',
                    text: 'Invalid mobile number. Please enter a 10-digit number.',
                    icon: 'error',
                    button: 'OK',
                });
                return false;
            }

            // ... Additional validations as needed

            // Simulate a successful booking
            swal({
                title: 'Success!',
                text: 'Appointment booked successfully.',
                icon: 'success',
                buttons: {
                    confirm: {
                        text: 'Download Invoice',
                        value: true,
                        visible: true,
                        className: 'btn-success',
                    }
                },
            }).then (function () {
                window.location.href = 'invoice.php';
            });

            return true; // Prevent form submission
        }


        function validateBankTransferForm() {
            const bankAccount = document.getElementById('bankAccount').value;
            const accountHolderName = document.getElementById('accountHolderName').value;
            const bankName = document.getElementById('bankName').value;
            const branch = document.getElementById('branch').value;
            const ifscCode = document.getElementById('ifscCode').value;

            let errorMessages = [];

            if (!bankAccount) {
                errorMessages.push('Bank account number is required.');
            } else if (bankAccount.length < 8) {
                errorMessages.push('Bank account number is too short. Please enter a valid number.');
            }

            if (!accountHolderName || accountHolderName.length < 3) {
                errorMessages.push('Account holder name is too short. Please enter a valid name.');
            }

            if (!bankName || bankName.length < 3) {
                errorMessages.push('Bank name is too short. Please enter a valid name.');
            }

            if (!branch || branch.length < 3) {
                errorMessages.push('Branch name is too short. Please enter a valid name.');
            }

            const ifscCodeRegex = /^[A-Za-z]{4}\d{7}$/;
            if (!ifscCodeRegex.test(ifscCode)) {
                errorMessages.push('Invalid IFSC code. Please enter a valid code.');
            }

            if (errorMessages.length > 0) {
                // Display all error messages
                swal({
                    title: 'Error!',
                    text: errorMessages.join('\n'),
                    icon: 'error',
                    button: 'OK',
                });
                return false;
            }

            // Simulate a successful booking
            // Simulate a successful booking
            swal({
                title: 'Success!',
                text: 'Appointment booked successfully.',
                icon: 'success',
                buttons: {
                    confirm: {
                        text: 'Download Invoice',
                        value: true,
                        visible: true,
                        className: 'btn-success',
                    }
                },
            }).then(function (value) {
                if (value) {
                    // Create a temporary anchor element
                    var link = document.createElement('a');
                    // Set the href attribute to the URL of the invoice.php file
                    link.href = 'invoice.php?crid=<?php echo $crid; ?>';
                    // Set the download attribute to force download
                    link.download = 'invoice.php';
                    // Programmatically click the anchor element to trigger the download
                    link.click();
                }
            });


            return true; // Prevent form submission     }
    </script>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>



<?php
include('./include/db.php');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['paymentMethod'])) {
    $method = $_POST['paymentMethod'];
    $crid = isset($_GET['crid']) ? mysqli_real_escape_string($conn, $_GET['crid']) : '';



    // Validate form fields based on payment method
    if ($method === "cardpayment") {
        $cardNumber = $_POST['cardNumber'];
        $expiryDate = $_POST['expiryDate'];
        $cvv = $_POST['cvv'];
        $cardHolderName = $_POST['cardHolderName'];

        // Validate card number (simplified example)
        $cardNumberRegex = '/^\d{16}$/';
        if (!preg_match($cardNumberRegex, $cardNumber)) {
            echo '<script>';
            echo 'alert("Invalid card number. Please enter a 16-digit card number.");';
            echo 'window.location.href = "error.php";';
            echo '</script>';
            exit();
        }

        // Validate expiry date (simplified example)
        $expiryDateRegex = '/^(0[1-9]|1[0-2])\/\d{2}$/';
        if (!preg_match($expiryDateRegex, $expiryDate)) {
            echo '<script>';
            echo 'alert("Invalid expiry date. Please enter a valid MM/YY format.");';
            echo 'window.location.href = "error.php";';
            echo '</script>';
            exit();
        }

        // Validate CVV (simplified example)
        $cvvRegex = '/^\d{3}$/';
        if (!preg_match($cvvRegex, $cvv)) {
            echo '<script>';
            echo 'alert("Invalid CVV. Please enter a 3-digit CVV.");';
            echo 'window.location.href = "error.php";';
            echo '</script>';
            exit();
        }

        // Validate cardholder name (simplified example)
        if (strlen($cardHolderName) < 3) {
            echo '<script>';
            echo 'alert("Cardholder name is too short. Please enter a valid name.");';
            echo 'window.location.href = "error.php";';
            echo '</script>';
            exit();
        }
    } elseif ($method === "netbanking") {
        $netBankingId = $_POST['netBankingId'];
        $accountHolderName = $_POST['accountHolderName'];
        $bankName = $_POST['bankName'];


        // Validate net banking ID (simplified example)
        if (empty($netBankingId) || strlen($netBankingId) < 6) {
            echo '<script>';
            echo 'alert("Net Banking ID is required and must be at least 6 characters.");';
            echo 'window.location.href = "error.php";';
            echo '</script>';
            exit();
        }

        // Validate account holder name (simplified example)
        if (empty($accountHolderName) || strlen($accountHolderName) < 3) {
            echo '<script>';
            echo 'alert("Account holder name is required and must be at least 3 characters.");';
            echo 'window.location.href = "error.php";';
            echo '</script>';
            exit();
        }

        // Validate bank name (simplified example)
        if (empty($bankName) || strlen($bankName) < 3) {
            echo '<script>';
            echo 'alert("Bank name is required and must be at least 3 characters.");';
            echo 'window.location.href = "error.php";';
            echo '</script>';
            exit();
        }
    } elseif ($method === "upi") {
        $upiId = $_POST['upiId'];
        $upiPin = $_POST['upiPin'];
        $mobileNumber = $_POST['mobileNumber'];


        // Validate UPI ID (simplified example)
        if (empty($upiId) || strlen($upiId) < 6) {
            echo '<script>';
            echo 'alert("UPI ID is required and must be at least 6 characters.");';
            echo 'window.location.href = "error.php";';
            echo '</script>';
            exit();
        }

        // Validate UPI PIN (simplified example)
        $upiPinRegex = '/^\d{4}$/';
        if (!preg_match($upiPinRegex, $upiPin)) {
            echo '<script>';
            echo 'alert("Invalid UPI PIN. Please enter a 4-digit PIN.");';
            echo 'window.location.href = "error.php";';
            echo '</script>';
            exit();
        }

        // Validate mobile number (simplified example)
        $mobileNumberRegex = '/^\d{10}$/';
        if (!preg_match($mobileNumberRegex, $mobileNumber)) {
            echo '<script>';
            echo 'alert("Invalid mobile number. Please enter a 10-digit number.");';
            echo 'window.location.href = "error.php";';
            echo '</script>';
            exit();
        }
    } elseif ($method === "banktransfer") {
        // Your Bank Transfer validation logic here
        $bankAccount = $_POST['bankAccount'];
        $accountHolderName = $_POST['accountHolderName'];
        $bankName = $_POST['bankName'];
        $branch = $_POST['branch'];
        $ifscCode = $_POST['ifscCode'];

        // Validate bank account number
        if (empty($bankAccount) || strlen($bankAccount) < 8) {
            echo '<script>';
            echo 'alert("Bank account number is required and must be at least 8 characters.");';
            echo 'window.location.href = "error.php";';
            echo '</script>';
            exit();
        }

        // Validate account holder name
        if (empty($accountHolderName) || strlen($accountHolderName) < 3) {
            echo '<script>';
            echo 'alert("Account holder name is required and must be at least 3 characters.");';
            echo 'window.location.href = "error.php";';
            echo '</script>';
            exit();
        }

        // Validate bank name
        if (empty($bankName) || strlen($bankName) < 3) {
            echo '<script>';
            echo 'alert("Bank name is required and must be at least 3 characters.");';
            echo 'window.location.href = "error.php";';
            echo '</script>';
            exit();
        }

        // Validate branch name
        if (empty($branch) || strlen($branch) < 3) {
            echo '<script>';
            echo 'alert("Branch name is required and must be at least 3 characters.");';
            echo 'window.location.href = "error.php";';
            echo '</script>';
            exit();
        }

        // Validate IFSC code
        $ifscCodeRegex = '/^[A-Za-z]{4}\d{7}$/';
        if (!preg_match($ifscCodeRegex, $ifscCode)) {
            echo '<script>';
            echo 'alert("Invalid IFSC code. Please enter a valid code.");';
            echo 'window.location.href = "error.php";';
            echo '</script>';
            exit();
        }
    }

    // Common code for updating the database based on $method and $bookid
    $dummyPaymentId = uniqid();
    $payment = 1 ;
    $query = "UPDATE `courseregistration` SET `payment`='$payment', `paymentid` = '$dummyPaymentId' WHERE `crid` ='$crid'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
            swal({
                title: 'Booking Done Successfully!',
                text: 'Appointment booked successfully with payment ID: $dummyPaymentId 👍🏻 ',
                icon: 'success',
                buttons: {
                    confirm: {
                        text: 'Download Invoice',
                        value: true,
                        visible: true,
                        className: 'btn-success',
                    }
                },
            }).then(function (value) {
                if (value) {
                    // Redirect to invoice.php with bookid parameter
                    window.location.href = 'courseinvoice.php?crid=$crid';
                }
            });
        </script>";
    } else {
        echo "<script>
            swal({
                title: 'Failed!',
                text: 'Booking Appointment Failed. Please Try Again',
                icon: 'error',
                button: 'Try Again',
            }).then(function() {
                window.location.href ='courseinvoice.php?crid=$crid';
            });
        </script>";
    }
} else {
    echo 'Invalid request';
    exit();
}
?>
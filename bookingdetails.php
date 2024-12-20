<?php
// Include database connection
include('db.php');
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have processed form data and stored it in variables
    $serviceName = isset($_SESSION['selected_service_details']['id']) ? $_SESSION['selected_service_details']['id'] : null;
    $barberName = isset($_SESSION['selected_barber_details']['id']) ? $_SESSION['selected_barber_details']['id'] : null;
    $selectedDate = isset($_SESSION['selected_date']) ? $_SESSION['selected_date'] : null;
    $selectedTimeSlot = isset($_SESSION['selected_time_slot']) ? $_SESSION['selected_time_slot'] : null;
    $customerName = $_POST['name'] ?? null; // Assuming the form field name is 'name'
    $customerPhone = $_POST['phone'] ?? null; // Assuming the form field name is 'phone'


    // After retrieving session variables
    echo "serviceName: " . $serviceName . "<br>";
    echo "barberName: " . $barberName . "<br>";
    echo "selectedDate: " . $selectedDate . "<br>";
    echo "selectedTimeSlot: " . $selectedTimeSlot . "<br>";
    echo "customerName: " . $customerName . "<br>";
    echo "customerPhone: " . $customerPhone . "<br>";


    // Check if all necessary data is available
    if ($serviceName !== null && $barberName !== null && $selectedDate !== null && $selectedTimeSlot !== null && $customerName !== null && $customerPhone !== null) {
        // Insert data into the database
        echo "SQL Query: " . $stmt->queryString . "<br>";

        $stmt = $conn->prepare("INSERT INTO bookings (service_id_column, barber_id_column, selected_date_column, selected_time_slot_column, customer_name_column, customer_phone_column) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $serviceName, $barberName, $selectedDate, $selectedTimeSlot, $customerName, $customerPhone);


        if ($stmt->execute()) {
            // Data inserted successfully
            header("Location: invoice.php");
            exit();
        } else {
            // Log the error to a file
            file_put_contents('error_log.txt', "Error: " . $stmt->error, FILE_APPEND);

            // Display a generic error message
            header("Location: failure.php");
            exit();
        }
    } else {
        // Redirect to a failure page if data is missing
        header("Location: failure.php");
        exit();
    }
} else {
    // Redirect to a failure page if the form was not submitted properly
    header("Location: failure.php");
    exit();
}

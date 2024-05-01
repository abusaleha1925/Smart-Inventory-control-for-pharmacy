<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $medicine_id = $_POST['medicine_id'];
    $medicine_name = $_POST['medicine_name'];
    $purchase_date = $_POST['purchase_date'];
    $expiry_date = $_POST['expiry_date'];
    $available_quantity = $_POST['available_quantity'];
    $medicine_price = $_POST['medicine_price'];

    // Check if expiry date is greater than purchase date
    if (strtotime($expiry_date) <= strtotime($purchase_date)) {
        echo "<script>alert('Expiry date should be greater than purchase date');</script>";
        exit; // Stop further execution
    }

    // Database connection
    $conn = new mysqli('localhost', 'system', '', 'medical');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if medicine_id already exists
    $check_sql = "SELECT * FROM medicines WHERE medicine_id = '$medicine_id'";
    $check_result = $conn->query($check_sql);
    if ($check_result->num_rows > 0) {
        echo "<script>alert('Medicine ID already exists. Please enter a unique medicine ID.');</script>";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO medicines (medicine_id, medicine_name, purchase_date, expiry_date, available_quantity, medicine_price) VALUES ('$medicine_id', '$medicine_name', '$purchase_date', '$expiry_date', '$available_quantity', '$medicine_price')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Medicine added successfully');</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "\\n" . $conn->error . "');</script>";
        }
    }

    $conn->close();
}
?>

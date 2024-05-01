<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $medicine_id = $_POST['medicine_id'];
    $medicine_price = $_POST['medicine_price'];
    $available_quantity = $_POST['available_quantity'];

    // Database connection
    $conn = new mysqli('localhost', 'system', '', 'medical');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if medicine ID exists
    $check_sql = "SELECT * FROM medicines WHERE medicine_id = '$medicine_id'";
    $check_result = $conn->query($check_sql);
    if ($check_result->num_rows > 0) {
        // Update data in the database
        $sql = "UPDATE medicines SET medicine_price='$medicine_price', available_quantity='$available_quantity' WHERE medicine_id='$medicine_id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Medicine updated successfully')</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "<script>alert('Medicine ID does not exist. Please enter a valid medicine ID.');</script>";
    }

    $conn->close();
}
?>

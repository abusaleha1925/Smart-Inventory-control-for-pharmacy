<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .sidebar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(to bottom, #33ccff 0%, #ffffff 100%);
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 25px;
            font-family: "Kanit", sans-serif;
             font-weight: 700;
            font-style: normal;
            color: black;
            display: block;
            text-align: left;
            position: relative;
            top: 5%;

        }

        .sidebar a:hover {
            background-color: whitesmoke;
        }

        .content {
            margin-left: 200px;
            padding: 20px;
        }

        .header {
            background-color: #0055cc;
            color: #fff;
            padding: 0px;
            text-align: center;
            font-size: 45px;
            font-family: "Kanit", sans-serif;
             font-weight: 600;
            font-style: normal;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: blue;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color:#a9d2ff ;
        }
        tr:nth-child(odd){
            background-color: white;
        }

        .navbar {
            background-color: #66b3ff;
            font-size: 30px;
            color: #fff;
            display: block;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .navbar a {
            color: black;
            text-decoration: none;
            display: inline-block;
            padding: 10px 15px;
            text-align: center;
            font-size: 22px;
            font-family: "Kanit", sans-serif;
             font-weight: 700;
            font-style: normal;
        }

        .navbar a:hover {
            background-color:whitesmoke;
        }
        .staff-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .staff-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .staff-form input[type="text"],
        .staff-form input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .staff-form input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .staff-form input[type="submit"]:hover {
            background-color: #45a049;
        }
        .medicine-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .medicine-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .medicine-form input[type="text"],
        .medicine-form input[type="number"],
        .medicine-form input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .medicine-form input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .medicine-form input[type="submit"]:hover {
            background-color: #45a049;
        }
        .sidebar img{
            width:120px;
            position: relative;
            left:9%;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <img src="./pharmacy.png" alt="logo">
    <a href="?page=admin"><i class="fas fa-user"></i> Admin</a>
    <a href="?page=medicines"><i class="fas fa-pills"></i> Medicines</a>
    <a href="?page=staff"><i class="fas fa-users"></i> Staff</a>
    <a href="?page=settings"><i class="fas fa-cogs"></i>Settings</a>
    <a href="?page=support"><i class="fas fa-question-circle"></i> Support and Help</a>
</div>



    <div class="content">
        <div class="header">
            Dashboard
        </div>
        <?php
        // Check which page to display
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'medicines':
                    echo "<div class='navbar'>";
                    echo "<a href='?page=medicines&subpage=available'>Available Medicines</a>";
                    echo "<a href='?page=medicines&subpage=expired'>Expired Date Medicines</a>";
                    echo "<a href='?page=medicines&subpage=lowquantity'>Low Stock Medicines</a>";
                    echo "<a href='?page=medicines&subpage=zeroquantity'>Out of Stock</a>";
                    echo "</div>";
                    
                    // Include medicines management content here based on subpage
                    if (isset($_GET['subpage'])) {
                        $subpage = $_GET['subpage'];
                        switch ($subpage) {
                            case 'available':
                                echo "<center><h2>Available Medicines</h2></center>";
                                // Fetch data from database and display in table format
                                $conn = new mysqli('localhost', 'system', '', 'medical');
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT * FROM medicines WHERE available_quantity > 0";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    echo "<table>";
                                    echo "<tr><th>Medicine ID</th><th>Medicine Name</th><th>Available Quantity</th></tr>";
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['medicine_id'] . "</td>";
                                        echo "<td>" . $row['medicine_name'] . "</td>";
                                        echo "<td>" . $row['available_quantity'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "No available medicines";
                                }

                                $conn->close();
                                break;
                                case 'expired':
                                    echo "<center><h2>Expired Medicines</h2></center>";
                                    // Fetch data from database for expired medicines
                                    $conn = new mysqli('localhost', 'system', '', 'medical');
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                
                                    $today_date = date("Y-m-d");
                                    $sql = "SELECT medicine_id, medicine_name, expiry_date FROM medicines WHERE expiry_date < '$today_date'";
                                    $result = $conn->query($sql);
                                
                                    if ($result->num_rows > 0) {
                                        echo "<table>";
                                        echo "<tr><th>Medicine ID</th><th>Medicine Name</th><th>Expiry Date</th></tr>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['medicine_id'] . "</td>";
                                            echo "<td>" . $row['medicine_name'] . "</td>";
                                            echo "<td>" . $row['expiry_date'] . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    } else {
                                        echo "No expired medicines";
                                    }
                                
                                    $conn->close();
                                    break;
                                
                                case 'lowquantity':
                                    echo "<center><h2>Low Stock Medicines</h2></center>";
                                    // Fetch data from database for medicines with quantity below 5
                                    $conn = new mysqli('localhost', 'system', '', 'medical');
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                
                                    $sql = "SELECT medicine_id, medicine_name, available_quantity, supplier_name FROM medicines WHERE available_quantity < 10";
                                    $result = $conn->query($sql);
                                
                                    if ($result->num_rows > 0) {
                                        echo "<table>";
                                        echo "<tr><th>Medicine ID</th><th>Medicine Name</th><th>Available Quantity</th><th>Supplier Name</th></tr>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['medicine_id'] . "</td>";
                                            echo "<td>" . $row['medicine_name'] . "</td>";
                                            echo "<td>" . $row['available_quantity'] . "</td>";
                                            echo "<td>" . $row['supplier_name'] . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    } else {
                                        echo "<script>alert('No medicines with low quantity')</script>";
                                    }
                                
                                    $conn->close();
                                    break;
                                
                                case 'zeroquantity':
                                    echo "<center><h2>Zero Quantity Medicines</h2></center>";
                                    // Fetch data from database for medicines with zero quantity
                                    $conn = new mysqli('localhost', 'system', '', 'medical');
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                
                                    $sql = "SELECT medicine_id, medicine_name, supplier_name FROM medicines WHERE available_quantity = 0";
                                    $result = $conn->query($sql);
                                
                                    if ($result->num_rows > 0) {
                                        echo "<table>";
                                        echo "<tr><th>Medicine ID</th><th>Medicine Name</th><th>Supplier Name</th></tr>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['medicine_id'] . "</td>";
                                            echo "<td>" . $row['medicine_name'] . "</td>";
                                            echo "<td>" . $row['supplier_name'] . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    } else {
                                        echo "<script>alert('No medicines with zero quantity')</script>";
                                    }
                                
                                    $conn->close();
                                break;
                            default:
                                echo "<h2></h2>";
                                break;
                        }
                    } else {
                        echo "<h2></h2>";
                    }
                    break;
            
                    
                case 'staff':
                    echo "<div class='navbar'>";
                    echo "<a href='?page=staff&subpage=available'>Available Staff</a>";
                    echo "<a href='?page=staff&subpage=add'>Add New Staff</a>";
                    echo "</div>";

                    // Include staff management content here based on subpage
                    if (isset($_GET['subpage'])) {
                        $subpage = $_GET['subpage'];
                        switch ($subpage) {
                            case 'available':
                                // Display available staff
                                    if ($subpage === 'available') {
                                        // Fetch available staff data from the database
                                        $conn = new mysqli('localhost', 'system', '', 'medical');
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $sql = "SELECT staff_id, staff_name FROM staff";
                                        $result = $conn->query($sql);
                                
                                        if ($result->num_rows > 0) {
                                            // Display staff data in a table
                                            echo "<center><h2>Available Staff</h2></center>";
                                            echo "<table>";
                                            echo "<tr><th>Staff ID</th><th>Staff Name</th></tr>";
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['staff_id'] . "</td>";
                                                echo "<td>" . $row['staff_name'] . "</td>";
                                                echo "</tr>";
                                            }
                                            echo "</table>";
                                        } else {
                                            echo "No available staff";
                                        }
                                        $conn->close();
                                    }
                                    break;
                                
                                    case 'add':
                                        echo "<center><h2>Add New Staff</h2></center>";
                                        echo "<form method='POST' action='' class='staff-form'>";
                                        echo "<label for='staff_id'>Staff ID:</label>";
                                        echo "<input type='text' id='staff_id' name='staff_id'><br>";
                                        echo "<label for='staff_name'>Staff Name:</label>";
                                        echo "<input type='text' id='staff_name' name='staff_name'><br>";
                                        echo "<label for='date_of_birth'>Date of Birth:</label>";
                                        echo "<input type='date' id='date_of_birth' name='date_of_birth'><br>";
                                        //echo "<label for='joining_date'>Joining Date:</label>";
                                        //echo "<input type='date' id='joining_date' name='joining_date'><br>";
                                        echo "<label for='phone_number'>Phone Number:</label>";
                                        echo "<input type='text' id='phone_number' name='phone_number'><br>";
                                        echo "<input type='submit' value='Add Staff'>";
                                        echo "</form>";
                                    
                                        // Processing form submission
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            $staff_id = $_POST['staff_id'];
                                            $staff_name = $_POST['staff_name'];
                                            $date_of_birth = $_POST['date_of_birth'];
                                            $phone_number = $_POST['phone_number'];
                                    
                                            // Perform input validation
                                            if (empty($staff_id) || empty($staff_name) || empty($date_of_birth) || empty($phone_number)) {
                                                echo "All fields are required.";
                                            } elseif (strlen($phone_number) != 10 || !ctype_digit($phone_number)) {
                                                echo "Phone number must be exactly 10 digits long and contain only digits.";
                                            } else {
                                                // Database connection
                                                $conn = new mysqli('localhost', 'system', '', 'medical');
                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }
                                    
                                                // Check if staff ID is unique
                                                $check_sql = "SELECT * FROM staff WHERE staff_id='$staff_id'";
                                                $check_result = $conn->query($check_sql);
                                                if ($check_result->num_rows > 0) {
                                                    echo "Staff ID already exists. Please choose a different one.";
                                                } else {
                                                    // Calculate age
                                                    $current_date = new DateTime();
                                                    $birth_date = new DateTime($date_of_birth);
                                                    $age = $birth_date->diff($current_date)->y;
                                    
                                                    // Validate age
                                                    if ($age < 18) {
                                                        echo "<script>alert('Staff must be at least 18 years old.')</script>";
                                                    } else {
                                                        // Insert data into the database
                                                        $insert_sql = "INSERT INTO staff (staff_id, staff_name, date_of_birth, phone_number) VALUES ('$staff_id', '$staff_name', '$date_of_birth', '$phone_number')";
                                    
                                                        if ($conn->query($insert_sql) === TRUE) {
                                                            echo "<script>alert('New staff added successfully')</script>";
                                                        } else {
                                                            echo "Error: " . $insert_sql . "<br>" . $conn->error;
                                                        }
                                                    }
                                                }
                                    
                                                $conn->close();
                                            }
                                        }
                                        break;
                                    }                                    
                    } else {
                        echo "<h2></h2>";
                    }
                    break;
                    case 'support':
                        echo "<h2>Contact for Help</h2>";
                        echo "<p><b>Name: MD Abu Saleha</b></p>";
                        echo "<p>Number: +91 8095098890</p>";
                        echo "<p>Email: abusaleha1925@gmail.com</p>";
                        echo "<br><br>";
                        echo "<p><b>Name: Manish TP</b></p>";
                        echo "<p>Number: +91 8985674212</p>";
                        echo "<p>Email: manishjain@gmail.com</p>";
                        break;

                    case 'admin':
                        echo "<div class='navbar'>";
                        echo "<a href='?page=admin&subpage=add'>Add Medicines</a>";
                        echo "<a href='?page=admin&subpage=update'>Update Medicines</a>";
                        echo "</div>";
                    
                        // Add Medicine Form
                        if (isset($_GET['subpage']) && $_GET['subpage'] == 'add') {
                            echo "<h2>Add Medicine</h2>";
                            echo "<form method='POST' action='' class='medicine-form'>";
                            echo "<label for='medicine_id'>Medicine ID:</label>";
                            echo "<input type='text' id='medicine_id' name='medicine_id'><br>";
                            echo "<label for='medicine_name'>Medicine Name:</label>";
                            echo "<input type='text' id='medicine_name' name='medicine_name'><br>";
                            echo "<label for='available_quantity'>Available Quantity:</label>";
                            echo "<input type='number' id='available_quantity' name='available_quantity'><br>";
                            echo "<label for='price'>Price:</label>";
                            echo "<input type='number' id='price' name='price'><br>";
                            echo "<label for='purchase_date'>Purchase Date:</label>";
                            echo "<input type='date' id='purchase_date' name='purchase_date'><br>";
                            echo "<label for='expiry_date'>Expiry Date:</label>";
                            echo "<input type='date' id='expiry_date' name='expiry_date'><br>";
                            echo "<label for='supplier_name'>Supplier Name:</label>";
                            echo "<input type='text' id='supplier_name' name='supplier_name'><br>";
                            echo "<input type='submit' value='Add Medicine'>";
                            echo "</form>";
                    
                            // Processing form submission
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $medicine_id = $_POST['medicine_id'];
                                $medicine_name = $_POST['medicine_name'];
                                $available_quantity = $_POST['available_quantity'];
                                $price = $_POST['price'];
                                $purchase_date = $_POST['purchase_date'];
                                $expiry_date = $_POST['expiry_date'];
                                $supplier_name = $_POST['supplier_name'];
                    
                                // Perform input validation
                                if (empty($medicine_id) || empty($medicine_name) || empty($available_quantity) || empty($price) || empty($purchase_date) || empty($expiry_date) || empty($supplier_name)) {
                                    echo "<script>alert('All fields are required')</script>";
                                } else {
                                    // Database connection
                                    $conn = new mysqli('localhost', 'system', '', 'medical');
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                    
                                    // Check if medicine ID is unique
                                    $check_sql = "SELECT * FROM medicines WHERE medicine_id='$medicine_id'";
                                    $check_result = $conn->query($check_sql);
                                    if ($check_result->num_rows > 0) {
                                        echo "<script>alert('Medicine ID already exists. Please choose a different one.')</script>";
                                    } else {
                                        // Validate expiry date
                                        if (strtotime($expiry_date) <= strtotime($purchase_date)) {
                                            echo "<script>alert('Expiry date should be greater than purchase date');</script>";
                                        } else {
                                            // Insert data into the database
                                            $insert_sql = "INSERT INTO medicines (medicine_id, medicine_name, available_quantity, price, purchase_date, expiry_date, supplier_name) VALUES ('$medicine_id', '$medicine_name', '$available_quantity', '$price', '$purchase_date', '$expiry_date', '$supplier_name')";
                    
                                            if ($conn->query($insert_sql) === TRUE) {
                                                echo "<script>alert('New medicine added successfully')</script>";
                                            } else {
                                                echo "Error: " . $insert_sql . "<br>" . $conn->error;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                     // Update Medicine Form
                     if (isset($_GET['subpage']) && $_GET['subpage'] == 'update') {
                        echo "<h2>Update Medicine</h2>";
                        echo "<form method='POST' action='' class='medicine-form'>";
                        echo "<label for='medicine_id_update'>Medicine ID:</label>";
                        echo "<input type='text' id='medicine_id_update' name='medicine_id_update'><br>";
                        echo "<label for='available_quantity_update'>Available Quantity to Add:</label>";
                        echo "<input type='number' id='available_quantity_update' name='available_quantity_update'><br>";
                        echo "<label for='price_update'>Price:</label>";
                        echo "<input type='number' id='price_update' name='price_update'><br>";
                        echo "<input type='submit' value='Update Medicine'>";
                        echo "</form>";
                
                        // Processing form submission
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $medicine_id_update = $_POST['medicine_id_update'];
                            $available_quantity_update = $_POST['available_quantity_update'];
                            $price_update = $_POST['price_update'];
                
                            // Perform input validation
                            if (empty($medicine_id_update) || empty($available_quantity_update) || empty($price_update)) {
                                echo "<script>alert('All fields are required')</script>";
                            } else {
                                // Database connection
                                $conn = new mysqli('localhost', 'system', '', 'medical');
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                
                                // Check if medicine ID exists
                                $check_sql = "SELECT * FROM medicines WHERE medicine_id='$medicine_id_update'";
                                $check_result = $conn->query($check_sql);
                                if ($check_result->num_rows == 0) {
                                    echo "<script>alert('Medicine ID not found.')</script>";
                                } else {
                                    // Update available quantity and price
                                    $update_sql = "UPDATE medicines SET available_quantity = available_quantity + '$available_quantity_update', price = '$price_update' WHERE medicine_id = '$medicine_id_update'";
                
                                    if ($conn->query($update_sql) === TRUE) {
                                        echo "<script>alert('Medicine updated successfully')</script>";
                                    } else {
                                        echo "Error: " . $update_sql . "<br>" . $conn->error;
                                    }
                                }
                
                                $conn->close();
                            }
                        }
                    }
                    break;        
                    case 'settings':
                        echo "<div class='navbar'>";
                        echo "<a href='?page=staff&subpage=user'>Change Username</a>";
                        echo "<a href='?page=staff&subpage=pass'>Change Password</a>";
                        echo "</div>";    
                     
                default:
                    echo "<h2></h2>";
                    break;
            }
        } else {
            echo "<h2></h2>";
        }
        ?>
    </div>
</body>
</html>


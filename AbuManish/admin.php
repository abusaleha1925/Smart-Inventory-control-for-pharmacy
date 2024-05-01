<!DOCTYPE html>
<html>
<head>
    <title>Add Medicine</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: space-between;
        }
        .form-container {
            width: 48%; /* Adjust as needed */
        }
        form {
            width: 100%;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        input[type="text"], input[type="date"], input[type="number"] {
            width: calc(100% - 16px); /* Adjust padding */
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: calc(100% - 16px); /* Adjust padding */
            padding: 10px;
            margin-top: 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <form method="post" action="add_medicine.php">
            <h2>Add Medicine</h2>
            <label for="medicine_id">Medicine ID:</label>
            <input type="text" id="medicine_id" name="medicine_id" required>

            <label for="medicine_name">Medicine Name:</label>
            <input type="text" id="medicine_name" name="medicine_name" required>

            <label for="purchase_date">Purchase Date:</label>
            <input type="date" id="purchase_date" name="purchase_date" required>

            <label for="expiry_date">Expiry Date:</label>
            <input type="date" id="expiry_date" name="expiry_date" required>

            <label for="available_quantity">Available Quantity:</label>
            <input type="number" id="available_quantity" name="available_quantity" required>

            <label for="medicine_price">Medicine Price:</label>
            <input type="number" id="medicine_price" name="medicine_price" step="0.01" required>

            <input type="submit" value="Add Medicine">
        </form>
    </div>
    <div class="form-container">
        <form method="post" action="update_medicine.php">
            <h2>Update Medicine</h2>
            <label for="medicine_id_update">Medicine ID:</label>
            <input type="text" id="medicine_id_update" name="medicine_id" required>
            
            <label for="medicine_price_update">Medicine Price:</label>
            <input type="number" id="medicine_price_update" name="medicine_price" required>
            
            <label for="available_quantity_update">Available Quantity:</label>
            <input type="number" id="available_quantity_update" name="available_quantity" required>
            
            <input type="submit" value="Update">
        </form>
    </div>                
</div>

</body>
</html>



<div class="container">
    <div class="form-container">
        <form method="post" action="add_medicine.php">
            <h2>Add Medicine</h2>
            <label for="medicine_id">Medicine ID:</label>
            <input type="text" id="medicine_id" name="medicine_id" required>

            <label for="medicine_name">Medicine Name:</label>
            <input type="text" id="medicine_name" name="medicine_name" required>

            <label for="purchase_date">Purchase Date:</label>
            <input type="date" id="purchase_date" name="purchase_date" required>

            <label for="expiry_date">Expiry Date:</label>
            <input type="date" id="expiry_date" name="expiry_date" required>

            <label for="available_quantity">Available Quantity:</label>
            <input type="number" id="available_quantity" name="available_quantity" required>

            <label for="medicine_price">Medicine Price:</label>
            <input type="number" id="medicine_price" name="medicine_price" step="0.01" required>

            <input type="submit" value="Add Medicine">
        </form>
    </div>

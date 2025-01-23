<?php
require 'connection/conn.php';

// Function to display orders table
function displayOrdersTable($result, $columns) {
    if ($result->num_rows > 0) {
        echo '<table class="table table-striped">';
        echo '<thead><tr>';
        foreach ($columns as $column) {
            echo '<th>' . $column . '</th>';
        }
        echo '</tr></thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            foreach ($columns as $column) {
                echo '<td>' . htmlspecialchars($row[$column]) . '</td>';
            }
            echo '</tr>';
        }
        echo '</tbody></table>';
    } else {
        echo "No orders found.";
    }
}

// Fetch active orders
$sql_orders = "SELECT * FROM orders1 ORDER BY order_date DESC";
$stmt_orders = $db->prepare($sql_orders);
$stmt_orders->execute();
$result_orders = $stmt_orders->get_result();

// Fetch canceled orders
$sql_canceled = "SELECT * FROM canceled_orders ORDER BY cancel_date DESC";
$stmt_canceled = $db->prepare($sql_canceled);
$stmt_canceled->execute();
$result_canceled = $stmt_canceled->get_result();

// Check if the query was successful
if ($stmt_orders->errno || $stmt_canceled->errno) {
    // Log the error and display a user-friendly message
    error_log("Error executing query: " . $db->error);
    echo "An error occurred while fetching orders.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Order Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            padding-top: 20px;
        }
        .container {
            max-width: 1200px;
        }
        .table-container {
            margin-bottom: 30px;
        }
        .table-title {
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }
        .btn-back {
            margin-bottom: 20px;
        }
        .btn-back a {
            color: #ffffff;
            text-decoration: none;
        }
        .card {
            margin-bottom: 20px;
            border-radius: 0.5rem;
            border: 1px solid #d1d1d1;
        }
        .card-header {
            background-color: #28a745;
            color: white;
            font-size: 1.25rem;
            font-weight: bold;
        }
        .card-body {
            background-color: #ffffff;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-back {
            background-color: #28a745;
            border: none;
        }
        .btn-back:hover {
            background-color: #218838;
        }
        .table thead th {
            background-color: #e9f5e0;
            color: #28a745;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="btn-back mb-4">
            <a href="../phinry/phinry/phinry.php" class="btn btn-back btn-lg">Back to Dashboard</a>
        </div>
        
        <div class="card">
            <div class="card-header">
                Active Orders
            </div>
            <div class="card-body">
                <?php
                $columns = array('order_id', 'name', 'total_price', 'payment_method', 'order_date', 'order_status');
                displayOrdersTable($result_orders, $columns);
                ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Canceled Orders
            </div>
            <div class="card-body">
                <?php
                $columns = array('canceled_order_id', 'order_id', 'name', 'total_price', 'payment_method', 'cancel_date', 'reason');
                displayOrdersTable($result_canceled, $columns);
                ?>
            </div>
        </div>
    </div>
</body>
</html>
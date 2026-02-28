<?php
include 'db.php';

// Total products
$total_products = $conn->query("SELECT COUNT(*) as total FROM products")->fetch_assoc()['total'];

// Total stock quantity
$total_stock = $conn->query("SELECT SUM(quantity) as total FROM products")->fetch_assoc()['total'];

// Total transactions
$total_transactions = $conn->query("SELECT COUNT(*) as total FROM stock_transactions")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            padding: 40px;
        }

        h2 {
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
        }

        .card {
            background: white;
            padding: 30px;
            width: 200px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }

        .number {
            font-size: 28px;
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>

<h2>Inventory Dashboard</h2>

<div class="container">
    <div class="card">
        <p>Total Products</p>
        <div class="number"><?php echo $total_products; ?></div>
    </div>

    <div class="card">
        <p>Total Stock</p>
        <div class="number"><?php echo $total_stock; ?></div>
    </div>

    <div class="card">
        <p>Total Transactions</p>
        <div class="number"><?php echo $total_transactions; ?></div>
    </div>
</div>

</body>
</html>
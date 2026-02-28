<!DOCTYPE html>
<html>
<head>
    <title>Inventory Control System</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            text-align: center;
            width: 400px;
        }

        h1 {
            margin-bottom: 30px;
            color: #333;
        }

        .btn {
            display: block;
            text-decoration: none;
            padding: 12px;
            margin: 10px 0;
            background-color: #4e73df;
            color: white;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #2e59d9;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Inventory Control & Stock Tracking</h1>

    <a class="btn" href="dashboard.php">Dashboard</a>
    <a class="btn" href="add_product.php">Add Product</a>
    <a class="btn" href="update_stock.php">Update Stock</a>
    <a class="btn" href="stock_history.php">Stock History</a>
</div>

</body>
</html>
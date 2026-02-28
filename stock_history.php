<?php
include 'db.php';

$search = "";

if(isset($_GET['search'])){
    $search = $_GET['search'];
}

$sql = "SELECT stock_transactions.transaction_id,
               stock_transactions.type,
               stock_transactions.quantity,
               stock_transactions.transaction_date,
               products.product_name
        FROM stock_transactions
        INNER JOIN products 
        ON stock_transactions.product_id = products.product_id";

if($search != ""){
    $sql .= " WHERE products.product_name LIKE '%$search%'";
}

$sql .= " ORDER BY stock_transactions.transaction_date DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Stock Transaction History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            padding: 40px;
        }

        h2 {
            text-align: center;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 8px;
            width: 250px;
        }

        input[type="submit"] {
            padding: 8px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th {
            background-color: #007bff;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<h2>Stock Transaction History</h2>

<form method="GET">
    <input type="text" name="search" placeholder="Search by product name"
           value="<?php echo $search; ?>">
    <input type="submit" value="Search">
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Product</th>
        <th>Type</th>
        <th>Quantity</th>
        <th>Date</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['transaction_id']; ?></td>
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['type']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><?php echo $row['transaction_date']; ?></td>
    </tr>
    <?php } ?>

</table>

</body>
</html>
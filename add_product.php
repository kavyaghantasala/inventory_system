<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

// Add product
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];

    $insert = $conn->query("INSERT INTO products (product_name, quantity) 
                            VALUES ('$product_name', $quantity)");

    if(!$insert){
        die("Insert Failed: " . $conn->error);
    }
}

// Fetch all products
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
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
            width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        table {
            width: 80%;
            margin: 40px auto;
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

        a {
            color: red;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Add Product</h2>

<form method="POST">
    Product Name:
    <input type="text" name="product_name" required>

    Quantity:
    <input type="number" name="quantity" required>

    <input type="submit" value="Add Product">
</form>

<h2>Product List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['product_id']; ?></td>
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td>
            <a href="delete_product.php?id=<?php echo $row['product_id']; ?>" 
               onclick="return confirm('Are you sure you want to delete this product?');">
               Delete
            </a>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>
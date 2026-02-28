<?php
include 'db.php';

$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Inventory</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Inventory List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Created At</th>
    </tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['product_id']."</td>
                <td>".$row['product_name']."</td>
                <td>".$row['category']."</td>
                <td>".$row['price']."</td>
                <td>".$row['quantity']."</td>
                <td>".$row['created_at']."</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No Products Found</td></tr>";
}
?>

</table>

<br>
<a href="index.php">Back to Home</a>

</body>
</html>
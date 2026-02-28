<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $product_id = $_POST['product_id'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];

    // Get current stock
    $check = $conn->query("SELECT quantity FROM products WHERE product_id = $product_id");

    if(!$check){
        die("Error fetching product: " . $conn->error);
    }

    $row = $check->fetch_assoc();
    $current_stock = $row['quantity'];

    if($type == "IN"){
        $new_stock = $current_stock + $quantity;
    } else {

        if($quantity > $current_stock){
            echo "<h3 style='color:red;'>Error: Not enough stock available!</h3>";
            exit();
        }

        $new_stock = $current_stock - $quantity;
    }

    // Update stock in products table
    $update = $conn->query("UPDATE products SET quantity = $new_stock WHERE product_id = $product_id");

    if(!$update){
        die("Update Failed: " . $conn->error);
    }

    // Insert transaction record
    $insert = $conn->query("INSERT INTO stock_transactions (product_id, type, quantity) 
                            VALUES ($product_id, '$type', $quantity)");

    if(!$insert){
        die("Insert Failed: " . $conn->error);
    }

    echo "<h3 style='color:green;'>Stock Updated Successfully!</h3>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Stock</title>
</head>
<body>

<h2>Update Stock</h2>

<form method="POST">

    Product:
    <select name="product_id" required>
        <option value="">-- Select Product --</option>
        <?php
        $result = $conn->query("SELECT * FROM products");
        while($row = $result->fetch_assoc()){
            echo "<option value='".$row['product_id']."'>".$row['product_name']." (Stock: ".$row['quantity'].")</option>";
        }
        ?>
    </select>
    <br><br>

    Type:
    <select name="type" required>
        <option value="IN">IN</option>
        <option value="OUT">OUT</option>
    </select>
    <br><br>

    Quantity:
    <input type="number" name="quantity" required>
    <br><br>

    <input type="submit" value="Update Stock">

</form>

</body>
</html>
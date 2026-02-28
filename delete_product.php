<?php
include 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // First delete related transactions
    $conn->query("DELETE FROM stock_transactions WHERE product_id = $id");

    // Then delete product
    $conn->query("DELETE FROM products WHERE product_id = $id");

    header("Location: add_product.php");
}
?>
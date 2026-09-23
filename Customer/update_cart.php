<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    if (!empty($_SESSION['cart']) && isset($_SESSION['cart'][$product_id])) {
        if (isset($_POST['increase'])) {
            $_SESSION['cart'][$product_id]['qty']++;
        } elseif (isset($_POST['decrease']) && $_SESSION['cart'][$product_id]['qty'] > 1) {
            $_SESSION['cart'][$product_id]['qty']--;
        }
    }
}

// Redirect back to cart page
header("Location: addtocart.php");
exit;

<?php require_once "header.php";
require_once "../Admin/database/data_connection.php";
require_once "../Admin/database/methods.php";

$id = $_GET['id'];


$cart_product = get_product_id($pdo, $id);

if(isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id]['qty']++;
}
else{
    $_SESSION['cart'][$id] = [
        'id' => $cart_product['id'],
        'name' => $cart_product['name'],
        'material' => $cart_product['material'],
        'price' => $cart_product['price'],
        'category' => $cart_product['category'],
        'description' => $cart_product['description'],
        'stock' => $cart_product['stock'],
        'img_url' => $cart_product['img_url'],
        'qty' => 1
    ];
}
header("Location: viewproduct.php");
?>

<?php 
require_once "nevbar.php";
require_once "../Admin/database/data_connection.php";
require_once "../Admin/database/methods.php";

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if ID is received from URL
if (!isset($_GET['id'])) {
    die("Order ID not provided!");
}

$order_id = $_GET['id']; // Correct variable assignment
delete_order($pdo, $order_id);

// Redirect back to the order table after deletion
header("Location: ordertable.php");
exit();
?>

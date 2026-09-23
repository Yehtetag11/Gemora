<?php require_once "nevbar.php";
require_once "../Admin/database/data_connection.php";
require_once "../Admin/database/methods.php";

$id = $_GET['id'];
delete_product($pdo, $id);
header("Location: allproduct.php");
?>
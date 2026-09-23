<?php

require_once "data_connection.php";

function get_product($pdo)
{
    $sql = "SELECT * FROM products";
    try {
        $stmt = $pdo->query($sql);
        $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $product;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function get_product_id($pdo, $id)
{
    $sql = "SELECT * FROM products WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql); // Use prepare() instead of query()
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind parameter with proper type
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the product
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function delete_product($pdo, $id)
{
    $sql = "DELETE FROM products WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql); // Use prepare() instead of query()
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind parameter with proper type
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function get_user($pdo)
{
    $sql = "SELECT * FROM users";
    try {
        $stmt = $pdo->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function get_user_id($pdo, $id)
{
    $sql = "SELECT * FROM users WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql); // Use prepare() instead of query()
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind parameter with proper type
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the product
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function delete_user($pdo, $id)
{
    $sql = "DELETE FROM users WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql); // Use prepare() instead of query()
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind parameter with proper type
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getIdByEmail($pdo, $email)
{
    $sql = "SELECT id FROM users WHERE email = :email LIMIT 1";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR); // Ensure correct data type
        $stmt->execute();
        return $stmt->fetchColumn(); // Fetch only the 'id' column
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage()); // Log instead of echo
        return null;
    }
}

function get_order($pdo)
{
    $sql = "SELECT * FROM orders";
    try {
        $stmt = $pdo->query($sql);
        $order = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $order;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function delete_order($pdo, $order_id)
{
    try {
        // Delete from order_details first (if applicable)
        $sql1 = "DELETE FROM order_details WHERE order_id = :order_id";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt1->execute();

        // Delete from orders table
        $sql2 = "DELETE FROM orders WHERE order_id = :order_id";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt2->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function get_order_id($pdo, $order_id)
{
    $sql = "SELECT * FROM orders WHERE order_id = :order_id";
    try {
        $stmt = $pdo->prepare($sql); // Use prepare() instead of query()
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT); // Bind parameter with proper type
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the product
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

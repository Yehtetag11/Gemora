<?php

require_once "data_connection.php";

// Corrected products table
$sql = "CREATE TABLE IF NOT EXISTS products (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        material VARCHAR(100) NOT NULL,
        category VARCHAR(100) NOT NULL,
        price FLOAT DEFAULT 0,
        description TEXT,
        stock INT,
        img_url VARCHAR(255)
        )";
try {
    $pdo->query($sql);  
    echo "Table products created successfully. <br>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "<br>";  
}


$sql = "CREATE TABLE IF NOT EXISTS users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        age INT NOT NULL,
        gender VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        role VARCHAR(255) NOT NULL,
        img_url VARCHAR(255)
        )";
try {
    $pdo->query($sql);  
    echo "Table users created successfully. <br>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "<br>";  
}


$sql = "CREATE TABLE IF NOT EXISTS orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    country VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    payment VARCHAR(100) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE)";
try {
$pdo->query($sql);  
echo "Table users created successfully. <br>";
} catch (PDOException $e) {
echo "Error: " . $e->getMessage() . "<br>";  
}


$sql = "CREATE TABLE IF NOT EXISTS order_details (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    sub_total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE)";
try {
$pdo->query($sql);  
echo "Table users created successfully. <br>";
} catch (PDOException $e) {
echo "Error: " . $e->getMessage() . "<br>";  
}
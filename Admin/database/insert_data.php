<?php
require_once "data_connection.php";
require_once "dataset.php";

function insertData($pdo, $user)
{
    try {
        $sql = "INSERT INTO users (name, age, gender, email, password, role, img_url)
                VALUES (:name, :age, :gender, :email, :password, :role, :img_url)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $user['name']);
        $stmt->bindParam(':age', $user['age']);
        $stmt->bindParam(':gender', $user['gender']);
        $stmt->bindParam(':email', $user['email']);
        $stmt->bindParam(':password', $user['password']);
        $stmt->bindParam(':role', $user['role']);
        $stmt->bindParam(':img_url', $user['img_url']);

        $stmt->execute();
        echo "User data inserted successfully. <br>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


// insertData($pdo, $users);
